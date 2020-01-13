<?php
/**
  * 模型 model
  *
  **/
class Vip_model extends CI_Model {

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
		$this->db->from('vip');
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
		$this->db->from('vip');
		$query = $this->db->get();
		return $query->result_array();
	}



   /**
	* 修改数据
    */
	function update($data,$where) {

		return $this->db->update ('vip',$data,$where);
		
	}


	 /**
	   * 删除数据
	   *
	   */
	function remove($where=[]) {
		return $this->db->where ($where )->delete ( 'vip' );

	}

	/**
	 * 插入单条数据
	 *
	 */
	function insert($data=[]) {

		return $this->db->insert ( 'vip',$data );

	}


	/**
	  *  获取总数
	  **/
	function get_count(){
		return $this->db->count_all ('vip');
	}




}
?>
