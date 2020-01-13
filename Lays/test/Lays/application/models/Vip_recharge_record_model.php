<?php
/**
 * 模型 model
 *
 **/
class vip_recharge_record_model extends CI_Model {

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
		$this->db->from('vip_recharge_record');
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
		$this->db->from('vip_recharge_record');
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
		return $this->db->where ($where )->delete ( 'vip_recharge_record' );

	}

	/**
	 * 插入单条数据
	 *
	 */
	function insert($data=array()) {

		return $this->db->insert ( 'vip_recharge_record',$data);

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
	 *  开通会员计算金额1.
	 *  返回总财富值 、总消费金额、
	 **/
	function OpeningVip_1($Open,$vip_info){

		$vip_id = $Open['vip_id'];        //等级
		$month = $Open['month'];          //开通月份
		$data = array('status'=>200,'msg'=>'ok');
		if(empty($vip_id) || empty($month) || empty($vip_info)){
			$data['status'] = 400;
			$data['msg'] = '参数为空';
			return $data;
		}else{

			$wealth = 0;                      //总财富值
			$amount_money = 0;                //总消费
			$days = 0;                        //充值天数时间秒
			$use_times = 0;                   //"站长" 免费技术服务指导次数

			$monthly_selling_price = array_column($vip_info,'monthly_selling_price');
			$monthly_selling_price[] = 0;
			foreach ($vip_info as $key=>$value){
				if(!in_array($Open['monthly_selling_price'],$monthly_selling_price)){
						$data['status'] = 400;
						$data['msg'] = '开通价格参数错误';
						return $data;
				}

				if($value['vip_id'] == $vip_id){
					$amount_money = $value['monthly_selling_price'] * $month;
					if(!in_array($month,array(1,3,6,7,8,12))){
						$data['status'] = 400;
						$data['msg'] = '开通月份参数错误';
						return $data;
					}
					$wealth = $value['recharge'] * $month;
					$days = $month *31 *86400;
					if($month == 6 || $month == 8){
						$amount_money = ($amount_money * $value['halfyear']) /10;
						if($vip_id ==3){
							$use_times =1;
						}
					}elseif($month == 12){
						$amount_money = ($amount_money * $value['pack_year']) /10;
						if($vip_id ==3){
							$use_times =2;
						}
					}elseif ($month == 7){
						$wealth = 0;
						$amount_money = 0;
						$days = 7*86400;
					}

				}
			}

			 $data['data'] = [
				'amount_money'=>$amount_money,
				'wealth'=>$wealth,
				'vip_id'=>$vip_id,
				'days'=>$days,
				'use_times'=>$use_times,
			];
			return $data;
		}
	}



	/**
	 * 开通会员
	 * 确认开通、
	 */
	function OpeningVip_2(){



	}


	/**
	 * 开通会员
	 * 事件通知、
	 */
	function OpeningVip_3(){



	}


	/**
	 * 生成订单号
	 * 唯一值 不重复、
	 * 前缀 + 时间戳 + 英文字母大写两位、
	 **/
	function generate(){

           $prefix = 'Lays';
		   $time = time();
		   $number = rand(1000,9999);
		   $letter_key = array_rand(range('A', 'Z'),2);
		   $order_id = $prefix.$time.$number.range('A', 'Z')[$letter_key[0]].range('A', 'Z')[$letter_key[1]];
		   $order_info = $this->get(['order_id'=>$order_id]);
		   if($order_info){
		   	  $this->generate();
		   }else{
		   	return $order_id;
		   }
	}


	/**
	 * 分页、
	 */
	function pageAll($where=array(),$field='*',$limit='',$order_by='id desc') {

		$limit = explode(',',$limit);
		$data = $this->db->select($field)->where($where)->limit($limit[1],$limit[0])
			->order_by($order_by)
			->from('vip_recharge_record')
			->get()
			->result_array();
		$rownum = $this->db->select('count(*) as rownum')->where($where)->from('vip_recharge_record')->get()->row_array();
		return $data = array(
			'data'=>$data,
			'rownum'=>$rownum['rownum']
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
