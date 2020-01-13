<?php
/**
  * 模型 model
  *
  **/
class Record_model extends CI_Model {

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
		$this->db->from('record');
		$query = $this->db->get();
		return $query->row_array();

	}

	/**
	  * 获取多条数据
	  */
	function getAll($where,$field='*',$limit='',$group='',$order = '') {

		$this->db->select($field);
		$this->db->where($where);
		$this->db->group_by($group);
		$this->db->order_by($order);
		$this->db->limit($limit);
		$this->db->from('record');
		$query = $this->db->get();
		return $query->result_array();
	}



   /**
	* 修改数据
    */
	function update($data,$where) {

		return $this->db->set ( $data )->where ( array ('groupid' => $where ) )->update ($data);
		
	}


	 /**
	   * 删除数据
	   *
	   */
	function remove($where=[]) {
		return $this->db->where ($where )->delete ('record');

	}

	/**
	 * 插入单条数据
	 *
	 */
	function insert($data=[]) {

		return $this->db->insert('record',$data);

	}


}
?>
