<?php
class Ithemes_Sync_Verb_Backupbuddy_List_Profiles {
	public static $name = 'backupbuddy-list-profiles';
	public static $description = 'List backup profiles.';
	
	private $default_arguments = array(
	);
	
	/*
	 * Return:
	 *		array(
	 *			'success'	=>	'0' | '1'
	 *			'status'	=>	'Status message.'
	 *			'profiles'	=>	[array of profile information]
	 *		)
	 *
	 */
	public function run( $arguments ) {
		$arguments = Ithemes_Sync_Functions::merge_defaults( $arguments, $this->default_arguments );
		
		$profiles = array();
		foreach( pb_backupbuddy::$options['profiles'] as $profile_id => $profile ) {
			$profiles[$profile_id] = array( 'title' => $profile['title'], 'type' => $profile['type'], 'id' => $profile_id );
		}
		
		return array(
			'success' => '1',
			'status' => 'Profiles listed successfully.',
			'profiles' => $profiles,
		);
		
	} // End run().
	
	
} // End class.
