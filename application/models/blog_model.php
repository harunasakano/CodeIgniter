<?php
class Blog_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function get_all_posts(){
		$query = $this->db->get('post');
		return $query->result();
	}

	public function save_new_entry($category,$title,$content){

		$this->load->helper('date');
		$nowtime = unix_to_human(time(), TRUE, 'eu');

			$data = array(
					'category_id' => $category,
					'title' => $title,
					'body' => $content,
					'created' => $nowtime,
					'modified' => $nowtime
					);

			$this->db->insert('post',$data);
	}

	public function get_content($id){
		$query = $this->db->get_where('post',array('id'=>$id));
		return $query->result();
	}
}
