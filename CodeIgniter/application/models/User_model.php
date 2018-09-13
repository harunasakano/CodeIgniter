<?php
class User_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	//同一ユーザID検索
	public function check_duplication_userid($user_id){
		$check = $this->db->select('count(*) as count')->get_where('user',array('id'=>$user_id))->row();
		return $check->count;
	}

	//新規ユーザー登録
	public function save_new_user($user_id,$password){

		$this->load->helper('date');
		$nowtime = unix_to_human(time(), TRUE, 'eu');

			$data = array(
					'id' => $user_id,
					'password' => $password,
					'created' => $nowtime,
					);

			$this->db->insert('user',$data);
	}

	//ユーザIDパスワード一致確認
	public function user_matched($user_id,$password){
		$query = $this->db->get_where('user',array('id'=>$user_id,'password'=>$password));
		return $query->result();
	}
}
