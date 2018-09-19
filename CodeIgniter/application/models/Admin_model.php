<?php
/*
編集画面DBモデル
*/
class Admin_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

		//ブログタイトル保存
		public function blog_new_title_save($title){

		$user_id = $_SESSION['login_user'];
		$new_blog_title = $title;
		$this->load->helper('date');
		$nowtime = unix_to_human(time(), TRUE, 'eu');

			$data = array(
					'user_id' => $user_id,
					'title' => $new_blog_title,
					'created' => $nowtime
					);

			$this->db->insert('blog',$data);
		}

		//ブログタイトル呼び出し
		public function get_blog_title(){
			$this->db->limit(1);
			$this->db->order_by('created','DESC');
			$query = $this->db->get('blog');
			return $query->result();
		}
}
