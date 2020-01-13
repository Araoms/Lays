<?php

defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Vip extends CI_Controller
{
    var $whitelist;

    function __construct()
    {
        $this->whitelist = "attentto,search,viewtopic,clist";
        parent::__construct();
        $this->load->model('vip_model');
        $this->load->model('vip_member_model');
        $this->load->model('vip_recharge_record_model');

    }


    //会员特权
    function index()
    {
        $status = null !== $this->uri->segment(2) ? $this->uri->segment(2) : 'all';
        $vip_info = $this->vip_model->getAll();
        $navtitle = "Vip特权";
        include template('vip_index');

    }


    //充值中心
    function recharge(){
        $this->load->model('payment_model');
        $status = null !== $this->uri->segment(2) ? $this->uri->segment(2) : 'all';
        $vip_info = $this->vip_model->getAll();
        $payment = $this->payment_model->getAll(array('payment_status'=>0));
        $navtitle = "充值中心";
        include template('vip_recharge');

    }


    //我的会员
    function member(){

        $status  = null !== $this->uri->segment(2) ? $this->uri->segment(2) : 'all';
        $user_info = $this->vip_member_model->get(['due_status'=>0,'uid'=>$this->user['uid']]);
        $vip_info =  $this->vip_model->getAll();

        $vip_name = '<span>普通会员</span>'; //普通会员
        if(!empty($user_info)){            //曾经充值过会员、
            if($user_info['due_time'] < TIME){  //会员已到期、
                $vip_name = '<span>普通会员 (会员已到期) </span>'; // 会员已到期
            } elseif ($user_info['due_time'] < (TIME + $user_info['remind_time'])){ //小于 remind_time 到期提醒
                $vip_name ="<span style='color: ".$vip_info[$user_info['vip_id']-1]['iickname']."'>".array_column($vip_info,'grade','vip_id')[$user_info['vip_id']]."(即将到期)</span>";
            } else{
                $vip_name ="<span style='color: ".$vip_info[$user_info['vip_id']-1]['iickname']."'>".
                    array_column($vip_info,'grade','vip_id')[$user_info['vip_id']
                    ]."</span>";
            }
        }
        $navtitle = "我的会员";
        include template('vip_member');
    }


    //设置会员即将到期
    function  overdue(){
        $data = array('status'=>200,'msg'=>'设置成功');
        $user_info = $this->vip_member_model->get(['due_status'=>0,'uid'=>$this->user['uid']]);
        if(empty($user_info)){
            $data = array('status'=>500,'msg'=>'没有会员信息');
        }
        if($user_info['due_time'] > (TIME + $user_info['remind_time'])){
            $update_data['due_time'] = TIME + (86400 *2);
            $update_data['remind_status'] = 1;
            $this->vip_member_model->update($update_data,['uid'=>$this->user['uid']]);
        }else{
            $data = array('status'=>500,'msg'=>'会员已经是快要到期状态');
        }
        echo  json_encode($data);
    }

    //充值记录
    function  member_record(){
        $status  = null !== $this->uri->segment(2) ? $this->uri->segment(2) : 'all';
        $user_info = $this->vip_member_model->get(['uid'=>$this->user['uid']]);
        if(empty($user_info)){
        }else{
            $page = max ( 1, intval ( $this->uri->rsegments [3] ) );
            $pagesize = $this->setting ['list_default'];
            $startindex = ($page - 1) * $pagesize;
            $limit = ($pagesize * ($page - 1)).','.$pagesize;
            $recharge_record = $this->vip_recharge_record_model->pageAll(
                ['uid'=>$this->user['uid']],'',$limit);
            $recharge_data = $recharge_record['data'];
            $departstr = page ( $recharge_record['rownum'], $pagesize, $page, "vip/member_record" );
       }
        include template('vip_member_record');

    }

    //删除充值记录
    function delete_record(){

        $user_info = $this->vip_member_model->get(['uid'=>$this->user['uid']]);


    }


    /**
     *  会员充值
     *
     **/
    function  member_recharge(){

        $data = array('status'=>200,'msg'=>'请求成功');
        $this->load->model('payment_model');
        $payment = $this->payment_model->get(array('payment_status'=>0,'payment_pinyin'=>$_POST['paymentMode']));
        if(empty($_POST['vip_id']) || empty($_POST['month']) || empty($payment)){
            echo  json_encode(array('status'=>500,'msg'=>'参数错误')); die;
        }else{
            $vip_info = $this->vip_model->getAll();
            $OpenMoney = $this->vip_recharge_record_model->OpeningVip_1($_POST,$vip_info);
            $order_id = $this->vip_recharge_record_model->generate();
            $vip_member_info = $this->vip_member_model->get(['uid'=>$this->user['uid']]);
            if($OpenMoney['status'] == 200){
                //会员订单表、
                $attr_vip_recharge_record =  array(             //会员订单表、
                    'uid'=>$this->user['uid'],
                    'order_id'=>$order_id,
                    'add_time'=>TIME,
                    'vip_id'=>$OpenMoney['data']['vip_id'],
                    'recharge_time'=>'',
                    'due_time'=>'',
                    'this_recharge_money'=>$OpenMoney['data']['amount_money'],
                    'days'=>$OpenMoney['data']['days'],
                    'use_times'=>$OpenMoney['data']['use_times'],
                    'payment'=>'1',
                    'vip_status'=>'20',
                    'recharge'=>$OpenMoney['data']['wealth']
                );
                $recharge_record = $this->vip_recharge_record_model->insert($attr_vip_recharge_record);
                if(empty($recharge_record)){
                   echo  json_encode(array('status'=>500,'msg'=>'开通失败，创建订单失败、')); die;
                }
                if($_POST['paymentMode'] == 'zhifubao'){
                    $AliPay = $this->AliPay($OpenMoney,$payment,$order_id);
                    if($AliPay['code'] == 10000 && $AliPay['msg'] =='Success'){
                        echo  json_encode(array('status'=>200,'msg'=>'请求成功','qr_code'=>$AliPay['qr_code'])); die;
                    }else{
                        echo  json_encode(array('status'=>500,'msg'=>'生成二维码失败、')); die;
                    }
                }elseif ($_POST['paymentMode'] == 'weixin'){
                    $Weixin = $this->Weixin();
                }


            }

        }

    }


    /**
      * 支付宝发起支付
      **/
    public function AliPay($OpenMoney,$payment,$order_id){

        require_once FCPATH.'/vendor/autoload.php';
        $config = unserialize($payment['config']);

        $config = [
            // 沙箱模式
            'debug'       => true,
            // 应用ID
            'appid'       => '2016090900468879',
            // 支付宝公钥(1行填写)
            'public_key'  => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAtU71NY53UDGY7JNvLYAhsNa+taTF6KthIHJmGgdio9bkqeJGhHk6ttkTKkLqFgwIfgAkHpdKiOv1uZw6gVGZ7TCu5LfHTqKrCd6Uz+N7hxhY+4IwicLgprcV1flXQLmbkJYzFMZqkXGkSgOsR2yXh4LyQZczgk9N456uuzGtRy7MoB4zQy34PLUkkxR6W1B2ftNbLRGXv6tc7p/cmDcrY6K1bSxnGmfRxFSb8lRfhe0V0UM6pKq2SGGSeovrKHN0OLp+Nn5wcULVnFgATXGCENshRlp96piPEBFwneXs19n+sX1jx60FTR7/rME3sW3AHug0fhZ9mSqW4x401WjdnwIDAQAB',
            // 支付宝私钥(1行填写)
            'private_key' => 'MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQC3pbN7esinxgjE8uxXAsccgGNKIq+PR1LteNTFOy0fsete43ObQCrzd9DO0zaUeBUzpIOnxrKxez7QoZROZMYrinttFZ/V5rbObEM9E5AR5Tv/Fr4IBywoS8ZtN16Xb+fZmibfU91yq9O2RYSvscncU2qEYmmaTenM0QlUO80ZKqPsM5JkgCNdcYZTUeHclWeyER3dSImNtlSKiSBSSTHthb11fkudjzdiUXua0NKVWyYuAOoDMcpXbD6NJmYqEA/iZ/AxtQt08pv0Mow581GPB0Uop5+qA2hCV85DpagE94a067sKcRui0rtkJzHem9k7xVL+2RoFm1fv3RnUkMwhAgMBAAECggEAAetkddzxrfc+7jgPylUIGb8pyoOUTC4Vqs/BgZI9xYAJksNT2QKRsFvHPfItNt4Ocqy8h4tnIL3GCU43C564B4p6AcjhE85GiN/O0BudPOKlfuQQ9mqExqMMHuYeQfz0cmzPDTSGMwWiv9v4KBH2pyvkCCAzNF6uG+rvawb4/NNVuiI7C8Ku/wYsamtbgjMZVOFFdScYgIw1BgA99RUU/fWBLMnTQkoyowSRb9eSmEUHjt/WQt+/QgKAT2WmuX4RhaGy0qcQLbNaJNKXdJ+PVhQrSiasINNtqYMa8GsQuuKsk3X8TCg9K6/lowivt5ruhyWcP2sx93zY/LGzIHgHcQKBgQDoZlcs9RWxTdGDdtH8kk0J/r+QtMijNzWI0a+t+ZsWOyd3rw+uM/8O4JTNP4Y98TvvxhJXewITbfiuOIbW1mxh8bnO/fcz7+RXZKgPDeoTeNo717tZFZGBEyUdH9M9Inqvht7+hjVDIMCYBDomYebdk3Xqo4mDBjLRdVNGrhGmVQKBgQDKS/MgTMK8Ktfnu1KzwCbn/FfHTOrp1a1t1wWPv9AW0rJPYeaP6lOkgIoO/1odG9qDDhdB6njqM+mKY5Yr3N94PHamHbwJUCmbkqEunCWpGzgcQZ1Q254xk9D7UKq/XUqW2WDqDq80GQeNial+fBc46yelQzokwdA+JdIFKoyinQKBgQCBems9V/rTAtkk1nFdt6EGXZEbLS3PiXXhGXo4gqV+OEzf6H/i/YMwJb2hsK+5GQrcps0XQihA7PctEb9GOMa/tu5fva0ZmaDtc94SLR1p5d4okyQFGPgtIp594HpPSEN0Qb9BrUJFeRz0VP6U3dzDPGHo7V4yyqRLgIN6EIcy1QKBgAqdh6mHPaTAHspDMyjJiYEc5cJIj/8rPkmIQft0FkhMUB0IRyAALNlyAUyeK61hW8sKvz+vPR8VEEk5xpSQp41YpuU6pDZc5YILZLfca8F+8yfQbZ/jll6Foi694efezl4yE/rUQG9cbOAJfEJt4o4TEOaEK5XoMbRBKc8pl22lAoGARTq0qOr9SStihRAy9a+8wi2WEwL4QHcmOjH7iAuJxy5b5TRDSjlk6h+0dnTItiFlTXdfpO8KhWA8EoSJVBZ1kcACQDFgMIA+VM+yXydtzMotOn21W4stfZ4I6dHFiujMsnKpNYVpQh3oCrJf4SeXiQDdiSCodqb1HlKkEc6naHQ=',
            // 支付成功通知地址
            'notify_url'  => '', // 可以应用的时候配置哦
            // 网页支付回跳地址
            'return_url'  => '/index.php?dsxxada', // 可以应用的时候配置哦
        ];
        try {

            // 实例支付对象
            $pay = We::AliPayScan($config); //公共请求参数
            // 参考链接：https://docs.open.alipay.com/api_1/alipay.trade.page.pay
            $result = $pay->apply([          //请求参数
                'out_trade_no' => $order_id, // 商户订单号
                'total_amount' => '1',    // 支付金额
                'subject'      => '支付订单描述', // 支付订单描述
            ]);
            return  $result;
        } catch (Exception $e) {

            // 异常处理
            echo $e->getMessage();

        }




    }


    /**
     * 微信发起支付
     **/
    public function WeiXin(){

        try {

            // 实例支付对象
            $pay = We::AliPayWeb($config);
            // $pay = new \AliPay\Web($config);

            // 参考链接：https://docs.open.alipay.com/api_1/alipay.trade.page.pay
            $result = $pay->apply([
                'out_trade_no' => time(), // 商户订单号
                'total_amount' => '1',    // 支付金额
                'subject'      => '支付订单描述', // 支付订单描述
            ]);

            echo $result; // 直接输出HTML（提交表单跳转)

        } catch (Exception $e) {

            // 异常处理
            echo $e->getMessage();

        }
    }


}
?>