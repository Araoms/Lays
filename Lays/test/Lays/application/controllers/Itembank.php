<?php

defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class Itembank extends CI_Controller {

    var $whitelist;
    function __construct() {
        $this->whitelist = "";
        parent::__construct ();
        $this->load->model ( 'category_model' );
        $this->load->model ( 'item_bank_model' );
        $this->load->model ( 'technical_score_model' );
        $this->load->model ( 'technical_questions_model' );
        $this->load->model ( 'record_model' );
    }


    function index() {

        $navtitle = "站内技术题库_";
        $seo_description = $this->setting ['site_name'] . '最近更新相关内容。';
        $seo_keywords = '站内技术题库';


//        $this->start();


        $categoryjs = $this->category_model->get_js ( 0, 2 );
        include template ( 'Itembank' );
    }


    //  点击开始做题
    //  选择题
    function start(){

        $_POST['cid1'] = 1;
        $_POST['cid2'] = 2;

        $technical_questions_info  = $this->technical_questions_model->get(array('id'=>1));
        $where = [ 'cid1'=>$_POST['cid1'],
            'cid2'=>$_POST['cid2']];
        $res =  $this->item_bank_model->getAll(
            $where,
            'subject_1,answer_1,answer_2,answer_3,answer_4,rightkey,id',
            $technical_questions_info['default_topic']);

        if(empty($res)){
            exit(json_encode(['status'=>'0','msg'=>'此分类下面没有题哦']));
        }else{
            exit(json_encode([
                 'status'=>'1','msg'=>'请求成功',
                 'data'=>$res,'default_time'=>$technical_questions_info['default_time'],
                 'default_topic'=>$technical_questions_info['default_topic']]));
        }

    }

    //结束做题
    function end()
    {
        $technical_score = $this->technical_score_model->getAll();
        $technical_questions_info  = $this->technical_questions_model->get(array('id'=>1));
        $data = array('status'=>'0','msg'=>'请求失败，没有表数据');
        if(empty($technical_score) ||empty($technical_questions_info)){
            exit(json_encode($data));
        }

        $start_time = $_POST['start_time'] ;              //开始时间戳
        $record_error_data = $_POST['record_error_data']; //做题记录
        if(empty($start_time) || empty($record_error_data)){
            $data['msg'] = '缺少传输参数';
            exit(json_encode($data));
        }
        $altogether = $technical_questions_info['default_topic'];   //一共多少题
        $how_many_topic = count($record_error_data);                //做了多少题
        $each_topic = 100/$altogether;                                //每道题多少分
        $do_wrong = 0;                                               //做错了多少题
        $error_id = '';                                             //做错了多少题 id
        $item_id = '';                                              //做了多少题 id
       foreach ($record_error_data as $key=>$val){
             if(!$val['state']){
                 $do_wrong++;
                 $error_id.=$val['item_bank_id'].',';
             }
                $item_id.=$val['item_bank_id'].',';

       }

        $error_id = substr($error_id,0,strlen($error_id)-1);
        $item_id = substr($item_id,0,strlen($item_id)-1);
        //计算总分、
        $total_score = ceil(($each_topic* ($how_many_topic-$do_wrong)) ); //总分100分

        $title = '引气入体';  //称号
        $grade = 'E-';  //评分
        foreach ($technical_score as $key=>$val){
            if($val['score_section_max'] >=$total_score &&  $val['score_section_min'] <=$total_score){
                $title = $val['title'];
                $grade = $val['grade'];
            }
        }

        $data['status'] = 1;
        $data['msg'] = '请求成功';
        $data['data'] = array(
                 'title'=>$title,
                 'surplus'=>$total_score,
                 'grade'=>$grade);
        $record_attr = array(
            'authorid'=>$this->user['uid'],
            'item_id'=> $item_id,
            'start_time'=>$start_time,
            'how_many_topic'=>$how_many_topic,
            'error'=>$error_id,
            'total_score'=>$total_score,
            'grade'=>$grade,
            'title'=>$title
        );
        $insert_res = $this->record_model->insert($record_attr);
        if(!$insert_res){
            $data['msg']= '记录表数据失败';
        }
        exit(json_encode($data));

    }


}