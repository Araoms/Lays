<?php
/**
  * 模型 model
  *
  **/
class copy_model_model extends CI_Model {

	public function __construct() {
		parent::__construct ();
		$this->load->database ();
	}

	/**
	  * 获取单条数据
	  **/
	function get($where=array(),$field='*',$group='') {


		$this->db->select($field);
		$this->db->where($where);
		$this->db->group_by($group);
		$this->db->from('copy_model');
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
		$this->db->from('copy_model');
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
	function remove($where=array()) {
		return $this->db->where ($where )->delete ( 'copy_model' );

	}

	/**
	 * 插入单条数据
	 *
	 */
	function insert($data=array()) {

		return $this->db->insert ( 'copy_model',$data );

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
	 * 分页、
	 */
	function pageAll($where=array(),$field='*',$limit='',$group='') {

		$limit = explode(',',$limit);
		$data = $this->db->select($field)->where($where)->limit($limit[1],$limit[0])
			->group_by($group)
			->from('vip_recharge_record')
			->get()
			->result_array();
		$rownum = $this->db->select('count(*)')->where($where)->from('vip_recharge_record')->get()->row_array();
		return $data = array(
			'data'=>$data,
			'rownum'=>$rownum
		);
	}



	/**
	 * 打印SQL语句
	 *
	 **/
	function last_sql(){

		echo  $this->db->last_query();
		die;

	}
}
?>
