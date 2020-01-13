<?php
/**
  * 模型 model
  *
  **/
class Vip_member_model extends CI_Model {

	public function __construct() {
		parent::__construct ();
		$this->load->database ();
	}

	/**
	  * 获取单条数据
	  **/
	function get($where=[],$field='*',$group='') {


		$this->db->select($field);
		$this->db->where($where);
		$this->db->group_by($group);
		$this->db->from('vip_member');
		$query = $this->db->get();
		return $query->row_array();

	}

	/**
	 * 获取多条数据
	 */
	function getAll($where=array(),$field='*',$limit='',$group='') {

		$this->db->select($field);
		$this->db->where($where);
		$this->db->group_by($group);
		if($limit){
			$limit = explode(',',$limit);
			$this->db->limit($limit[1],$limit[0]);
		}
		$this->db->from('vip_member');
		$query = $this->db->get();
		return $query->result_array();
	}



	/**
	* 修改数据
    */
	function update($data,$where) {

		return $this->db->update ('vip_member',$data,$where);
		
	}


	 /**
	   * 删除数据
	   *
	   */
	function remove($where=[]) {
		return $this->db->where ($where )->delete ( 'vip_member' );

	}

	/**
	 * 插入单条数据
	 *
	 */
	function insert($data=[]) {

		return $this->db->insert ( 'vip_member',$data );

	}

	/**
	 *  获取总数
	 **/
	function get_count($where=[]){
		return $this->db->where($where)->count_all ('vip_member');
	}


	/**
	 * 表连接查询   多条数据
	 *
	 **/
	function left_user_all($sql = ''){
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	/**
	 * 表连接查询   单条数据
	 *
	 **/
	function left_user_find($sql = ''){
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	/**
	 *  全站变换昵称函数、
	 *  $data
	 *  $rows  false true/ 一维或多维数组、
	 *  $table  需要与会员表链接的表名、
	 **/
	function nickname($data=[],$rows = false,$table = ''){
		if(empty($data) || empty($table)){
			return $data;
		}
		$this->load->model('vip_model');

		if(!$rows){
			$author = $data['author'];
		}else{
			$author = array_column($data,'author');
			$author = implode("','",$author);
		}
        if(empty($author)){
          	return $data;
		}
		$sql  = "SELECT DISTINCT u.author,v.vip_id,v.uid  FROM  {$this->db->dbprefix}vip_member v 
				 LEFT JOIN  {$this->db->dbprefix}$table u";
		$sql .= " ON  u.authorid = v.uid  WHERE u.author in ('$author')";
		$sql .= " AND v.due_status = 0 AND v.vip_member = 0";
		$member_info  = $this->left_user_all($sql);
		if($member_info){
			$member_info = array_column($member_info,'vip_id','author');
			$vip_info =   array_column($this->vip_model->getAll(array(),'vip_id,iickname'),'iickname','vip_id');
			if(!$rows){
				$vip_id = $member_info[$data['author']];
				$data['author'] = "<span style= \"color: $vip_info[$vip_id]\">$author</span>";
				$data['author_2'] = $author;
				return $data;
			}
			foreach ($data as $key=>$val){
				$vip_id = $member_info[$val['author']];
				$author = $val['author'];
				if($vip_id){
					$data[$key]['author'] = "<span style= \"color: $vip_info[$vip_id]\">$author</span>";
					$data[$key]['author_2'] = $author;
				}
			}

		}
			return $data;
	}

	/**
	 *  全站变换昵称函数、
	 *  $data
	 *  $rows  false true/ 一维或多维数组、
	 **/
	function nickname_username($data=[],$rows = false){
		if(empty($data)){
			return $data;
		}
		$this->load->model('vip_model');
		if(!$rows){
			$author = $data['username'];
		}else{
			$author = array_column($data,'username');
			$author = implode("','",$author);
		}
		if(empty($author)){
			return $data;
		}
		$sql  = "SELECT DISTINCT u.username,v.vip_id,v.uid  FROM  {$this->db->dbprefix}vip_member v 
				 LEFT JOIN  `{$this->db->dbprefix}user` u";
		$sql .= " ON  u.uid = v.uid  WHERE u.username in ('$author')";
		$sql .= " AND v.due_status = 0 AND v.vip_member = 0";
		$member_info  = $this->left_user_all($sql);
		if($member_info){
			$member_info = array_column($member_info,'vip_id','username');
			$vip_info =   array_column($this->vip_model->getAll(array(),'vip_id,iickname'),'iickname','vip_id');
			if(!$rows){
				$vip_id = $member_info[$data['username']];
				$data['username'] = "<span style= \"color: $vip_info[$vip_id]\">$author</span>";
				$data['username_2'] = $author;
				return $data;
			}
			foreach ($data as $key=>$val){
				$vip_id = $member_info[$val['username']];
				$author = $val['username'];
				if($vip_id){
					$data[$key]['username'] = "<span style= \"color: $vip_info[$vip_id]\">$author</span>";
					$data[$key]['username_2'] = $author;
				}
			}

		}
		return $data;
	}


}
?>
