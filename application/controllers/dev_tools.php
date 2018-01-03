<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dev_tools extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('feed_model'));
		$this->_authentication_check();
	}

	public function index()
	{
		redirect('/');	
	}
	

	public function categorize_feeds() {
		$data['feeds'] = $this->feed_model->get_feeds();
		$data['filters_by_feed'] = $this->_get_filters_by_feed_fk();
		$data['filters'] = $this->_get_all_filters();
		$this->load->view('dev_tools/categorize_feeds',$data);
	}

	public function manage_feeds() {
		$data['feeds'] = $this->feed_model->get_feeds();
		$this->load->view('dev_tools/manage_feeds',$data);
	}


	//api

	public function update_filters_with_feed_fk() {
		$feed_fk = $this->input->post('feed_fk',TRUE);
		$filter_names = $this->input->post('selected_filters',TRUE);

		foreach ($filter_names as $filter) {
			$this->_update_filter_with_feed_fk($filter,$feed_fk);
		}
	}

	public function add_feed() {
		$feed_link = $this->input->post('feed_link',TRUE);

		$this->_add_feed($feed_link);
	}

	public function enable_feed() {
		$feed_fk = $this->input->post('feed_fk',TRUE);

		$this->_enable_feed((int)$feed_fk);
	}

	public function disable_feed() {
		$feed_fk = $this->input->post('feed_fk',TRUE);

		$this->_disable_feed((int)$feed_fk);
	}


	//private

	private function _authentication_check() {
		if (!isset($_COOKIE['mythusiva'])) {
			redirect('/');
		}
	}

	private function _add_feed($feed_url) {
		$this->db->query("INSERT IGNORE INTO feed (`url`,`url_hash`) VALUES (?,MD5(`url`));",array($feed_url));
	}

	private function _enable_feed($feed_fk) {
		$this->db->query("UPDATE feed SET is_enabled = 1 WHERE feed_pk = ?",array($feed_fk));
	}

	private function _disable_feed($feed_fk) {
		$this->db->query("UPDATE feed SET is_enabled = 0 WHERE feed_pk = ?",array($feed_fk));
	}

	private function _update_filter_with_feed_fk($filter_name,$feed_fk) {
		$filter_row = $this->db->query("SELECT * FROM filter WHERE name = ?",array($filter_name))->row_array();

		$feed_fks = $filter_row['feed_fks'];
		$feed_fks = explode(",", $feed_fks);

		$feed_fks[] = $feed_fk;

		$feed_fks = array_unique($feed_fks);

		$feed_fks = implode(",", $feed_fks);

		$this->db->query("UPDATE filter SET feed_fks = ? WHERE name = ?",array($feed_fks,$filter_name));
	}

	private function _get_all_filters() {
		return $this->db->query("SELECT * FROM filter;")->result_array();
	}

	private function _get_filters_by_feed_fk() {
		$sql = "SELECT * FROM filter;";
		$filters = $this->db->query($sql)->result_array();

		$out = array();

		foreach ($filters as $row) {
			
			$feed_fks = explode(',', $row['feed_fks']);

			foreach ($feed_fks as $feed_fk) {

				$out[$feed_fk][] = $row['name'];

			}

		}

		return $out;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */