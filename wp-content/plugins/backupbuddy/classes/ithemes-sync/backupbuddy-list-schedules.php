<?php
class Ithemes_Sync_Verb_Backupbuddy_List_Schedules {
	public static $name = 'backupbuddy-list-schedules';
	public static $description = 'List backup schedules.';
	
	private $default_arguments = array(
	);
	
	/*
	 * Return:
	 *		array(
	 *			'success'	=>	'0' | '1'
	 *			'status'	=>	'Status message.'
	 *			'schedules'	=>	[array of schedule information]
	 *		)
	 *
	 */
	public function run( $arguments ) {
		$arguments = Ithemes_Sync_Functions::merge_defaults( $arguments, $this->default_arguments );
		
		$schedules = array();
		foreach( pb_backupbuddy::$options['schedules'] as $schedule_id => $schedule ) {
			$schedules[$schedule_id] = array(
				'title' => $schedule['title'],
				'profile' => $schedule['profile'],
				'interval' => $schedule['interval'],
				'last_run' => $schedule['last_run'],
				'enabled' => $schedule['on_off'],
				'id' => $schedule_id
			);
		}
		
		return array(
			'success' => '1',
			'status' => 'Scheduled listed successfully.',
			'schedules' => $schedules,
		);
		
	} // End run().
	
	
} // End class.
