<?php
class Blog_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	//最後記事5件を返す
	public function get_new_posts(){
		$this->db->limit(5);
		$query = $this->db->get('post');
		return $query->result();
	}

	//総記事数を返す
	public function get_count_all_posts(){
		$result = $this->db->select('count(*) as count')->get("post")->row();
		return $result->count;
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
