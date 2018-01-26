<?php
/*
Plugin Name: BuddyPress Exclude Activity Types
Description: Prevents BuddyPress from generating the following activity types: "Joined Group", "Updated Profile", "New Member" & "New Avatar". Requires "BuddyPress" plugin.
Version: 1.0
Author: Shay Seferstein <shay1383@gmail.com>
Author URI: https://shay.seferstein.com
Plugin URI: https://github.com/shay1383/buddypress-exclude-activity-types
*/

// Other activity type you may want to exclude: 'rtmedia_like_activity' 'last_activity' 'rtmedia_comment_activity' 'bp_activity_reaction_like' 'reshare_update' 'rtmedia_update' 'created_group'
function buddydev_exclude_activity_types_from_recording( &$activity ) {

    $excluded_types = array( 'joined_group', 'updated_profile', 'new_member', 'new_avatar' );
 
    if ( empty( $activity->id ) && in_array( $activity->type , $excluded_types ) ) {
        //reset either component or type, both will cause a failure in saving activity
 
        $activity->type = '';
 
    }
 
}
add_action( 'bp_activity_before_save', 'buddydev_exclude_activity_types_from_recording' );
