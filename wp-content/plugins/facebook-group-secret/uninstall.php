<?php
// exit if uninstall constant is not defined
if (!defined('WP_UNINSTALL_PLUGIN')) exit;

global $table_prefix, $wpdb;
$tblname = 'facebook_group_secret_phrases';
$wp_track_table = $table_prefix . "$tblname";
$wpdb->query( "DROP TABLE IF EXISTS $wp_track_table" );
?>
