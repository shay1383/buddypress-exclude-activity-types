BuddyPress Exclude Activity Types

Credit: Brajesh Singh https://buddydev.com/

Prevents BuddyPress from generating the following activity types: "Joined Group", "Updated Profile", "New Member" &amp; "New Avatar".

If you are not familiar with functions.php, simply go to your WordPress Dashboard >> Plugins >> Add New >> Upload and then upload, install and activate the .zip file.

Other activity type you may want to exclude: 'rtmedia_like_activity' 'last_activity' 'rtmedia_comment_activity' 'bp_activity_reaction_like' 'reshare_update' 'rtmedia_update' 'created_group'

If you are familiar with functions.php I suggest to use the following code instead of using the plugin:

'''
function buddydev_exclude_activity_types_from_recording( &$activity ) {

    $excluded_types = array( 'joined_group', 'updated_profile', 'new_member', 'new_avatar' );
 
    if ( empty( $activity->id ) && in_array( $activity->type , $excluded_types ) ) {
        //reset either component or type, both will cause a failure in saving activity
 
        $activity->type = '';
 
    }
 
}
add_action( 'bp_activity_before_save', 'buddydev_exclude_activity_types_from_recording' );
'''
