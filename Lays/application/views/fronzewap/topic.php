<!--{template header}-->

<style>
.ui-container{
    background: #F6F6F6;
    min-height: 100vh;
    }
<!--
.payorder .active{
background: #0085ee;
    color: #fff;
}
-->
</style>
                 
                        <!--最新文章-->
    <div class="au_side_box" style="padding:0px;margin:0px;">

     <!--导航-->
        <ul class="tab-head au_tabs">
            <li class="tab-head-item au_tab {if $typename=='new'}current{/if}" data-tag="tag-nosolve"><a href="{url topic/default}">最新</a></li>
             <li class="tab-head-item au_tab {if $typename=='hot'}current{/if}" data-tag="tag-solvelist"><a href="{url topic/weeklist}">热门</a></li>
            <li class="tab-head-item au_tab {if $typename=='top'}current{/if}" data-tag="tag-score"><a href="{url topic/hotlist}">推荐</a></li>
              

                {if 1==$setting['openwxpay'] }
            <li class="tab-head-item au_tab {if $typename=='pay'}current{/if}" data-tag="tag-shangjinscore"><a href="{url topic/paylist/money}">付费</a></li>
             {/if}
       
                     
        </ul>
                     {if $typename=='pay'}
        <div class="text-muted mb10 payorder" style="margin-left:12px;margin-top:5px;">排序：
                                <div class="btn-group btn-group-xs">
                                <a class="ui-label {if $readmode==3} active{/if}" href="{url topic/paylist/money}" role="button">人民币</a>
                                <a class="ui-label {if $readmode==2} active{/if}" href="{url topic/paylist/credit}" role="button">财富值</a>
    
                                </div>
                                </div>
                                 {/if}
        
           <div class="whatsns_list" style="background:#F6F6F6">
     <!--{loop $topiclist $index $topic}-->   


                       
                        <div class="whatsns_listitem">
         <div class="l_title"><h2><a href="{url topic/getone/$topic['id']}">
      {$topic['title']}</a></h2></div>

       <div class="whatsns_content">
  
 
   {if $topic['image']}
<div class="weui-flex">



   <div class="weui-flex__item"><div class="imgthumbbig"><a href="{url topic/getone/$topic['id']}"><img class="lazy" src="{SITE_URL}static/images/lazy.jpg" data-original="$topic['image']"></a></div></div>



</div>
 {/if}
 
 
         {if $topic['describtion']}
 <div class="whatsns_des">
 <span class="mtext" >{$topic['describtion']}</span>
 <div class="whatsns_readmore" onclick="window.location='{url topic/getone/$topic['id']}'">查看更多<i class="fa fa-angle-down"></i></div>
 </div>
  {/if}
       </div>
<div class="ask-bottom">
   
          <a href="{url topic/getone/$topic['id']}" class="" ><i class="fa fa-commentingicon"></i>{$topic['articles']} 个评论</a>
          <a href="{url topic/getone/$topic['id']}"  class=" "><i class="fa fa-qshoucang"></i>{$topic['likes']}个收藏</a>
               </div>
              </div>
                          <!--{/loop}-->    
  
</div>

             <div class="pages" style="margin-bottom:15px;">{$departstr}</div>
        </div>

 <!--{if $sublist }-->
   <!--热门主题-->
                    <div class="au_side_box" style="padding:7px;margin:0px;">

                        <div class="au_box_title">

                            <div>
                                <i class="fa fa-windows huang"></i>热门文章话题

                            </div>

                        </div>
                        <div class="au_side_box_content">
                            <ul>
                                  <!--{loop $sublist $index  $category1}-->
                                  {if $index<6}
                                <li {if $category1['miaosu']} data-toggle="tooltip" data-placement="bottom" title="" data-original-title=" {eval echo clearhtml($category1['miaosu']);}" {/if}>
                                    <div class="_smallimage">
                                      <a href="{url topic/catlist/$category1['id']}">  <img src="{$category1['image']}"></a>
                                    </div>
                                    <div class="_content">
                                      <div class="_rihgtc">
                                          <span class="subname">
                                           <a href="{url topic/catlist/$category1['id']}">{$category1['name']}</a>
                                          </span>
                                          <span class="_yuedu">{$category1['followers']}人关注</span>
                                          <p class="_desc" >
                                                 {eval echo clearhtml($category1['miaosu']);}

                                           </p>
                                      </div>

                                    </div>
                                </li>
                                {/if}
                                  <!--{/loop}-->
                            </ul>
                        </div>
                    </div>
                        <!--{/if}-->
<!--{template footer}-->