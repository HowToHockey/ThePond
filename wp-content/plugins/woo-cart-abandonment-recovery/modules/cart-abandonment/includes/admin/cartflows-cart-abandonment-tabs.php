<?php
/**
 * Cartflows view for cart abandonment tabs.
 *
 * @package Woocommerce-Cart-Abandonment-Recovery
 */

?>
<div class="wrap">
	<h1 id="wcf_cart_abandonment_tracking_table"><?php echo __( 'WooCommerce Cart Abandonment Recovery  ', 'woo-cart-abandonment-recovery' ); ?></h1>
	<?php

	$action     = filter_input( INPUT_GET, 'action', FILTER_SANITIZE_STRING );
	$sub_action = filter_input( INPUT_GET, 'sub_action', FILTER_SANITIZE_STRING );


	if ( ! $action ) {
		$action = WCF_ACTION_REPORTS;
	}

	$this->wcf_display_tabs();
	$this->wcf_show_warning_ca();
	?>
	<?php
	echo get_transient( 'wcf_ca_show_message' );
	?>

	<?php if ( WCF_ACTION_SETTINGS === $action ) : ?>
		<?php
		$this->wcf_display_settings();
		?>
	<?php endif; ?>

	<?php if ( WCF_ACTION_REPORTS === $action ) : ?>

		<?php

		switch ( $sub_action ) {

			case WCF_SUB_ACTION_REPORTS_VIEW:
				$this->wcf_display_report_details();
				break;
			case WCF_SUB_ACTION_REPORTS_RESCHEDULE:
				$ca_obj = Cartflows_Ca_Cart_Abandonment::get_instance();

				$session_id = filter_input( INPUT_GET, 'session_id', FILTER_SANITIZE_STRING );
				if ( $session_id ) {
					$ca_obj->schedule_emails( $session_id, true );
				}

				$param        = array(
					'page'       => WCF_CA_PAGE_NAME,
					'action'     => WCF_ACTION_REPORTS,
					'sub_action' => WCF_SUB_ACTION_REPORTS_VIEW,
					'session_id' => $session_id,
				);
				$redirect_url = add_query_arg( $param, admin_url( '/admin.php' ) );

				wp_safe_redirect( $redirect_url );

				break;
			default:
				$this->wcf_display_reports();
				break;

		}

		?>

	<?php endif; ?>

	<?php if ( WCF_ACTION_EMAIL_TEMPLATES === $action ) : ?>

		<?php
		$email_template_class_inst = Cartflows_Ca_Email_Templates::get_instance();
		$email_template_class_inst->show_messages();
		switch ( $sub_action ) {
			case WCF_SUB_ACTION_DELETE_BULK_EMAIL_TEMPLATES:
				$email_template_class_inst->delete_bulk_templates();
				break;
			case WCF_SUB_ACTION_DELETE_EMAIL_TEMPLATES:
				$email_template_class_inst->delete_single_template();
				break;
			case WCF_SUB_ACTION_CLONE_EMAIL_TEMPLATES:
				$email_template_class_inst->clone_email_template();
				break;
			case WCF_SUB_ACTION_ADD_EMAIL_TEMPLATES:
			case WCF_SUB_ACTION_EDIT_EMAIL_TEMPLATES:
				$email_template_class_inst->render_email_template_form( $sub_action );
				break;
			case WCF_SUB_ACTION_RESTORE_EMAIL_TEMPLATES:
				$email_template_class_inst->restore_email_templates();
				break;

			case WCF_SUB_ACTION_SAVE_EMAIL_TEMPLATES:
				check_ajax_referer( WCF_EMAIL_TEMPLATES_NONCE, '_wpnonce' );

				$wcf_settings_frm = filter_input( INPUT_POST, 'wcf_settings_frm', FILTER_SANITIZE_STRING );
				$id               = filter_input( INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT );

				if ( 'save' === $wcf_settings_frm ) {
					$email_template_class_inst->add_email_template();
				} elseif ( 'update' === $wcf_settings_frm && $id ) {
					$email_template_class_inst->edit_email_template();
				}
				break;
			default:
				$email_template_class_inst->show_add_new_template_button();
				$email_template_class_inst->show_email_template_data_table();
				break;
		}

		?>


	<?php endif; ?>

</div>
