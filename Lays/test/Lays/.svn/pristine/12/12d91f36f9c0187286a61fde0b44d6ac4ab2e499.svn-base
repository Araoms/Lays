<?php
/**
  * 模型 model
  *
  **/
class Technical_questions_model extends CI_Model {

	public function __construct() {
		parent::__construct ();
		$this->load->database ();
	}

	/**
	  * 获取单条数据
	  **/
	function get($where,$field='*',$group='') {


		$this->db->select($field);
		$this->db->where($where);
		$this->db->group_by($group);
		$this->db->from('technical_questions');
		$query = $this->db->get();
		return $query->row_array();

	}

	/**
	  * 获取多条数据
	  */
	function getAll($where=[],$field='*',$limit='',$group='') {

		$this->db->select($field);
		$this->db->where($where);
		$this->db->group_by($group);
		$this->db->limit($limit);
		$this->db->from('technical_questions');
		$query = $this->db->get();
		return $query->result_array();
	}



   /**
	* 修改数据
    */
	function update($data,$where) {

		return $this->db->set ( $data )->where ( array ('groupid' => $where ) )->update ( 'technical_questions' );
		
	}


	 /**
	   * 删除数据
	   *
	   */
	function remove($where=[]) {
		return $this->db->where ($where )->delete ( 'technical_questions' );

	}

}
?>
