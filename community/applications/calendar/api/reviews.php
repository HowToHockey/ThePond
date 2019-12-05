<?php
/**
 * @brief		Calendar Events Reviews API
 * @author		<a href='https://www.invisioncommunity.com'>Invision Power Services, Inc.</a>
 * @copyright	(c) Invision Power Services, Inc.
 * @license		https://www.invisioncommunity.com/legal/standards/
 * @package		Invision Community
 * @subpackage	Calendar
 * @since		8 Dec 2015
 */

namespace IPS\calendar\api;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !\defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * @brief	Calendar Events Reviews API
 */
class _reviews extends \IPS\Content\Api\CommentController
{
	/**
	 * Class
	 */
	protected $class = 'IPS\calendar\Event\Review';
	
	/**
	 * GET /calendar/reviews
	 * Get list of reviews
	 *
	 * @note		For requests using an OAuth Access Token for a particular member, only reviews the authorized user can view will be included
	 * @apiparam	string	calendars		Comma-delimited list of calendar IDs
	 * @apiparam	string	authors			Comma-delimited list of member IDs - if provided, only topics started by those members are returned
	 * @apiparam	int		locked			If 1, only reviews from events which are locked are returned, if 0 only unlocked
	 * @apiparam	int		hidden			If 1, only reviews which are hidden are returned, if 0 only not hidden
	 * @apiparam	int		featured		If 1, only reviews from  events which are featured are returned, if 0 only not featured
	 * @apiparam	string	sortBy			What to sort by. Can be 'date', 'title' or leave unspecified for ID
	 * @apiparam	string	sortDir			Sort direction. Can be 'asc' or 'desc' - defaults to 'asc'
	 * @apiparam	int		page			Page number
	 * @apiparam	int		perPage			Number of results per page - defaults to 25
	 * @return		\IPS\Api\PaginatedResponse<IPS\calendar\Event\Review>
	 */
	public function GETindex()
	{
		return $this->_list( array(), 'calendars' );
	}
	
	/**
	 * GET /calendar/reviews/{id}
	 * View information about a specific review
	 *
	 * @param		int		$id			ID Number
	 * @throws		2L298/1	INVALID_ID	The review ID does not exist or the authorized user does not have permission to view it
	 * @return		\IPS\calendar\Event\Review
	 */
	public function GETitem( $id )
	{
		try
		{
			$class = $this->class;
			if ( $this->member )
			{
				$object = $class::loadAndCheckPerms( $id, $this->member );
			}
			else
			{
				$object = $class::load( $id );
			}
			
			return new \IPS\Api\Response( 200, $object->apiOutput( $this->member ) );
		}
		catch ( \OutOfRangeException $e )
		{
			throw new \IPS\Api\Exception( 'INVALID_ID', '2L298/1', 404 );
		}
	}
	
	/**
	 * POST /calendar/reviews
	 * Create a review
	 *
	 * @note	For requests using an OAuth Access Token for a particular member, any parameters the user doesn't have permission to use are ignored (for example, hidden will only be honoured if the authenticated user has permission to hide content).
	 * @reqapiparam	int			event				The ID number of the event the review is for
	 * @reqapiparam	int			author				The ID number of the member making the review (0 for guest). Required for requests made using an API Key or the Client Credentials Grant Type. For requests using an OAuth Access Token for a particular member, that member will always be the author
	 * @apiparam	string		author_name			If author is 0, the guest name that should be used
	 * @reqapiparam	string		content				The review content as HTML (e.g. "<p>This is a review.</p>"). Will be sanatized for requests using an OAuth Access Token for a particular member; will be saved unaltered for requests made using an API Key or the Client Credentials Grant Type. 
	 * @apiparam	datetime	date				The date/time that should be used for the review date. If not provided, will use the current date/time. Ignored for requests using an OAuth Access Token for a particular member
	 * @apiparam	string		ip_address			The IP address that should be stored for the review. If not provided, will use the IP address from the API request. Ignored for requests using an OAuth Access Token for a particular member
	 * @apiparam	int			hidden				0 = unhidden; 1 = hidden, pending moderator approval; -1 = hidden (as if hidden by a moderator)
	 * @reqapiparam	int			rating				Star rating
	 * @throws		2L298/2		INVALID_ID	The forum ID does not exist
	 * @throws		1L298/3		NO_AUTHOR	The author ID does not exist
	 * @throws		1L298/4		NO_CONTENT	No content was supplied
	 * @throws		1L298/8		INVALID_RATING	The rating is not a valid number up to the maximum rating
	 * @throws		2L298/A		NO_PERMISSION		The authorized user does not have permission to review that event
	 * @return		\IPS\calendar\Event\Review
	 */
	public function POSTindex()
	{
		/* Get event */
		try
		{
			$event = \IPS\calendar\Event::load( \IPS\Request::i()->event );
		}
		catch ( \OutOfRangeException $e )
		{
			throw new \IPS\Api\Exception( 'INVALID_ID', '2L298/2', 403 );
		}
		
		/* Get author */
		if ( $this->member )
		{
			if ( !$event->canReview( $this->member ) )
			{
				throw new \IPS\Api\Exception( 'NO_PERMISSION', '2L298/A', 403 );
			}
			$author = $this->member;
		}
		else
		{
			if ( \IPS\Request::i()->author )
			{
				$author = \IPS\Member::load( \IPS\Request::i()->author );
				if ( !$author->member_id )
				{
					throw new \IPS\Api\Exception( 'NO_AUTHOR', '1L298/3', 404 );
				}
			}
			else
			{
				$author = new \IPS\Member;
				$author->name = \IPS\Request::i()->author_name;
			}
		}
		
		/* Check we have a post */
		if ( !\IPS\Request::i()->content )
		{
			throw new \IPS\Api\Exception( 'NO_CONTENT', '1L298/4', 403 );
		}
		
		/* Check we have a rating */
		if ( !\IPS\Request::i()->rating or !\in_array( (int) \IPS\Request::i()->rating, range( 1, \IPS\Settings::i()->reviews_rating_out_of ) ) )
		{
			throw new \IPS\Api\Exception( 'INVALID_RATING', '1L298/8', 403 );
		}
		
		/* Do it */
		return $this->_create( $event, $author );
	}
	
	/**
	 * POST /calendar/reviews/{id}
	 * Edit a review
	 *
	 * @note		For requests using an OAuth Access Token for a particular member, any parameters the user doesn't have permission to use are ignored (for example, hidden will only be honoured if the authenticated user has permission to hide content).
	 * @param		int			$id				ID Number
	 * @apiparam	int			author			The ID number of the member making the review (0 for guest). Ignored for requests using an OAuth Access Token for a particular member.
	 * @apiparam	string		author_name		If author is 0, the guest name that should be used
	 * @apiparam	string		content			The review content as HTML (e.g. "<p>This is a review.</p>"). Will be sanatized for requests using an OAuth Access Token for a particular member; will be saved unaltered for requests made using an API Key or the Client Credentials Grant Type. 
	 * @apiparam	int			hidden			1/0 indicating if the topic should be hidden
	 * @apiparam	int			rating			Star rating
	 * @throws		2L298/5		INVALID_ID		The review ID does not exist or the authorized user does not have permission to view it
	 * @throws		1L298/6		NO_AUTHOR		The author ID does not exist
	 * @throws		1L298/9		INVALID_RATING	The rating is not a valid number up to the maximum rating
	 * @throws		2L298/B		NO_PERMISSION	The authorized user does not have permission to edit the review
	 * @return		\IPS\calendar\Event\Review
	 */
	public function POSTitem( $id )
	{
		try
		{
			/* Load */
			$comment = \IPS\calendar\Event\Review::load( $id );
			if ( $this->member and !$comment->canView( $this->member ) )
			{
				throw new \OutOfRangeException;
			}
			if ( $this->member and !$comment->canEdit( $this->member ) )
			{
				throw new \IPS\Api\Exception( 'NO_PERMISSION', '2L298/B', 403 );
			}
			
			/* Check */
			if ( isset( \IPS\Request::i()->rating ) and !\in_array( (int) \IPS\Request::i()->rating, range( 1, \IPS\Settings::i()->reviews_rating_out_of ) ) )
			{
				throw new \IPS\Api\Exception( 'INVALID_RATING', '1L298/9', 403 );
			}						
			/* Do it */
			try
			{
				return $this->_edit( $comment );
			}
			catch ( \InvalidArgumentException $e )
			{
				throw new \IPS\Api\Exception( 'NO_AUTHOR', '1L298/6', 400 );
			}
		}
		catch ( \OutOfRangeException $e )
		{
			throw new \IPS\Api\Exception( 'INVALID_ID', '2L298/5', 404 );
		}
	}
		
	/**
	 * DELETE /calendar/reviews/{id}
	 * Deletes a review
	 *
	 * @param		int			$id			ID Number
	 * @throws		2L298/7		INVALID_ID		The review ID does not exist
	 * @throws		2L298/C		NO_PERMISSION	The authorized user does not have permission to delete the comment
	 * @return		void
	 */
	public function DELETEitem( $id )
	{
		try
		{			
			$class = $this->class;
			$object = $class::load( $id );
			if ( $this->member and !$object->canDelete( $this->member ) )
			{
				throw new \IPS\Api\Exception( 'NO_PERMISSION', '2L298/C', 403 );
			}
			$object->delete();
			
			return new \IPS\Api\Response( 200, NULL );
		}
		catch ( \OutOfRangeException $e )
		{
			throw new \IPS\Api\Exception( 'INVALID_ID', '2L298/7', 404 );
		}
	}
}