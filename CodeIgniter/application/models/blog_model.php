<?php
class Blog_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function get_all_posts(){
			//$query = $this->db->get("post");
			//return $query->result();
			$abc = "えい";
			return $abc;
	}

	public function save_new_entry($category,$title,$content){
			$data = array(
					'category_id' => $category,
					'title' => $title,
					'body' => $content
					);

			$this->db->insert('post',$data);
			echo "OK";
	}
}
