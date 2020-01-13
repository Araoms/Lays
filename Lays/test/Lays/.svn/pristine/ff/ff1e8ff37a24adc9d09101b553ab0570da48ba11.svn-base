<!--{template header}-->
<link rel="stylesheet" media="all" href="{SITE_URL}static/css/widescreen/css/category.css" />
<link rel="stylesheet" media="all" href="{SITE_URL}static/css/widescreen/css/list.css" />
<style>
.main-wrapper {
    margin-bottom: 40px;
    background: #fafafa;
    margin-top: 0px;
}
<!--
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
.stream-list__item{
position:relative;
}
.imgjiesu{
position: absolute;
    right: 10px;
    top: 13px;
    width: 45px;
    height: 35px;
}
.jinxingzhong{
position: absolute;
    right: 15px;
    top: 13px;
    width: 35px;
    height: 35px;
}
-->
</style>
<div class="container collection index" style="padding-top:10px;">

  <div class="row" style="padding-top:0px;margin:0px">
    <div class=" col-md-17   main bb" style="padding-top:10px;">
        <div class="recommend-collection">
            <!--{eval $categorylist=$this->fromcache('categorylist');}-->
                 <a class="collection" target="_self" href="{url new/default}">
            <img src="{SITE_URL}static/images/defaulticon.jpg" alt="195" style="height:32px;width:32px;">
            <div class="name">全部</div>
            
                <!--{loop $categorylist $index $category1}-->
                
                

              {if $index<11}



                   <a class="collection {if $cid==$category1['id']}c_current{/if}" target="_self" href="{url new/question/$paixu/$category1['id']}">
            <img src="$category1['bigimage']" alt="195" style="height:32px;width:32px;">
            <div class="name">{$category1['name']}</div>
        </a>
          
          {else}
          
                            
                           
                           
                                    
          {/if}

           
              
                 <!--{/loop}-->
              
                         <!--{loop $categorylist $index $category1}-->
                         {if $index>=11}
                                  <a class=" morecat collection {if $cid==$category1['id']}c_current{/if}" target="_self" href="{url new/question/$paixu/$category1['id']}">
            <img src="$category1['bigimage']" alt="195" style="height:32px;width:32px;">
            <div class="name">{$category1['name']}</div>
        </a>
        {/if}
              <!--{/loop}-->
                       
                        {if count($categorylist)>=11}
                  <p class="more_link showmore" style="width:90%;">
                                <a rel="nofollow">查看更多</a>
                            </p>
                      {/if}
                    </div>
    <div class="subnav-content-wrap" id="tab_anchor" style="height: 56px;">
            <div class="subnav-wrap" style="left: 0px;">
                <div class="top-hull">
                    <div class="subnav-contentbox">
                        <div class="tab-nav-container">
                            <ul class="subnav-content ">
                          {if !$cid}
                       <li {if $paixu==0}class="current"{/if}><a href="{url new/default}">全部问题</a></li>
                          <li {if $paixu==5}class="current"{/if}><a href="{url new/default/5}">待解决</a></li>
                    <li {if $paixu==4}class="current"{/if}><a href="{url new/default/4}">已解决</a></li>
                                <li {if $paixu==1}class="current"{/if}><a href="{url new/default/1}">财富悬赏</a></li>           
                                    
                  {if 1==$setting['openwxpay'] }
                   <li {if $paixu==2}class="current"{/if}><a href="{url new/default/2}">抢答悬赏</a></li>
                  
                  {/if} 
                   
                     {if $setting['mobile_localyuyin']==1}
                           <li {if $paixu==3}class="current"{/if}><a href="{url new/default/3}">语音回答</a></li>
                     
                     {/if}
                     
                       {else} 
                       
                              <li {if $paixu==0}class="current"{/if}><a href="{url new/question/0/$cid}">全部问题</a></li>
                          <li {if $paixu==5}class="current"{/if}><a href="{url new/question/5/$cid}">未回答</a></li>
                    <li {if $paixu==4}class="current"{/if}><a href="{url new/question/4/$cid}">已解决</a></li>
                                   <li {if $paixu==1}class="current"{/if}><a href="{url new/question/1/$cid}">财富悬赏</a></li>
                  {if 1==$setting['openwxpay'] }
                   <li {if $paixu==2}class="current"{/if}><a href="{url new/question/2/$cid}">抢答悬赏</a></li>
                  
                  {/if} 
                   
                     {if $setting['mobile_localyuyin']==1}
                           <li {if $paixu==3}class="current"{/if}><a href="{url new/question/3/$cid}">语音回答</a></li>
                     
                     {/if}
                     
                     
                      {/if}
               
                            </ul>
                            <div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <div id="list-container">
 
     <div class="stream-list question-stream">
      
          <!--{loop $questionlist $index $question}-->
      <section class="stream-list__item">
                <div class="qa-rank">
              {if $question['answers']==0}
                <div class="answers ml10 mr10">
                {$question['answers']}<small>回答</small></div>
                {else}
                {if $question['status']==2}
                <div class="answers answered solved ml10 mr10">
                 {$question['answers']}<small>解决</small></div>
                {else}
                
                <div class="answers answered ml10 mr10">
                {$question['answers']}<small>回答</small></div>
                {/if}
                {/if}
                <div class="views  viewsword0to99"><span> {$question['views']}</span><small>浏览</small></div>
                </div>        <div class="summary">
            <ul class="author list-inline">
                                                <li>
                                                
        {if $question['hidden']!=1}
                                            <a href="{url user/space/$question['authorid']}">    {$question['author']}
                 {if $question['author_has_vertify']!=false}<i class="fa fa-vimeo {if $question['author_has_vertify'][0]=='0'}v_person {else}v_company {/if}  " data-toggle="tooltip" data-placement="right" title="" {if $question['author_has_vertify'][0]=='0'}data-original-title="个人认证" {else}data-original-title="企业认证" {/if} ></i>{/if}</a>
                      {else}
                      匿名用户
                      {/if}
                        <span class="split"></span>
                        <a href="{url question/view/$question['id']}" class="askDate" >{$question['format_time']}</a>
                                   {if $question['shangjin']!=0}
                      <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="如果回答被采纳将获得 {$question['shangjin']}元，可提现" class="icon_hot" ><i class="fa fa-hongbao mar-r-03"></i>悬赏$question['shangjin']元</span>
                    {/if}
                    
                           {if $question['price']>0}
            <span class="icon_price" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="悬赏 {$question['price']}财富值，采纳后可获得"><i
	class="fa fa-database"></i>$question['price']</span>
	{/if}
	
                                    </li>
                                     {if $question['shangjin']&&$question['status']==1}<img class="jinxingzhong" src="{SITE_URL}static/images/jinxingzhong.png"/> {/if}
                                     
                                    {if $question['shangjin']&&$question['status']==2}<img class="imgjiesu" src="{SITE_URL}static/images/yijiesu.png"/> {/if}
          
            </ul>
            <h2 class="title"><a href="{url question/view/$question['id']}">{$question['title']} </a></h2>

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
        <!--{/loop}-->
      </div>
           <div class="pages">
                           {$departstr}
                        </div>
      </div>

        </div>
 <div class=" col-md-7 aside" style="">

 <!--{template sider_searchquestion}-->


 <!--{template sider_hotquestion}-->

    <div class="standing" style="margin-top:20px;">
  <div class="positions bb" id="rankScroll">
      <h3 class="title" style="float:none;" >热门标签</h3>
       <ul class="taglist--inline multi" style="padding:0px 20px 20px 20px;">
                                    <!--{eval $hosttaglist = $this->fromcache("hosttaglist");}-->
                              
                                          <!--{loop $hosttaglist $index $hottag}-->
                              
                                                            <li class="tagPopup">
                                    <a class="tag" href="{url tags/view/$hottag['tagalias']}" >
                                                                          {if $hottag['tagimage']}  <img src="$hottag['tagimage']">{/if}
                                                                        {$hottag['tagname']}</a>
                                </li>
                                                    <!--{/loop}-->         
                                                    </ul>
  </div>
  </div>
  

                    
          
            
            
 </div>
        </div>
      
      </div>
<script type="text/javascript">
$(".showmore").click(function(){
	
if($(".showmore a").html()=="查看更多"){
	$(".morecat").css("display","inline-block")
	$(".showmore a").html("点击收起")
	}
else{
	$(".morecat").css("display","none")
	$(".showmore a").html("查看更多")
}
});
</script>

<!--{template footer}-->