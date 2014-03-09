<?php
class Ithemes_Sync_Verb_Backupbuddy_Get_Overview {
	public static $name = 'backupbuddy-get-overview';
	public static $description = 'Get overview and status information.';
	
	private $default_arguments = array(
	);
	
	/*
	 * Return:
	 *		array(
	 *			'success'	=>	'0' | '1'
	 *			'status'	=>	'Status message.'
	 *			'overview'	=>	[array of overview information]
	 *		)
	 *
	 */
	public function run( $arguments ) {
		error_log( 'overviewed' );
		$arguments = Ithemes_Sync_Functions::merge_defaults( $arguments, $this->default_arguments );
		
		$overview = array(
			'last_backup_start'			=> pb_backupbuddy::$options['last_backup_start'],
			'last_backup_finish'		=> pb_backupbuddy::$options['last_backup_finish'],
			'edits_since_last_backup'	=> pb_backupbuddy::$options['edits_since_last'],
			'schedules'					=> count( pb_backupbuddy::$options['schedules'] ),
			'profiles'					=> count( pb_backupbuddy::$options['profiles'] ),
			'destinations'				=> count( pb_backupbuddy::$options['remote_destinations'] ),
			'notifications'				=> array(), // Array of string notification messages.
		);
		
		return array(
			'success' => '1',
			'status' => 'Overview retrieved successfully.',
			'overview' => $overview,
		);
		
	} // End run().
	
	
} // End class.
