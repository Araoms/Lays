<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Admin_vip extends CI_Controller {

    function __construct() {
        parent::__construct ();
        $this->load->model ( 'user_model' );
        $this->load->model ( 'vip_model' );
        $this->load->model ( 'vip_member_model' );
        $this->load->model ( 'vip_recharge_record_model' );
        $this->load->model ( 'short_message_template_model' );
    }

    /**
     * 会员列表
     **/
    function index($msg = '') {

        $message = $msg;
        @$page = max ( 1, intval ( $this->uri->segment ( 3 ) ) );
        $pagesize = $this->setting ['list_default'];
        $startindex = ($page - 1) * $pagesize;
        $limit = $startindex.','.$pagesize;
        $viplist = array_column($this->vip_model->getAll(array(),'grade,vip_id'),'grade','vip_id');
        $vip_member_count = $this->vip_member_model->get_count();
        if($vip_member_count){
            $vip_member_list = $this->vip_member_model->getAll(array(),'',$limit);
            $uid = array_column($vip_member_list,'uid');
            $user_name = $this->user_model->getAll(array(),'uid,username','','','uid',$uid);
            $user_name = array_column($user_name,'username','uid');
        }
        $departstr = page ( $vip_member_count, $pagesize, $page, "admin_vip/index" );
        include template ( 'vip_list', 'admin' );
    }

    /**
     * 会员设置
     *
     **/
    function vip_set($msg = ''){
        $message = $msg;
        if(chksubmit() && $message ==''){

            $update_1 = array(
                'recharge'=>$_POST['recharge'],
                'firstlanding'=>$_POST['firstlanding'],
                'answer'=>$_POST['answer'],
                'publish_articles'=>$_POST['publish_articles'],
                'invitationregister'=>$_POST['invitationregister'],
                'iickname'=>$_POST['iickname'],
                'pack_year'=>$_POST['pack_year'],
                'halfyear'=>$_POST['halfyear'],
            );

            $update_2 = array(
                'recharge'=>$_POST['recharge_1'],
                'firstlanding'=>$_POST['firstlanding'],
                'answer'=>$_POST['answer_1'],
                'publish_articles'=>$_POST['publish_articles_1'],
                'invitationregister'=>$_POST['invitationregister_1'],
                'iickname'=>$_POST['iickname_1'],
                'pack_year'=>$_POST['pack_year_1'],
                'halfyear'=>$_POST['halfyear_1'],
            );

            $update_3 = array(
                'recharge'=>$_POST['recharge_2'],
                'firstlanding'=>$_POST['firstlanding_2'],
                'answer'=>$_POST['answer_2'],
                'publish_articles'=>$_POST['publish_articles_2'],
                'invitationregister'=>$_POST['invitationregister_2'],
                'iickname'=>$_POST['iickname_2'],
                'pack_year'=>$_POST['pack_year_2'],
                'halfyear'=>$_POST['halfyear_2'],
            );

            $res_1 =  $this->vip_model->update($update_1,['vip_id'=>1]);
            $res_2 =  $this->vip_model->update($update_2,['vip_id'=>2]);
            $res_3 =  $this->vip_model->update($update_3,['vip_id'=>3]);
            if($res_1 && $res_2 &&$res_3){
                $this->vip_set ( '修改成功' );
            }else{
                $this->vip_set ( '修改失败' );
            }
        }else{
            $viplist = $this->vip_model->getAll(array());
            include template ( 'vip_set', 'admin' );
        }



    }

    /**
     * 会员搜索
     *
     */
    function search() {

        $search = $_POST;
        @$page = max ( 1, intval ( $this->uri->segment ( 11 ) ) );
        $pagesize = $this->setting ['list_default'];
        $startindex = ($page - 1) * $pagesize;

        $condition = '1=1 ';
        if (isset ( $search ['srchname'] ) && '' != trim ( $search ['srchname'] )) {
            $condition .= " AND u.username like '" . trim ( $search ['srchname'] ) . "%' ";
        }
        if (isset ( $search ['srchuid'] ) && '' != trim ( $search ['srchuid'] )) {
            $condition .= " AND u.uid =" . intval ( $search ['srchuid'] );
        }
        if (isset ( $search ['srchemail'] ) && '' != trim ( $search ['srchemail'] )) {
            $condition .= " AND u.email = '" . trim ( $search ['srchemail'] ) . "'";
        }
        if (isset ( $search ['srchregdatestart'] ) && '' != trim ( $search ['srchregdatestart'] )) {
            $datestart = strtotime ( $search ['srchregdatestart'] );
            $condition .= " AND v.recharge_time >= $datestart ";
        }
        if (isset ( $search ['srchregdateend'] ) && '' != trim ( $search ['srchregdateend'] )) {
            $dateend = strtotime ( $search ['srchregdateend'] );
            $condition .= " AND v.recharge_time <= " . $dateend;
        }

        $sql = "SELECT u.username,u.email,v.* FROM  '{$this->db->dbprefix}user' u LEFT JOIN '{$this->db->dbprefix}vip_member' v ";
        $sql .= "  ON u.uid = v.uid WHERE $condition  ";
        $usernum = $this->vip_member_model->get_count($sql);
        if($usernum){
            $sql .= " LIMIT $startindex,$pagesize ";
            $vip_member_info  =  $this->vip_member_model->left_user_all ($sql) ;
        }
        $departstr = page ( $usernum,$pagesize,$page, "admin_vip/index/$search[srchname]/$search[srchuid]/$search[srchemail]/$search[srchregdatestart]/$search[srchregdateend]/" );
        include template ( 'vip_list', 'admin' );

    }

    /**
     * 编辑会员用户
     *
     **/
    function edit($msg = '') {

        $uid = (null !== $this->uri->segment ( 3 )) ? intval ( $this->uri->segment ( 3 ) ) : $this->input->post ( 'uid' );
        $vip_info = $this->vip_model->getAll(array(),'vip_id,grade');
        if (chksubmit() && $msg =='') {
            $attr = array(
                'vip_id'=>$_POST['vip_id'],
                'recharge_time'=>strtotime($_POST['recharge_time']),
                'due_time'=>strtotime($_POST['due_time']),
                'this_recharge_money'=>$_POST['this_recharge_money'],
                'recharge_amount'=>$_POST['recharge_amount'],
                'vip_member'=>$_POST['vip_member'],
                'service_times'=>$_POST['service_times'],
            );
            $res =  $this->vip_member_model->update($attr,['uid'=>$_POST['uid']]);
            if($res){
                $message = '用户会员编辑成功!';
                $this->index($message);
            }else{
                $message = '用户会员编辑失败!';
                $this->edit($message);
            }

        }else{

            $sql = "SELECT u.username,u.email,v.* FROM  '{$this->db->dbprefix}user' u LEFT JOIN '{$this->db->dbprefix}vip_member' v ";
            $sql .= "  ON u.uid = v.uid WHERE u.uid = $uid  LIMIT 1";
            $vip_member_info  =  $this->vip_member_model->left_user_find ($sql);
            include template ( 'vip_edit', 'admin' );
        }

    }


    /**
     * 赠送会员
     * 判断会员 开通？ok 续费ok  换等级????
     * 只能换比现在高级 且以前等级的时间失效、
     *
     **/
    function give($msg = '') {
        $message = $msg;
        $uid = (null !== $this->uri->segment ( 3 )) ? intval ( $this->uri->segment ( 3 ) ) : $this->input->post ( 'uid' );

        $vip_info = $this->vip_model->getAll();
        if (chksubmit() && $message =='') {
            $OpenMoney = $this->vip_recharge_record_model->OpeningVip_1($_POST,$vip_info);
            $order_id = $this->vip_recharge_record_model->generate();
            $vip_member_info = $this->vip_member_model->get(['uid'=>$uid]);
            if($OpenMoney['status'] == 200){

                //会员表
                $attr_vip_member  = array(
                    'uid'=>$uid,
                    'vip_id'=>$OpenMoney['data']['vip_id'],
                    'recharge_time'=>TIME,
                    'due_time' => TIME + $OpenMoney['data']['days'],
                    'recharge_amount'=>$OpenMoney['data']['amount_money'],
                    'this_recharge_money'=>$OpenMoney['data']['amount_money'],
                    'duration'=>$OpenMoney['data']['days'],
                    'history_duration'=>$OpenMoney['data']['days'],
                    'vip_member'=>'0',
                    'remind_time'=>86400*3, //一般就三天 短信+邮件提醒
                    'remind_status' => '0',
                    'due_status'=> '0',
                    'service_times' =>$OpenMoney['data']['use_times'],
                    'use_times' =>'0');

                if(empty($vip_member_info)){  //新开通会员
                    $recharge_record_insert = $this->vip_member_model->insert($attr_vip_member);
                }else{  //续费或者 开通会员
                    $where = array();
                    $where['uid']= $uid;

                    if(!(($vip_member_info['due_time'] - (86400 *3)) < TIME) && !$vip_member_info['due_status']){
                        $this->give('开通失败，非同等级的会员需要到期内三天 才能开通 或续费、');
                        die;
                    }
                    // 如果是同等级会员加上剩余天数
                    $time = TIME;
                    if($vip_member_info['vip_id'] == $OpenMoney['data']['vip_id'] && $vip_member_info['due_time'] >TIME){
                        $time = $vip_member_info['due_time'] - $time;
                    }
                    $update_vip_member['vip_id'] = $OpenMoney['data']['vip_id'];
                    $update_vip_member['recharge_time'] = TIME;
                    $update_vip_member['due_time'] = $time + $OpenMoney['data']['days'];
                    $update_vip_member['recharge_amount'] = $OpenMoney['data']['amount_money']+$vip_member_info['recharge_amount'];
                    $update_vip_member['history_duration'] = $OpenMoney['data']['days']+$vip_member_info['history_duration'];
                    $update_vip_member['service_times'] = $vip_member_info['service_times'];
                    $update_vip_member['use_times'] = $vip_member_info['use_times'];
                    $update_vip_member['advance_overdue'] = 0;
                    $recharge_record_insert = $this->vip_member_model->update($update_vip_member,$where);
                }
                //会员订单表、
                $attr_vip_recharge_record =  array(             //会员订单表、
                    'uid'=>$_POST['uid'],
                    'order_id'=>$order_id,
                    'add_time'=>TIME,
                    'vip_id'=>$OpenMoney['data']['vip_id'],
                    'recharge_time'=>TIME,
                    'due_time'=>TIME + $OpenMoney['data']['days'],
                    'this_recharge_money'=>$OpenMoney['data']['amount_money'],
                    'days'=>$OpenMoney['data']['days'],
                    'use_times'=>$OpenMoney['data']['use_times'],
                    'payment'=>'1',
                    'vip_status'=>'20',
                    'recharge'=>$OpenMoney['data']['wealth']
                );
                $recharge_record = $this->vip_recharge_record_model->insert($attr_vip_recharge_record);
                if(empty($recharge_record)){
                    $this->give('开通失败，创建订单失败、');
                    die;
                }
                if($recharge_record_insert){
                    //发邮件
                    $template_info =  $this->short_message_template_model->get(array('template_id'=>4));
                    $template_content = str_replace('%v',
                        $vip_info[$OpenMoney['data']['vip_id']-1]['grade'],
                        $template_info['template_content']);
                    $template_content = str_replace('%m',
                        $_POST['month'],
                        $template_content);
                    $user_info =  $this->user_model->get(array('uid'=>$uid),'email,phone,active,phoneactive');
                    if($user_info['active']){
                        sendemailtouser ( $user_info['email'],
                            $template_info['template_name'],
                            $template_content );
                    }
                    $this->give('赠送成功');
                    die;
                }else{
                    $this->give('更新会员表失败');
                    die;
                }
            }else{
                $this->give($OpenMoney['msg']);

            }
        }
        include template ( 'vip_give', 'admin');


    }

    /**
     * 获取会员信息
     *
     **/
    function get_userinfo(){

        $data = ['status'=>200,'msg'=>'请求成功'];
        $like =  array('username'=>$_GET['username']);
        $user = $this->user_model->get(array(),'','',$like);
        if(empty($user)){
            $data['status'] = 500;
            $data['msg'] = '没有数据';
        }else{
            $data['data'] = $user;
        }
        echo  json_encode($data);
        die;
    }

}

?>