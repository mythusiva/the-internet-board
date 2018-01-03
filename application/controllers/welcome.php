<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('feed_model','stats_model'));
	}

	public function index()
	{
		$filter = 'all';

		if(check_if_invalid_filter($filter)) {
			redirect('/');
		}

		if (!isset($_COOKIE['tib'])) {
			setcookie("tib",'nomnomnominternet', time()+3600*1,'/'); //one hour buffer
			$this->stats_model->increment_total_visits();
		}

		$data = array();
		$data['last_updated'] = $this->feed_model->get_last_updated_date();
		$data['total_visits'] = $this->stats_model->get_total_visits();
		$data['filter'] = $filter;
		$data['all_filters'] = get_filters(array($filter));
		$this->load->view('homepage',$data);
	}

	public function viewLink($feedLinkPK)
	{
		$tileData = $this->feed_model->get_tile_by_pk($feedLinkPK);
		$this->_insert_domain_name_into_array($tileData);

		$data = [
			'tileData' => $tileData
		];
		$this->load->view('view_link',$data);
	}

	public function notFound() {
		redirect('/');
	}

	//api
	public function getMoreTiles() {
		$filter = $this->input->get('filter_name',TRUE);
		$page_index = $this->input->get('page_index_id',TRUE);
		$first_id = $this->input->get('first_item_id',TRUE);
		$amount = 25;
		
		$tilesArray = $this->feed_model->get_tiles($filter,$page_index,$amount,$first_id);

		foreach ($tilesArray as $key => &$tileData) {
			$this->_insert_domain_name_into_array($tileData);
			// if($key % 3 === 0) {
			// 	$this->_insert_advert_redirect($tileData);
			// }
		}

		$tilesData = json_encode($tilesArray,TRUE);
		echo $tilesData;
	}

	public function hasNewerItems() {
		$filter = $this->input->get('filter_name',TRUE);
		$first_id = $this->input->get('first_item_id',TRUE);
		
		$count = $this->feed_model->new_items_count($filter,$first_id);

		$output['response'] = 'false';
		if($count > 0) {
			$output['response'] = 'true';
		}
		$output['count'] = $count;

		echo json_encode($output,TRUE);	
	}

	public function sitemap() {
		$filters = get_filters();

		foreach ($filters as $f) {
			$data['uris'][] = [
				'uri' => "",
				'changefreq' => "daily",
				'priority' => "0.8"
			];
		}
		
		$this->load->view('sitemap',$data);
	}
	

	//private

	private function _insert_domain_name_into_array(&$tile_data_array) {
		$url_componants = parse_url($tile_data_array['link']);

		$hostname = $tile_data_array['link'];
		if(isset($url_componants['host'])) {
			$hostname = $url_componants['host'];
		}

		$tile_data_array['hostname'] = $hostname;
	}

	private function _insert_advert_redirect(&$tile_data_array) {
		$tile_data_array['link'] = $this->_get_advert_redirect($tile_data_array['link']);
	}

	private function _decode_filter($encoded_filter) {
		$filter = base64_decode($encoded_filter);
	}

	private function _get_advert_redirect($original_url) {
		$advert_url = "http://linkshrink.net/zJ9K={$original_url}";
		$output_url = $advert_url;

		return $output_url;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */