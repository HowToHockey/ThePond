<?php
/**
 * @brief		Language Changer
 * @author		<a href='https://www.invisioncommunity.com'>Invision Power Services, Inc.</a>
 * @copyright	(c) Invision Power Services, Inc.
 * @license		https://www.invisioncommunity.com/legal/standards/
 * @package		Invision Community
 * @since		17 Dec 2013
 */

namespace IPS\core\modules\front\system;

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !\defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
	header( ( isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0' ) . ' 403 Forbidden' );
	exit;
}

/**
 * Language Changer
 */
class _language extends \IPS\Dispatcher\Controller
{
	/**
	 * Execute
	 *
	 * @return	void
	 */
	public function execute()
	{
		parent::execute();
	}

	/**
	 * Manage
	 *
	 * @return	void
	 */
	protected function manage()
	{
		\IPS\Session::i()->csrfCheck();
		
		if( \IPS\Member::loggedIn()->member_id )
		{
			\IPS\Member::loggedIn()->language = (int) \IPS\Request::i()->id;
			\IPS\Member::loggedIn()->save();
		}
		else
		{
			\IPS\Request::i()->setCookie( 'language', (int) \IPS\Request::i()->id );
		}
		
		\IPS\Output::i()->redirect( \IPS\Request::i()->referrer() ?: \IPS\Http\Url::internal( '' ) );
	}
}