<!--{template header}-->
<style>

 .recommend-collection {
	margin:10px;
}

.showmore{
    line-height:40px;
    color: #0084FF;
    background: rgba(0, 132, 255, 0.1);
    border: 1px solid rgba(0, 132, 255, 0.1);
    text-align:center;
    }
    .showmore a{
    color: #0084FF;
    }
 .recommend-collection .collection {
	display: inline-block;
	margin: 0 8px 8px 0;
	min-height: 32px;
	background-color: #f7f7f7;
	border: 1px solid #dcdcdc;
	border-radius: 4px;
	vertical-align: top;
	overflow: hidden
}

 .recommend-collection .collection img {
	width: 32px
}

 .recommend-collection .collection .name {
	display: inline-block;
	padding: 0 11px 0 6px;
	font-size: 14px
}

 .recommend-collection .more-hot-collection {
	display: inline-block;
	margin-top: 7px;
	font-size: 14px;
	color: #787878
}

 .load-more {
	width: 100%;
	background-color: #a5a5a5
}

 .load-more:hover {
	background-color: #9b9b9b
}
.c_current {
    color: red;
}
.recommend-collection  .morecat{
display:none
}
</style>
 <div class="recommend-collection">
            <!--{eval $categorylist=$this->fromcache('categorylist');}-->
                 <a class="collection" target="_self" href="{url new/default}">
            <img src="{SITE_URL}static/images/defaulticon.jpg" alt="195" style="    vertical-align: middle;height:32px;width:32px;">
            <div class="name">全部</div>
            
                <!--{loop $categorylist $index $category1}-->
                
                

              {if $index<11}



                   <a class="collection {if $cid==$category1['id']}c_current{/if}" target="_self" href="{url new/question/$paixu/$category1['id']}">
            <img src="$category1['bigimage']" alt="195" style="    vertical-align: middle;height:32px;width:32px;">
            <div class="name">{$category1['name']}</div>
        </a>
          
          {else}
          
                            
                           
                           
                                    
          {/if}

           
              
                 <!--{/loop}-->
              
                         <!--{loop $categorylist $index $category1}-->
                         {if $index>=11}
                                  <a class=" morecat collection {if $cid==$category1['id']}c_current{/if}" target="_self" href="{url new/question/$paixu/$category1['id']}">
            <img src="$category1['bigimage']" alt="195" style="   vertical-align: middle;height:32px;width:32px;">
            <div class="name">{$category1['name']}</div>
        </a>
        {/if}
              <!--{/loop}-->
                       
                        {if count($categorylist)>=11}
                  <p class="more_link showmore" >
                                <a rel="nofollow">查看更多</a>
                            </p>
                      {/if}
                    </div>
                    
<!--最新问题-->
<div class="au_side_box" style="padding:7px;margin:0px;">
   {if !$cid}
         <!--导航-->
        <ul class="tab-head au_tabs">
            <li class="tab-head-item au_tab {if $paixu==0}current{/if}" data-tag="tag-nosolve"><a href="{url new/default/0}">全部</a></li>
             <li class="tab-head-item au_tab {if $paixu==5}current{/if}" data-tag="tag-solvelist"><a href="{url new/default/5}">待解决</a></li>
            <li class="tab-head-item au_tab {if $paixu==4}current{/if}" data-tag="tag-score"><a href="{url new/default/4}">已解决</a></li>
                        <li class="tab-head-item au_tab {if $paixu==1}current{/if}" data-tag="tag-score"><a href="{url new/default/1}">财富悬赏</a></li>
                {if 1==$setting['openwxpay'] }
            <li class="tab-head-item au_tab {if $paixu==2}current{/if}" data-tag="tag-shangjinscore"><a href="{url new/default/2}">抢答悬赏</a></li>
             {/if}
               {if $setting['mobile_localyuyin']==1}
            <li class="tab-head-item au_tab {if $paixu==3}current{/if}" data-tag="tag-hasvoice"><a href="{url new/default/3}">语音回答</a></li>
           
  {/if}
                     
        </ul>
     {else} 
     
      <!--导航-->
        <ul class="tab-head au_tabs">
            <li class="tab-head-item au_tab {if $paixu==0}current{/if}" data-tag="tag-nosolve"><a href="{url new/question/0/$cid}">全部</a></li>
             <li class="tab-head-item au_tab {if $paixu==5}current{/if}" data-tag="tag-solvelist"><a href="{url new/question/5/$cid}">待解决</a></li>
            <li class="tab-head-item au_tab {if $paixu==4}current{/if}" data-tag="tag-score"><a href="{url new/question/4/$cid}">已解决</a></li>
                        <li class="tab-head-item au_tab {if $paixu==1}current{/if}" data-tag="tag-score"><a href="{url new/question/1/$cid}">财富悬赏</a></li>
                {if 1==$setting['openwxpay'] }
            <li class="tab-head-item au_tab {if $paixu==2}current{/if}" data-tag="tag-shangjinscore"><a href="{url new/question/2/$cid}">抢答悬赏</a></li>
             {/if}
               {if $setting['mobile_localyuyin']==1}
            <li class="tab-head-item au_tab {if $paixu==3}current{/if}" data-tag="tag-hasvoice"><a href="{url new/question/3/$cid}">语音回答</a></li>
           
  {/if}
                     
        </ul>
          {/if}
     <div class="au_side_box_content">
         <!--列表部分-->
 
      <div class="stream-list question-stream ">
   <!--{loop $questionlist $index $question}-->
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
                          <a href="{url user/space/$question['authorid']}">{$question['author']} {if $question['author_has_vertify']!=false}<i class="fa fa-vimeo {if $question['author_has_vertify'][0]=='0'}v_person {else}v_company {/if}  "  ></i>{/if}</a>
                      
                         {/if} 
                       
                        <span class="split"></span>
                        <a href="{url question/view/$question['id']}">{$question['format_time']}</a>
                                    </li>
            </ul>
            <h2 class="title"><a href="{url question/view/$question['id']}">
            
            {$question['title']}
            {if $question['price']>0}
            <span class="icon_price" ><i
	class="fa fa-database"></i>$question['price']</span>
	{/if}
	
	    {if $question['shangjin']>0}
	     <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="如果回答被采纳将获得 $question['shangjin']元，可提现" class="icon_hot"><i class="fa fa-hongbao mar-r-03"></i>悬赏$question['shangjin']元</span>
	     
          
	{/if}
	
	   {if $question['hasvoice']!=0}
         <span
	class="au_q_yuyin"><i class="fa fa-microphone"></i></span>
	{/if}
	
            </a></h2>
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

    </div>
      <div class="pages">
                           {$departstr}
                        </div>
    </div>


  <div class="ui-col side " style="float: none;padding:7px;">
     <div class="widget-box pt0 " style="border:none;">
                        <h2 class="h4 widget-box__title" style="margin-bottom: 5px">热门标签</h2>
                        <ul class="taglist--inline multi">
                                <!--{eval $hosttaglist = $this->fromcache("hosttaglist");}-->
                                 <!--{loop $hosttaglist $index $rtag}-->
                                
                                                            <li class="tagPopup">
                                    <a class="tag" href="{url tags/view/$rtag['tagalias']}" >
                                                                          {if $rtag['tagimage']}  <img src="$rtag['tagimage']">{/if}
                                                                        {$rtag['tagname']}</a>
                                </li>
                                                <!--{/loop}-->          
                                                    </ul>
                    </div>
  </div>
  
  <div class="au_side_box" style="padding:0px;margin:0px;">

    <div class="au_box_title ws_mynewquestion" style="    padding: 7px;">

        <div>
            <i class="fa fa-file-text-o lv"></i>一周热点

        </div>

    </div>
    
     
      <div class="stream-list question-stream xm-tag tag-nosolve">
       <!--{eval $attentionlist = $this->fromcache("attentionlist");}-->
                                          <!--{loop $attentionlist $index $question}-->
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
                        <a href="{url question/view/$question['id']}">{$question['format_time']}</a>
                                    </li>
            </ul>
            <h2 class="title"><a href="{url question/view/$question['id']}">{$question['title']}</a></h2>
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