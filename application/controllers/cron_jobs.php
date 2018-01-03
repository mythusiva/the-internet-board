<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron_jobs extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		// if(!$this->input->is_cli_request()) {
		// 	echo "Forbidden!";
		// 	die();
		// }

		$this->load->model('feed_model');

		$this->update_interval = 3600; //seconds
		$_SERVER['HTTP_USER_AGENT'] = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";
		$GLOBALS['session_id'] = md5(time());
	}
	
	public function __destruct() {
	}
		
	public function update_feed_links() {
		$this->log_msg("+++STARTING+++");
		
		$feed = $this->_get_feed_to_update();

		if(!empty($feed)) {
			$this->populate_feed_link($feed);
		} else {
			$this->log_msg("Nothing to do ...");
		}
		$this->log_msg("---DONE---");
	}

	public function populate_feed_link($feed) {
		$this->log_msg("feed url: {$feed['url']}");
		$linksObj = $this->feed_model->get_latest_feed_links($feed['url']);

		$this->_lock_feed_to_process($feed['feed_pk']);

		foreach ($linksObj as $l) {
			$link_url = (string)$l->link;
			$this->log_msg("feed link: {$link_url}");

			if($this->feed_model->is_existing_feed_link($feed['feed_pk'],$link_url)) {
				$this->log_msg("link already exists ... skipped.");
				continue;
			}

			$graph_data = $this->feed_model->get_page_graph_data($link_url);


			$published_date = time()-(3600*1); //1hour penalty
			if(isset($l->pubDate)) {
				$published_date = strtotime($l->pubDate);
			}

			$published_date = date("Y-m-d H:i:s",$published_date);

			if(!empty($graph_data)) {
				$this->feed_model->insert_into_feed_link($feed['feed_pk'],$graph_data['image'],$graph_data['title'],$graph_data['desc'],$graph_data['url'],$published_date);
			}

		}

		$this->_unlock_feed_process($feed['feed_pk']);
		$this->_set_feed_last_updated($feed['feed_pk']);
	}

	private function _get_feed_to_update() {
		$feed = $this->db->query("SELECT * FROM feed WHERE last_updated < datetime('now', '-1 Hour') AND is_processing = 0 AND is_enabled = 1 LIMIT 1;")->row_array();

		return $feed;
	}

	private function _lock_feed_to_process($feed_pk) {
		$this->db->query("UPDATE feed SET is_processing = 1 WHERE feed_pk = ?",array($feed_pk));
	}

	private function _unlock_feed_process($feed_pk) {
		$this->db->query("UPDATE feed SET is_processing = 0 WHERE feed_pk = ?",array($feed_pk));
	}

	private function _set_feed_last_updated($feed_pk) {
		$this->db->query("UPDATE feed SET last_updated = datetime('now') WHERE feed_pk = ?",array($feed_pk));
	}
	
	private function log_msg($text) {
		$timestamp = date('Y-m-d H:i:s');
		echo $GLOBALS['session_id']." ({$timestamp}) >>> {$text} \n";
	}
}