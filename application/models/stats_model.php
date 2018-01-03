<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stats_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function increment_total_visits() {
		$this->db->query('UPDATE stats SET count=count+1 WHERE type = "TOTAL_VISITS";');
	}

	public function get_total_visits() {
		return $this->db->query('SELECT count FROM stats WHERE type = "TOTAL_VISITS";')->row()->count;
	}
}