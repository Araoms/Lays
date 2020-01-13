<!--{template header}-->
<link rel="stylesheet" media="all" href="{SITE_URL}static/css/widescreen/css/category.css" />
<link rel="stylesheet" media="all" href="{SITE_URL}static/css/widescreen/css/list.css" />
<style>

    #list-group > div {
        font-family: public_fonts_Stonebody;
    }

    #start{

        line-height: 120px;
        font-size: 35px;
        color: #FFB6C1;
        text-align: center;
     }

    .subnav-wrap .subnav-contentbox .subnav-content>li {
        padding-left: 0px;
        padding-right: 30px;
    }

    .index .main .recommend-collection .c_current{
        color:#3280fc;
        display: inline-block;
        margin: 0 18px 18px 0;
        min-height: 32px;
        background-color: #fff;
        border: 1px solid #3280fc;
        border-radius: 4px;
        vertical-align: top;
        overflow: hidden;
    }

    .index .main .recommend-collection .morecat{
        display:none;
    }

</style>
<div class="user-home bg-white" >
    <div class="container index">
        <form class="form-horizontal mar-t-1" action="{url user/addxinzhi}"  method="post" enctype="multipart/form-data">
            <div class="row main">
                <div class="col-md-20">
                    <div class="dongtai">
                        <p>
                            <strong class="font-18">技术题库</strong>
                        </p>

                        <hr>
                        <input type="hidden" name="topicclass" value="{$topic['articleclassid']}" id="topicclass"/>
                        <input type="hidden" name="upimg" id="upimg" value="{$topic['image']}"/>
                        <input type="hidden" name="views" value="{$topic['views']}"/>
                        {if isset($topic['id'])}
                        <input type="hidden" value="{$topic['id']}" name="id" />
                        <input type="hidden" value="{$topic['isphone']}" name="isphone" />
                        <input type="hidden" value="{$topic['image']}" name="image" />
                        {/if}

                        <div class="form-group">

                            <div class="col-md-24 has-error">
                                <div class="help-block alert alert-primary ">


                                    <div class="bar_l">

                        <span><a  class="btn btn-success"   id="changecategory" href="javascript:showcategory()">选择题库分类</a>
                     <span id="selectedcate" class="selectedcate mar-lr-1">{$catmodel['name']}</span>
                     <a  class="btn btn-hollow" id="beginexercises" href="javascript:begin()" style="display: none;">开始做题</a>
                     <a  class="btn btn-hollow" id="countdown" href="javascript:countdown()" style="display: none;">倒计时：
                     <span id="btnSend"></span>
                     </a>
                     <a  class="btn btn-delete" id="end" href="javascript:end()" style="display: none;">提前结束
                     </a>
                     <a  class="btn btn-delete" href="javascript:;"  id="default_topic" style="display: none;">
                     </a>

 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list-group" id="list-group">
                            <div   id="start">  准备开始吧~！ </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="myLgModal" style="z-index:999999999">
    <div class="modal-dialog modal-md" style="width: 460px; top: 50px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
                <h4 class="modal-title">选择分类</h4>
            </div>
            <div class="modal-body">
                <div id="dialogcate">
                    <form name="editcategoryForm" action="{url question/movecategory}" method="post">
                        <input type="hidden" name="qid" value="{$question['id']}" />
                        <input type="hidden" name="category" id="categoryid" />
                        <input type="hidden" name="selectcid1" id="selectcid1" value="{$question['cid1']}" />
                        <input type="hidden" name="selectcid2" id="selectcid2" value="{$question['cid2']}" />
                        <input type="hidden" name="selectcid3" id="selectcid3" value="{$question['cid3']}" />
                        <table class="table table-striped">
                            <tr valign="top">
                                <td width="125px">
                                    <select  id="category1" class="catselect" size="8" name="category1" ></select>
                                </td>
                                <td align="center" valign="middle" width="25px"><div style="display: none;" id="jiantou1">>></div></td>
                                <td width="125px">
                                    <select  id="category2"  class="catselect" size="8" name="category2" ></select>
                                </td>
                                <td align="center" valign="middle" width="25px"><div style="display: none;" id="jiantou2">>>&nbsp;</div></td>
                                <td width="125px">
                                    <select id="category3"  class="catselect" size="8"  name="category3" ></select>
                                </td>
                            </tr>
                            <tr>
                            <td colspan="5">
                    <span>
                                 <input  type="button" id="layer-submit" class="btn btn-success" value="确&nbsp;认" onclick="selectcate();"/>
                    </span>
                    <span>
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    </span>
                            </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    /**
     *  读取本页面状态
     * */
    $(function () {
        //读取cookie
        if ($.cookie("end_time") != undefined && !isNaN($.cookie("end_time"))) {  //读取到了cookie值
            var end_time = $.cookie("end_time");
            var now = new Date().getTime();  //当前时间戳
            var locksecends = parseInt((end_time - now) / 1000);
            if (locksecends <= 0) {    //未做题
                $.cookie("end_time", null);

            } else {                   //还在做题
                $("#changecategory").html("更改");
                $("#beginexercises").hide();
                $("#countdown").show();
                $("#end").show();
                $("#selectedcate").text($.cookie("class_name")).show();
                var Question_number = $.cookie('Question_number'); //当前第几题
                var storage = window.localStorage;
                var data =  storage.getItem('data');// 读取题
                var jsonData=JSON.parse(data);
                $("#start").hide(3000,function () {
                    rendering_topic(Question_number,jsonData[Question_number]);
                    LockButton('#btnSend', locksecends);
                });

            }
        }

    });

    var classification_id1,classification_id2,classification_id3,class_name;

    function checkarticle(){
        if($("#topicclass")==''){
            alert("请选择文章分类");
            return false;
        }
    }

    function showcategory(){
        $('#myLgModal').modal({
            position    :50,
            moveable : true,
            show     : true
        })
    }

    var category1 = {$categoryjs[category1]};
    var category2 = {$categoryjs[category2]};
    var category3 = {$categoryjs[category3]};

    $(document).ready(function() {
        initcategory(category1);

    });

    /**
     *  选择分类
     * */
    function selectcate() {
        var selectedcatestr = '';
        var category1 = $("#category1 option:selected").val();
        var category2 = $("#category2 option:selected").val();
        var category3 = $("#category3 option:selected").val();

        if (category1 > 0) {
            selectedcatestr = $("#category1 option:selected").html();
            $("#topicclass").val(category1);

        }
        if (category2 > 0) {
            selectedcatestr += " > " + $("#category2 option:selected").html();
            $("#topicclass").val(category2);

        }
        if (category3 > 0) {
            selectedcatestr += " > " + $("#category3 option:selected").html();
            $("#topicclass").val(category3);

        }

        classification_id1 = category1;
        classification_id2 = category2;
        classification_id3 = category3;
        class_name = selectedcatestr;

        $("#selectedcate").html(selectedcatestr);
        $("#changecategory").html("更改");
        $("#myLgModal").modal("hide");
        $("#beginexercises").show();

    }

    /**
     * 开始做题
     * 重新答题
     * */
    function begin() {
        if(!window.localStorage){
            alert("浏览器不支持localstorage ，请换个浏览器 或该升级版本了");
        }else {
            if($.cookie("end_time") != undefined && !isNaN($.cookie("end_time"))){
                alert('请先结束再重新开始答题');
            }else {
                $("#start").text('Ready Go!').hide(3000,function () {
                    var data = {
                        cid1:classification_id1,
                        cid2:classification_id2,
                        cid3:classification_id3
                    };
                    get_choice_question(data);
                    LockButton('#btnSend',$.cookie('Default_time'));       //倒计时
                    $.cookie("class_name",class_name);
                    $("#beginexercises").hide();
                    $("#countdown").show();
                    $("#end").show();
                    $("#default_topic").show();

                });
            }
        }
    }

    /**
     * 手动结束做题
     * */
    function end(){
        record_submission();
        $.cookie("end_time", null);
        $.cookie('record_error_data',null);
        $.cookie('Question_number',null);
        // $.cookie('Default_time',null);
        $("#beginexercises").text('重新答题').show();
        $("#countdown").hide();
        $("#end").hide();
        $("#default_topic").hide();
        clearInterval(timer);
    }


    /**
     * 从后台中获取数据、
     *
     */
    function  get_choice_question(data){

        $.ajax({
            type: 'post',
            url: "{SITE_URL}?itembank/start",
            data: data,
            dataType: "json",
            success: function(msg){
                if(msg.status){
                    var storage = window.localStorage;
                    var data=JSON.stringify(msg.data);
                    var str =    "共 <span> "+msg.default_topic+" </span> 题";
                    $("#default_topic").html(str);
                   // 存储主要数据字段
                    storage.setItem('data',data);
                    $.cookie('Question_number',0); //开始第一题、
                    $.cookie('Default_time',msg.default_time); //用时、
                    rendering_topic(0,msg.data[0]);

                }else {
                    alert(msg.msg);
                }
            }
        });
    }

    /**
     * 渲染 题型
     * Question_number 第几题、
     * data 题目、
     * */
    function rendering_topic(Question_number,data){

        var example_1 = '';
            ++Question_number;

        if(data.example_1 !='' && data.example_1 !=null && data.example_1 != undefined){
             example_1 = "<a href='#' class='list-group-item'>" +
                "<pre>" +
                "列： " +
                        "              " +
                           "  data.example_1         " +
                "</pre>" +
                "</a>" ;
        }

        var str =
            "<a href='#' class='list-group-item'>第 "+(Question_number)+" 题："+data.subject_1+" " +
            "<i class='icon icon-heart' style='float:right; font-size: 30px;' title='点个赞咯 ~'></i></a>" +
                        example_1 +
            "<a href='javascript:;' class='list-group-item item' id='answer_1'> &nbsp; &nbsp; A. &nbsp; "+data.answer_1+"</a>" +
            "<a href='javascript:;' class='list-group-item item' id='answer_2'> &nbsp; &nbsp; B. &nbsp; "+data.answer_2+"</a>" +
            "<a href='javascript:;' class='list-group-item item' id='answer_3'> &nbsp; &nbsp; C. &nbsp; "+data.answer_3+"</a>" +
            "<a href='javascript:;' class='list-group-item item' id='answer_4'> &nbsp; &nbsp; D. &nbsp; "+data.answer_4+" </a>";


        $("#list-group").hide(1000,function () {
            $("#list-group").html(str).show(1000);
        }) ; //消失

    }

    /**
     * 做题中
     *
     * */
    $("body").on('click','.item',function () {

      // 1.判断对与错
        var  rightkey =  $(this).attr('id');  //选择答案
        var Question_number = $.cookie('Question_number'); //当前第几题
        var storage = window.localStorage;
        var data =  storage.getItem('data');// 读取题
        var jsonData=JSON.parse(data);
        var state = 0; // 正确还是错误
        if(jsonData[Question_number].rightkey == rightkey){ //回答正确
            state = 1;
            $(this).css('background-color','#08ac54').css('color','white');
        }else { //回答错误
            $(this).css('background-color','#f02f58').css('color','white');
        };

        //2.记录对与错、
        var record_error = {};
        record_error.Question_number = 0;  //第几题
        record_error.item_bank_id = jsonData[Question_number].id;  //题库id
        record_error.state = state;
        var record_error_data = [];
        if(Question_number >0){
              record_error_data =  $.cookie('record_error_data');
              record_error_data = JSON.parse(record_error_data);

        }
        record_error_data.push(record_error);
        record_error_data =JSON.stringify(record_error_data);
        $.cookie('record_error_data',record_error_data);
        $.cookie('Question_number',++Question_number);

         //判断是否最后一题
         if(jsonData.length == (Question_number)){
             end();
         }else {
             // 3. 渲染，进入下一题
             rendering_topic(Question_number,jsonData[Question_number]);
         }

    });


    /**
     * 做题倒计时
     * */
    var LockButton = function (btnObjId, locksecends) {
        //1.获取当前系统时间
        //2.获取 locksecends 后的系统时间
        //3.用cookie保存到期时间
        //4.每次加载后获取cookie中保存的时间
        //5.用到期时间减去当前时间获取倒计时
        var end_time = $.cookie("end_time");
        if (end_time == null || end_time == undefined || end_time == 'undefined' || end_time == 'null') {
            var now = new Date().getTime();  //当前时间戳
            var endtime = locksecends * 1000 + now;  //结束时间戳
            $.cookie("end_time", endtime);  //将结束时间保存到cookie

        }
        $(btnObjId).addClass('disabled').attr('disabled', 'disabled').text('(' + locksecends + ')秒后自动结束');
        $('body').off('click', '#btnSendSMS');

        timer = setInterval(function () {
            locksecends--;
            var Minute = Math.floor(locksecends/60);
            var Second = (locksecends%60);

            $(btnObjId).text('(' + Minute + ':' + Second + ')秒后自动结束');
            if (locksecends <= 0) {   //倒计时结束
                end();
            }
        }, 1000);
    };


   /**
    *  评分 记录正确/错误 提交保存
    *
    * */
   function record_submission(){

       //1.评分
       var time =   $.cookie('Default_time') -  Math.floor(($.cookie("end_time") - new Date().getTime())/1000) -1;
       var Minute = Math.floor((time/60));
       var Second = Math.floor(time%60);
       var  record_error_data = $.cookie('record_error_data');
            record_error_data = JSON.parse(record_error_data);
       var correct = 0;
       var error = 0;
       if(record_error_data !=null ){
           $.each(record_error_data,function (i,k) {
               if(k.state){
                   correct ++;
               }else {
                   error ++;
               }
           });
       }else {
           var str  =  "<p>未做题不会有记录的啦~！</p>";
           str = "<div   id='start'>  "+ str +" </div>";
           $("#list-group").html(str).show(1000);
           return false;
       }

       var data = {
            start_time: Math.round(($.cookie("end_time")/1000) - $.cookie('Default_time')),
            use_time_minute: Minute,
            use_time_second: Second,
            record_error_data: record_error_data  // 做题详情

       };
       $.ajax({
           type: 'post',
           url: "{SITE_URL}?itembank/end",
           data: data,
           dataType: "json",
           success: function(msg){
               if(msg.status){
                   var str  =   "<p>本次用时：" + Minute + "分  " + Second + "  秒</p>" +
                       "<p> 正确：" + correct + "题 &nbsp; 错误：" + error + "题</p>" +
                       "<p> 等级：" + msg.data.grade + " &nbsp;  称号：" + msg.data.title + " &nbsp; </p>"+
                       "<p> 得分：" + msg.data.surplus + " 分</p>";
                   str = "<div   id='start'>  "+ str +" </div>";
                   $("#list-group").html(str).show(1000);
               }else {
                   alert(msg.msg);
               }
           }
       });


   }



</script>
<script src="{SITE_URL}static/js/cookie/jquery.cookie.js"></script>
<!--{template footer}-->

