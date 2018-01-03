<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feed_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_last_updated_date() {
		$sql = "SELECT max(last_updated) as last_updated FROM feed;";

		return $this->db->query($sql)->row()->last_updated;
	}

	public function get_links() {
		$sql = "SELECT *
				FROM feed_link
			   ";
		return $this->db->query($sql)->result_array();
	}

	public function get_feeds() {
		$sql = "SELECT * 
				FROM feed";

		return $this->db->query($sql)->result_array();
	}

	public function get_tile_by_pk($feed_link_pk) 
	{
		$feed_link_pk = (int) $feed_link_pk;

		$sql = "SELECT *
					FROM feed_link
					WHERE feed_link_pk = {$feed_link_pk}";

		return $this->db->query($sql,array())->row_array();
	}

	public function get_tiles($filter,$page_index,$amount,$first_id="") {
		$amount = (int)$amount;
		$last_id = (int)($amount*$page_index);
		$feed_fks = $this->get_filter_feed_fks($filter);

		$sql = "SELECT *
				FROM feed_link
			   ";
		if($feed_fks) {
			$sql .= " WHERE feed_fk IN ({$feed_fks}) ";
		}
		if($feed_fks && !empty($first_id)) {
			$first_id = (int)$first_id;
			$sql .= " AND feed_link_pk < {$first_id} ";
		} elseif(!$feed_fks && !empty($first_id)) {
			$first_id = (int)$first_id;
			$sql .= " WHERE feed_link_pk < {$first_id} ";
		}

		$sql .= "ORDER BY feed_link_pk DESC
				 LIMIT {$last_id},{$amount}";

		return $this->db->query($sql,array())->result_array();
	}

	public function new_items_count($filter,$first_id) {

		// $date_of_first_tile = $this->db->query("SELECT date_created FROM feed_link WHERE feed_link_pk = ?",array($first_id))->row()->date_created;

		$feed_fks = $this->get_filter_feed_fks($filter);

		$sql = "
					SELECT count(1) as count
                  	FROM feed_link 
					WHERE feed_link_pk > ?
		";
		if($feed_fks) {
			$sql .= " AND feed_fk IN ({$feed_fks}) ";
		}

		$q = $this->db->query($sql,array($first_id));

		$count = 0;
		if($q->num_rows() > 0) {
			$count = $q->row()->count;
		}

		return $count;
	}

	public function is_existing_feed_link($feed_pk,$url) {
		$q = $this->db->query("SELECT 1 FROM feed_link WHERE feed_fk = ? AND link = ? LIMIT 1",array($feed_pk,$url));

		return $q->num_rows() > 0;
	}

	public function get_latest_feed_links($feed_url) {
		$content = file_get_contents($feed_url);
	    $x = new SimpleXmlElement($content);
	     
	    $links = array();
	    foreach($x->channel->item as $entry) {
	        $links[] = $entry;
	    }

	    return $links;
	}

	public function insert_into_feed_link($feed_fk,$image_url,$title,$description,$url,$published_date) {
		$sql = "INSERT INTO feed_link 
				(`feed_fk`,`image_url`,`title`,`description`,`uniq_identifier`,`link`,`date_created`)
				VALUES
				(?,?,?,?,?,?,?)";

		$this->db->query($sql,array(
		    $feed_fk,
		    (string)$image_url,
		    $title,
		    $description,
		    $this->_get_unique_identifier_for_feed_link($title.$image_url),
		    (string)$url,
		    $published_date
		));
	}	

	public function get_page_graph_data($page_url) {
		require_once('application/libraries/opengraph-master/OpenGraph.php');

		$graph = OpenGraph::fetch($page_url);

		$data = array();

		if(
		   	isset($graph->title) && !empty($graph->title) &&
		   	isset($graph->image) && !empty($graph->image) &&
		   	isset($graph->description) && !empty($graph->description)
		) {
			$data['url'] = $page_url;
			$data['title'] = $graph->title;
			$data['image'] = $graph->image;
			$data['desc'] = $graph->description;
		}

		return $data;
	}

	public function get_filters() {
		$rows = $this->db->query("SELECT * FROM filter WHERE feed_fks IS NOT NULL ORDER BY `name` ASC")->result_array();

		return array_column($rows,'name');
	}

	public function get_filter_feed_fks($filter_name) {
		# Deprecated filters
		return false;
	}

	private function _get_unique_identifier_for_feed_link($id_string) {
		return md5($id_string);	
	}
}