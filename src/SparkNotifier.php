<?php  declare(strict_types=1);

namespace Spark;

interface Notifier {
	function send(array $alarms);
}

/**
 * @package Spark
 */
class SparkNotifier  implements Notifier {
	/**
	 * Callback which receives a list of alarms which either failed or succeeded.
	 * This is the default notifier which just prints the default success and error message
	 * you need to extend this class with your own send() callback.
	 * @param array $alarms
	 */
	public function send(array $alarms){
		foreach ($alarms as $alarm){
			/**
			 * @var $alarm SparkAlarm;
			 */
			if ($alarm->status == SparkAlarmStatus::SUCCESS) {
				echo "[" . get_class($alarm) . "]: Succeeded with " . $alarm->getNotifierSuccessMessage() . " @" . date("d.m.Y H:i:s");
			} else {
				echo "[" . get_class($alarm) . "]: Failed with " . $alarm->getNotifierErrorMessage() . " @" . date("d.m.Y H:i:s");
			}
		}
	}
}