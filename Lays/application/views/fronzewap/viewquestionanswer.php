<!--{template header}-->
 {eval $hidefooter=true;}

{eval $authoruid=$question['authorid'];}
<script>
var _qtitle="{$seo_title}";
{if 0!=$question['shangjin']}
_qtitle=_qtitle+"-【现金悬赏{$question['shangjin']}元】";
{/if}
	{eval $miaosu=$seo_description;}
	 {eval $miaosu=cutstr(str_replace('&nbsp;','',$miaosu),200,'...');}
	 {eval $miaosu=str_replace('"', '', $miaosu);}
	 {eval $miaosu=str_replace('“', '', $miaosu);}
	 {eval $miaosu=str_replace('”', '', $miaosu);}
	 var _qcontent="{eval echo trim($miaosu);}";
//var imgurl="{$question['author_avartar']}";
var imgurl="{$useranswer['author_avartar']}";

</script>
<style>
.yuyinplay{
	background:#41c074;
    width:180px;
    height:30px;
line-height:30px;
    border-radius:50px;
    text-align:center;
color:#fff;
  position:relative;

}
.ui-icon-voice{
	color:#fff;
    font-size:22px;
    position:relative;
    float:left;
     margin-left:10px;
     top:-8px;
}
.u-voice{
	color:#fff;

   font-size:13px;
    float:right;
     margin-right:10px;

}
.wtip{
	font-size:13px;
}
</style>

<section class="ui-container ">
           <div class="works-tag-wrap">
                       
                            
                              
                             <!--{if $taglist}-->
                                       <!--{loop $taglist $tag}-->

  <a href="{url tags/view/$tag['tagalias']}" title="{$tag['tagname']}" class="project-tag-14">{$tag['tagname']}</a>
                           
               
                <!--{/loop}--><!--{else}--><!--{/if}-->
                
                           
                        </div>
    <article class="article">
        <h1 class="title">{$question['title']}</h1>
        <div class="article-info ui-clear">

            <ul class="ui-row">

                <li class="ui-col ">

 {if $question['hidden']==1}

                     <span class="ui-avatar-s">

                         <span style="background-image:url({SITE_URL}static/css/default/avatar.gif)"></span>

                     </span>

     {else}
       <a href="{url user/space/{$question['authorid']}}">
                     <span class="ui-avatar-s">

                         <span style="background-image:url({$question['author_avartar']})"></span>

                     </span>
  </a>
    {/if}
                    <span class=" u-name">
                         {if $question['hidden']==1}
                  匿名用户
                       {else}
                         <a class="ui-txt-highlight ui-nowrap" href="{url user/space/$question['authorid']}">

                    {$question['author']}
                      {if $question['author_has_vertify']!=false}<i style="top:0px;font-size:15px;" class="fa fa-vimeo {if $question['author_has_vertify'][0]=='0'}v_person {else}v_company {/if}  " data-toggle="tooltip" data-placement="right" title="" {if $question['author_has_vertify'][0]=='0'}data-original-title="个人认证" {else}data-original-title="企业认证" {/if} ></i>{/if}
                    </a>
                    {/if}
                    </span>
                     <!-- 关注用户按钮 -->
                             {if  $is_followedauthor}

  <a class="btn btn-default following button_followed" id="attenttouser_{$question['authorid']}" onclick="attentto_user($question['authorid'])"><i class="fa fa-check"></i><span>已关注</span></a>

  {else}

         <a class="btn btn-success follow button_attention" id="attenttouser_{$question['authorid']}" onclick="attentto_user($question['authorid'])"><i class="fa fa-plus"></i><span>关注</span></a>

  {/if}

                </li>


            </ul>
                    
 <span class="ui-nowrap  " style="margin-top:1rem"> 发布时间:{$question['format_time']}</span>
   {if $question['price']>0}    
                      <span   class="ui-nowrap mydatabase"><i class="fa fa-database mar-r-03"></i>财富值{$question['price']}</span>
  {/if}
    <!--{if $user['grouptype']==1||$user['uid']==$question['authorid']}-->
 <span class="ui-nowrap  " onclick="show_questionoprate()"  style="margin-top:.8rem;margin-left:5px;font-size:12px;"><i class="fa fa-gear " style="font-size:14px;position;relative;top:1px;margin:0 2px;"></i>管理</span>
  <!--{/if}-->
        </div>
        <div class="article-content">
         <div class="ask_detail_content_text qyer_spam_text_filter">
                   {eval    echo replacewords($question['description']);    }
                   <!--{if $supplylist}-->
                       <ul class="nav">
                    <!--{loop $supplylist $supply}-->
                    <li><span class="time buchongtime">问题补充 : {$supply['format_time']}</span>
                      {eval    echo replacewords($supply['content']);    }

                    </li>
                    <!--{/loop}-->
                </ul>
                <!--{/if}-->

                    </div>
        </div>
            <div class="c_btns">
              <!--{if $is_followed}-->
              <a href="{url question/attentto/$qid}">     <div class="btnhassoucang">
               已收藏问题
               </div></a>
              
          
                  <!--{else}-->
                    <a href="{url question/attentto/$qid}">      <div class="btnsoucang">
               收藏问题
               </div></a>
                   
                   <!--{/if}-->
                   {if 9!=$question['status']}
                   {if $user['uid']==0}
                  <div class="btnwirteans" onclick="window.location.href='{url user/login}'">
                                                                写回答
               </div>
               {else}
                   <div class="btnwirteans" >
               写回答
               </div>
               {/if}
                 {/if}
            </div>
            
            
            <div class="show-foot">
            {if $question['cid']}<p>本问题来自话题:<a href="{url category/view/$question['cid']}" >{$question['category_name']}</a> <a class="reportques" onclick="openinform({$qid},'{$question['title']}',0)"  id="report-modal">举报</a></p>{/if}
                       
             
            </div>
    </article>

 
    <!--回答-->
     <div class="answerbox" style="display: none;">

     {if $iswxbrower==null&&$setting['code_ask']&&$user['credit1']<$setting['jingyan']}
    <div  id="codetip" class=" " style="color:#777;font-size:12px;position:relative;bottom:35px;left:10px;">验证码不能为空</div>
      {/if}
      <div class="commentboard" style="background:#fff;position:relative;bottom:0px;left:0px;z-index:99999999;height:auto;width:100%;">

        <form id="huidaform"  name="answerForm"  method="post" >
       <input type="hidden" value="{$qid}" id="ans_qid" name="qid">
                <input type="hidden" value="{$question['title']}" id="ans_title" name="title">

     <div  style="border-radius:5px;width:100%;hegiht:300px;position:relative;bottom:50px;left:0px;border:none;padding-top:10px;">
      <!--{template editor}-->
     </div>

    <div class="" style="position:relative;top:-22px;margin-right:12px;">

      
               {if $iswxbrower==null&&$setting['code_ask']&&$user['credit1']<$setting['jingyan']}
             <div class="" style="position:relative;top:-10px;text-align:right;margin-top:20px;">

     <input type="text"  id="code" name="code" onblur="check_code();" placeholder="输入验证码"  style="font-size:15px;border:none;width:100px;hegiht:30px;position:relative;border: solid 1px #ccc;    outline: none;">
     <img class="hand" src="{url user/code}" onclick="javascript:updatecode();" id="verifycode" style="width:50px;position:relative;top:5px;">

    </div>
       {/if}
    <div class="" style="margin-top:20px;text-align: right;padding:0px;">
       <input type="hidden" id="tokenkey" name="tokenkey" value='{$_SESSION["answertoken"]}'/>
     <button  type="button" id="answsubmit" class="ui-btn ui-btn-primary" style="position:relative;bottom:10px;">
        确定
    </button>
    </div>
</div>
    </form>
     </div>
    </div>
    <section class="answerlist">
     <div class="ans-title">
       {if $question['answers']==0}
         <span>还没有小伙伴回答Ta的问题哟</span>
       {else}
         <span>{$question['answers']}个回答</span>
       {/if}

     </div>
        <div class="answers">
            <div class="answer-items">

               <!--{if $useranswer['id']>0}-->
                <div class="answer-item">
                          <ul class="ui-row">
                           {if $question['authorid']==$useranswer['authorid']&&$question['hidden']==1}
                              <li class="ui-col ui-col-80">
                                <a href="javascript:">
                                  <span class="ui-avatar-s">

                         <span style="background-image:url({SITE_URL}static/css/default/avatar.gif)"></span>

                     </span> </a>

                                  <span class=" u-name">
                                    <a class="ui-txt-highlight" href="javascript:">
                                   匿名用户  </a>
                                </span>

                           {if $useranswer['adopttime']>0}   <i class="ui-icon-collected"></i>{/if}
                              </li>
                              {else}
                                             <li class="ui-col ui-col-80">
                                <a href="{url user/space/{$useranswer['authorid']}}">
                                  <span class="ui-avatar-s">

                         <span style="background-image:url({$useranswer['author_avartar']})"></span>

                     </span> </a>

                                  <span class=" u-name">
                                    <a class="ui-txt-highlight" href="{url user/space/{$useranswer['authorid']}}">
                                  {$useranswer['authorname']}
                                   {if $useranswer['author_has_vertify']!=false}<i class="fa fa-vimeo {if $useranswer['author_has_vertify'][0]=='0'}v_person {else}v_company {/if}  " data-toggle="tooltip" data-placement="right" title=""  ></i>{/if}
                                  </span>
                                  </a>
                                 {if $useranswer['adopttime']>0}   <i class="ui-icon-collected"></i>{/if}
                              </li>
                              {/if}

                              <li class="ui-col ui-col-20 ui-align-right"  >
                                  <span class="btn-agree" id='{$useranswer['id']}'>
                                      <i class="ui-icon-like"></i>
                                       <span class="agree-num button_agre">{$useranswer['supports']}</span>
                                  </span>
                              </li>
                          </ul>
                    <div class="ans-content" style="max-height: 5000px">
                  
         
                             {eval    echo replacewords($useranswer['content']);    }
         

         <div class="appendcontent font-12">
                    <!--{loop $useranswer['appends'] $append}-->
                    <div class="appendbox">
                        <!--{if $append['authorid']==$useranswer['authorid']}-->
                        <h4 class="appendanswer font-12">回答:<span class="time">{$append['format_time']}</span></h4>
                        <!--{else}-->
                        <h4 class="appendask font-12">作者追问:<span class='time'>{$append['format_time']}</span></h4>
                        <!--{/if}-->
                          <div class="zhuiwentext">

                         {eval    echo replacewords($append['content']);    }
                                      </div>
                    <div class="clr"></div>
                    </div>
                    <!--{/loop}-->
                </div>
                    </div>
                     
                    <div class="ans-footer">
                    <div class="operationlist">

                      <span  onclick="show_comment('{$useranswer['id']}');">
                     <i class="ui-icon-comment"></i>
                                <span class="ans-comment-num ">
                                    {$useranswer['comments']}条评论
                                </span>
                    </span>
     

                        <!--{if 1==$user['grouptype'] ||$user['uid']==$question['authorid'] || $user['uid']==$useranswer['authorid']}-->
                                <span onclick="show_oprate('{$useranswer['id']}');">
                                <i class="fa fa-gear"></i>
                               <span class="">操作 </span>
                            </span>
                              <!--{/if}-->
                     <span>
                      {$useranswer['format_time']}
                    </span>
                     </div>
                        <div class="ans-footer-comment" id="comment_{$useranswer['id']}" style="display: none;">


                            <ul class="comments-list nav">
                                <li class="loading">

    <i class="ui-loading"></i>
                        </li>
                            </ul>
                            <div class="ui-form ui-border-t">

                                    <ul class="ui-row">
                                        <li class="ui-col ui-col-80">
                                            <div class="ui-form-item ui-form-item-pure ui-border-b f-txt-comment">
                                             <input  type='hidden' value='0' name='replyauthor' />
                                                <input name="content" class="comment-input" type="text" placeholder="请输入评论内容，不少于2个字">
                                                <a href="#" class="ui-icon-close"></a>

                                            </div>
                                        </li>
                                        <li class="ui-col ui-col-20">
                                            <button name="submit" onclick="addcomment({$useranswer['id']});" class="ui-btn f-btn-comment">
                                                评论
                                            </button>
                                        </li>


                                    </ul>


                            </div>
                        </div>
                    </div>
                </div>


                  <!--{/if}-->
              
            </div>
        </div>


         <!--{if 9!=$question['status']  }-->
 {if $question['answers']>1}
 <div class="ui-btn-wrap">
    <button onclick="window.location.href='{url question/view/$qid}'" class="ui-btn-lg ui-btn-danger">
     查看其它{$question['answers']}个回答
    </button>
</div>
{/if}
   <!--{else}-->
<div class="ui-tooltips ui-tooltips-guide">
    <div class="ui-tooltips-cnt  ui-border-b">
        <i class="ui-icon-talk"></i>该问题目前已经被关闭, 无法添加新回复
    </div>
</div>
      
       <!--{/if}-->
    </section>
    <section class="article-jingxuan ui-panel">
        <h2 class="ui-txt-warning">相关问题</h2>
<div class="split-line"></div>
 
      <div class="stream-list question-stream xm-tag tag-nosolve">

  <!--{loop $solvelist $question}-->
   {if $qid!=$question['questionid']}
      <section class="stream-list__item">
       {if $question['status']==2}
                <div class="qa-rank"><div class="answers answered solved ml10 mr10">
                {$question['answers']}<small>解决</small></div></div>     
                {else}
                {if $question['answers']>0}
                <div class="qa-rank"><div class="answers answered ml10 mr10">
                $question['answers']<small>回答</small></div>
                </div>
                   {else}
                   <div class="qa-rank"><div class="answers ml10 mr10">
                0<small>回答</small></div></div>
                {/if}
                
                
                {/if}
                   <div class="summary">
            <ul class="author list-inline">
                                           
                                                <li class="authorinfo">
                                          {if $question['hidden']==1}
                                            匿名用户
                      
                       {else} 
                              <a href="{url user/space/$question['authorid']}">
                          {$question['author']}{if $question['author_has_vertify']!=false}<i class="fa fa-vimeo {if $question['author_has_vertify'][0]=='0'}v_person {else}v_company {/if}  " ></i>{/if}
                          </a>
                      
                         {/if} 
                       
                        <span class="split"></span>
                        <a href="{url question/view/$question['questionid']}">{$question['format_time']}</a>
                                    </li>
            </ul>
            <h2 class="title"><a href="{url question/view/$question['questionid']}">{$question['title']}</a></h2>
 <!--{if $question['tags']}-->
           <ul class="taglist--inline ib">
<!--{loop $question['tags'] $tag}-->
<li class="tagPopup authorinfo">
                        <a class="tag" href="{url tags/view/$tag['tagalias']}" >
                                                       {$tag['tagname']}
                        </a>
                    </li>
                    

                           
                <!--{/loop}-->
                 </ul>
                <!--{else}--><!--{/if}-->
                
              
                                   
                           
                                            </div>
    </section>
    {/if}
    <!--{/loop}-->
  
    
      
      </div>
  
    </section>


     
</section>

<div class="ui-dialog" id="dialogadopt">
    <div class="ui-dialog-cnt">
      <header class="ui-dialog-hd ui-border-b">
                  <h3>采纳回答</h3>
                  <i class="ui-dialog-close" data-role="button"></i>
              </header>

        <div class="ui-dialog-bd">


        <input type="hidden"  value="{$qid}" id="adopt_qid" name="qid"/>
        <input type="hidden" id="adopt_answer" value="0" name="aid"/>
        <table  class="table ">
            <tr valign="top">
                <td class="small_text">向帮助了您的网友说句感谢的话吧!</td>
            </tr>
            <tr>
                <td>
                    <div class="inputbox mt15">
                        <textarea class="adopt_textarea" id="adopt_txtcontent"  name="content">非常感谢!</textarea>
                    </div>
                </td>
            </tr>

        </table>

            <button  id="adoptbtn"  class="ui-btn ui-btn-primary">
       采纳
    </button>


        </div>


    </div>
</div>

<!-- 举报 -->
<div class="modal fade panel-report" id="dialog_inform">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" onclick="hidemodel()" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
      <h4 class="modal-title">举报内容</h4>
    </div>
    <div class="modal-body">

<form id="rp_form" class="rp_form"  action="{url inform/add}" method="post">
<input value="" type="hidden" name="qid" id="myqid">
<input value="" type="hidden" name="aid" id="myaid">
<input value="" type="hidden" name="qtitle" id="myqtitle">
<div class="js-group-type group group-2">
<h4>检举类型</h4><ul>
<li class="js-report-con">
<label><input type="radio" name="group-type" value="1"><span>检举内容</span></label>
</li>
<li class="js-report-user">
<label><input type="radio" name="group-type" value="2"><span>检举用户</span></label>
</li>
</ul>
</div>
<div class="group group-2">
<h4>检举原因</h4><div class="list">
<ul>
<li>
<label class="reason-btn"><input type="radio" name="type" value="4"><span>广告推广</span></label>
</li>
<li>
<label class="reason-btn"><input type="radio" name="type" value="5"><span>恶意灌水</span></label>
</li>
<li>
<label class="reason-btn"><input type="radio" name="type" value="6"><span>回答内容与提问无关</span>
</label>
</li>
<li>
<label class="copy-ans-btn"><input type="radio" name="type" value="7"><span>抄袭答案</span></label>
</li>
<li>
<label class="reason-btn"><input type="radio" name="type" value="8"><span>其他</span></label>
</li>
</ul>
</div>
</div>
<div class="group group-3">
<h4>检举说明(必填)</h4>
<div class="textarea">
<ul class="anslist" style="display:none;line-height:20px;overflow:auto;height:171px;">
</ul>
<textarea name="content" maxlength="200" placeholder="请输入描述200个字以内">
</textarea>
</div>
</div>
    <div class="mar-t-1">

                <button type="submit" id="btninform" class="btn btn-success ">提交</button>
                 <button type="button" class="btn btn-default mar-lr-1" data-dismiss="modal" onclick="hidemodel()">关闭</button>
      </div>
</form>


    </div>

  </div>
</div>
</div>

<script>


var adoptsubmit=false;
$("#adoptbtn").click(function(){
	var _adopt_txtcontent=$.trim($("#adopt_txtcontent").val());
	if(_adopt_txtcontent==''){
		alert("采纳回复不能为空!");
		return false;
	}
	  var data={
    			content:_adopt_txtcontent,
    			qid:$("#adopt_qid").val(),
    			aid:$("#adopt_answer").val()

    	}
		if(adoptsubmit==true){
			
			return false;
		}

	  adoptsubmit=true;
	$.ajax({
	    //提交数据的类型 POST GET
	    type:"POST",
	    //提交的网址
	    url:"{url question/ajaxadopt}",
	    //提交的数据
	    data:data,
	    //返回数据的格式
	    datatype: "json",//"xml", "html", "script", "json", "jsonp", "text".
	    //在请求之前调用的函数
	    beforeSend:function(){},
	    //成功返回之后调用的函数
	    success:function(data){
	    	var data=eval("("+data+")");
	       if(data.message=='ok'){
	    	   $("#adoptbtn").attr("disabled",true);
	    	   adoptsubmit=true;
	    	   alert("采纳成功!");

	    	   setTimeout(function(){
	               window.location.reload();
	           },1500);
	       }else{
	    	   adoptsubmit=false;
	    	   alert(data.message);

	       }


	    }   ,
	    //调用执行后调用的函数
	    complete: function(XMLHttpRequest, textStatus){

	    },
	    //调用出错执行的函数
	    error: function(){
	        //请求出错处理
	    }
	 });
})


</script>

<section>
<!-- 回答操作 -->
<div class="ui-actionsheet pingluncaozuo">
  <div class="ui-actionsheet-cnt">
    <h4>回答操作</h4>
             <!--{if $useranswer['id']<=0}-->
         <!--{if 1==$user['grouptype'] ||$user['uid']==$authoruid}-->
    <button onclick="adoptanswer()">采纳</button>
       <!--{/if}-->
                             <!--{/if}-->
                                <!--{if 1==$user['grouptype'] || $user['uid']==$useranswer['authorid']}-->
      <button onclick="jixuhuida()">继续回答</button>
         <button onclick="bianjihuida()">编辑回答</button>
        <!--{/if}-->
           <!--{if 1==$user['grouptype'] || $user['uid']==$authoruid}-->
             <button onclick="jixuzhuiwen()">继续追问</button>
             <!--{/if}-->

                <!--{if 1==$user['grouptype'] ||$user['uid']==$useranswer['authorid']}-->
    <button class="ui-actionsheet-del" onclick="deleteanswer()">删除</button>
     <!--{/if}-->
    <button class="cancelpop">取消</button>
  </div>
</div>
   <!--{if $user['grouptype']==1||$user['uid']==$authoruid}-->
<!-- 提问操作 -->
<div class="ui-actionsheet wenticaozuo">
  <div class="ui-actionsheet-cnt">
    <h4>问题操作</h4>


           <button onclick="bianjiwenti()">编辑问题</button>
             <button id="close_question">关闭问题</button>
               {if $question['shangjin']==0}
          <button class="ui-actionsheet-del" id="delete_question">删除</button>
           {/if}
    <button class="cancelpop">取消</button>
  </div>
</div>
  <!--{/if}-->



</section>

<script>
$(function(){
	$(".article img").css("height","auto")
})
//投诉
function openinform(qid ,qtitle,aid) {
	  $("#myqid").val(qid);
	  $("#myqtitle").val(qtitle);
	  $("#myaid").val(aid);
	 $('#dialog_inform').show();

}
function hidemodel(){
	$('#dialog_inform').hide();
}
//questioncaozuo
var current_aid=0;
var qid={$qid};
function adoptanswer() {

    $("#adopt_answer").val(current_aid);
    $('.ui-actionsheet').removeClass('show').addClass('hide');
    $('#dialogadopt').dialog('show');
}


var currend_aid=0;
var currend_authorid=0;

function jixuhuida(){
	 window.location.href=g_site_url + "index.php" + query + "answer/append/$qid/"+current_aid;

}
function bianjiwenti(){
	window.location.href=g_site_url + "index.php" + query + "question/edit/"+qid;
}
function bianjihuida(){

	window.location.href=g_site_url + "index.php" + query + "question/editanswer/"+current_aid;

}
function jixuzhuiwen(){
	 window.location.href=g_site_url + "index.php" + query + "answer/append/$qid/"+current_aid;

}

function deleteanswer(){
	window.location.href=g_site_url + "index.php" + query + "question/deleteanswer/"+current_aid+"/$qid";

}
function show_oprate(aid){
	current_aid=aid;

	 $('.pingluncaozuo').removeClass('hide').addClass('show');
}
function show_questionoprate(){


	 $('.wenticaozuo').removeClass('hide').addClass('show');
}

//关闭问题
$("#close_question").click(function() {
if (confirm('确定关闭该问题?') === true) {
var url=g_site_url+"/?question/close/"+qid;
document.location.href = url;
}
});
//删除问题
$("#delete_question").click(function() {
if (confirm('确定删除问题？该操作不可返回！') === true) {
var url=g_site_url+"/?question/delete/"+qid;
document.location.href = url;
}
});
function viewanswer(paymoney,_answerid){


	   var dia=$.dialog({
	        title:'<center>温馨提示</center>',
	        select:0,
	        content:'<center><p style="color:red;margin-top:5px;">此回答需要付费'+paymoney+'元</p></center>',
	        button:["确认支付","取消"]
	    });

	    dia.on("dialog:action",function(e){
	    	if(e.index==1){
	    		return false;
	    	}
	    	 $.ajax({
		 	        //提交数据的类型 POST GET
		 	        type:"POST",
		 	        //提交的网址
		 	        url:"{url question/postanswerreward}",
		 	        //提交的数据
		 	        data:{answerid:_answerid},
		 	        //返回数据的格式
		 	        datatype: "text",//"xml", "html", "script", "json", "jsonp", "text".

		 	        //成功返回之后调用的函数
		 	        success:function(data){

		 	        	data=$.trim(data);
		 	        	console.log(data)
		 	        	if(data==-2){
		 	        		alert('游客先登录!');
		 	        	}
		 	        	if(data==-1){
		 	        		alert('此问题不需要付费!');
		 	        	}
		 	        	if(data==2){
		 	        		alert('此问题您已经付费过了!');
		 	        	}
		 	        	if(data==0){
		 	        		alert('账户余额不足，先充值!');
		 	        	}
		 	        	if(data==1){
		 	        		window.location.reload();
		 	        	}
		 	        }   ,

		 	        //调用出错执行的函数
		 	        error: function(){
		 	            //请求出错处理
		 	        }
		 	    });
	       // console.log(e.index)
	    });
	    dia.on("dialog:hide",function(e){
	       // console.log("dialog hide")
	    });




}
{if $setting['mobile_localyuyin']==0}
var mobile_localyuyin=0;
{else}
var mobile_localyuyin=1;
{/if}
var targetplay=null;


</script>
<script>

var canyuyin=0;
$(".cancelpop").click(function(){
	 $('.ui-actionsheet').removeClass('show').addClass('hide');
})
$("#comment-note,#btnanswer,.btnwirteans").click(function(){
	if(g_uid==0){
return false;
	}
	if(canyuyin){
		  $('.huidacaozuo').removeClass('hide').addClass('show');
	}else{
		  var dia2=$(".answerbox").show();

	}

});
$(".voiceanswer").click(function(){
	  $('.ui-actionsheet').addClass('hide');
	  var luyin=$(".luyin").dialog("show");
	  luyin.on("dialog:action",function(e){
	        console.log(e.index);

	    });
});
$(".textanswer").click(function(){
	  $('.ui-actionsheet').addClass('hide');
	var dia2=$(".answerbox").show();

})
var submit=false;
$("#answsubmit").click(function(){
	 var _chakanjine=$.trim($("#chakanjine").val());
	 if(_chakanjine==''){
		 _chakanjine=0;
	 }
	  if(!isNaN(_chakanjine)){

	    }else{
	    	 _chakanjine=0;
	    }
	// var eidtor_content= $.trim($("#anscontent").val());
	 // 获取编辑器区域
        var _txt = editor.wang_txt;
     // 获取 html
        var eidtor_content =  _txt.html();
		if(eidtor_content==''){
			 el2=$.tips({
		         content:'回答不能为空',
		         stayTime:2000,
		         type:"info"
		     });
			 return false;
		}
	  <!--{if $setting['code_ask']}-->
	  var data={
			  tokenkey:$("#tokenkey").val(),
			  chakanjine:_chakanjine,
 			content:eidtor_content,
 			qid:$("#ans_qid").val(),
 			title:$("#ans_title").val(),
 			code:$("#code").val()
 	}
	    <!--{else}-->
		var data={
				 tokenkey:$("#tokenkey").val(),
				chakanjine:_chakanjine,
   			content:eidtor_content,
   			qid:$("#ans_qid").val(),
     			title:$("#ans_title").val()

   	}
	     <!--{/if}-->
		if(submit==true){
				
				return false;
			}

			submit=true;
	    	 var el='';
	$.ajax({
       //提交数据的类型 POST GET
       type:"POST",
       //提交的网址

       url:"{SITE_URL}index.php?question/ajaxanswer",
       //提交的数据
       data:data,
       //返回数据的格式
       datatype: "json",//"xml", "html", "script", "json", "jsonp", "text".
       //在请求之前调用的函数
       beforeSend:function(){
    	    el=$.loading({
    	        content:'加载中...',
    	    })
       },
       //成功返回之后调用的函数
       success:function(data){
    	    el.loading("hide");
       	var data=eval("("+data+")");
          if(data.message=='ok'||data.message.indexOf('成功')>=0){
        	  $("#answsubmit").attr("disabled",true);
        	  submit=true;
       	 el2=$.tips({
	            content:data.message,
	            stayTime:1000,
	            type:"info"
	        });
       	   setTimeout(function(){
                  window.location.reload();
              },1500);
          }else{
        	  submit=false;
       	el2=$.tips({
            content:data.message,
            stayTime:1000,
            type:"info"
        });
          }


       }   ,
       //调用执行后调用的函数
       complete: function(XMLHttpRequest, textStatus){
    	    el.loading("hide");
       },
       //调用出错执行的函数
       error: function(){
           //请求出错处理
       }
    });
	return false;
})
	 $(".btn-agree").click(function(){
                        var supportobj = $(this);
                                var answerid = $(this).attr("id");
                                var el='';
                                $.ajax({
                                type: "GET",
                                        url:"{SITE_URL}index.php?answer/ajaxhassupport/" + answerid,
                                        cache: false,
                                        beforeSend:function(){
                                    	    el=$.loading({
                                    	        content:'加载中...',
                                    	    })
                                       },
                                        success: function(hassupport){
                                        	 el.loading("hide");
                                        if (hassupport != '1'){






                                                $.ajax({
                                                type: "GET",
                                                        cache:false,
                                                        url: "{SITE_URL}index.php?answer/ajaxaddsupport/" + answerid,
                                                        success: function(comments) {

                                                        supportobj.find(".agree-num").html(comments);
                                                   	 el2=$.tips({
                                          	            content:'感谢支持',
                                          	            stayTime:1000,
                                          	            type:"success"
                                          	        });
                                                        }
                                                });
                                        }else{
                                        	 el2=$.tips({
                                 	            content:'您已赞过',
                                 	            stayTime:1000,
                                 	            type:"info"
                                 	        });
                                        }
                                        },
                                        //调用执行后调用的函数
                                        complete: function(XMLHttpRequest, textStatus){
                                     	    el.loading("hide");
                                        },
                                });
                        });
                        //添加评论
                        function addcomment(answerid) {

                        var content = $("#comment_" + answerid + " input[name='content']").val();

                        var replyauthor = $("#comment_" + answerid + " input[name='replyauthor']").val();

                        if (g_uid == 0){

                            window.location.href="{SITE_URL}index.php?user/login";
                           return false;
                        }
                        if (bytes($.trim(content)) < 5){

                        el2=$.tips({
            	            content:'评论内容不能少于5字',
            	            stayTime:1000,
            	            type:"info"
            	        });
                                return false;
                        }

                        $.ajax({
                        type: "POST",
                                url: "{SITE_URL}index.php?answer/addcomment",
                                data: "content=" + content + "&answerid=" + answerid+"&replyauthor="+replyauthor,
                                success: function(status) {
                                if (status == '1') {
                                $("#comment_" + answerid + " input[name='content']").val("");
                                        load_comment(answerid);
                                        return false;
                                }else{
                                	if(status == '-2'){

                                		 el2=$.tips({
                             	            content:"问题已经关闭，无法评论",
                             	            stayTime:1000,
                             	            type:"info"
                             	        });
                                	}
                                }
                                }
                        });
                        return false;
                        }

                        //删除评论
                        function deletecomment(commentid, answerid) {
                        if (!confirm("确认删除该评论?")) {
                        return false;
                        }
                        $.ajax({
                        type: "POST",
                                url: "{SITE_URL}index.php?answer/deletecomment",
                                data: "commentid=" + commentid + "&answerid=" + answerid,
                                success: function(status) {
                                if (status == '1') {
                                load_comment(answerid);
                                }
                                }
                        });
                        }
                        function load_comment(answerid){
                        $.ajax({
                        type: "GET",
                                cache:false,
                                url: "{SITE_URL}index.php?answer/ajaxviewcomment/" + answerid,
                                success: function(comments) {
                                $("#comment_" + answerid + " .comments-list").html(comments);
                                }
                        });
                        }
                        function show_comment(answerid) {

                            if ($("#comment_" + answerid).css("display") === "none") {
                            load_comment(answerid);
                                    $("#comment_" + answerid).css({"display":"block"});
                            } else {
                            $("#comment_" + answerid).css({"display":"none"});
                            }
                            }
                        function replycomment(commentauthorid,answerid){

                            var comment_author = $("#comment_author_"+commentauthorid).attr("title");

                            $("#comment_"+answerid+" .comment-input").focus();
                            $("#comment_"+answerid+" .comment-input").val("回复 "+comment_author+" :");
                            $("#comment_" + answerid + " input[name='replyauthor']").val(commentauthorid);
                        }


</script>

<!--{template footer}-->