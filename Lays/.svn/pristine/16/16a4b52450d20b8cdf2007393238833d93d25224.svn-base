<!--{template header}-->
<!--{eval $adlist = $this->fromcache("adlist");}-->
<style>

.main-wrapper {
    margin-bottom: 40px;
    background: #fafafa;
    margin-top: 15px;
}
</style>
<div class="container index">

              <!--广告位1-->
            <!--{if (isset($adlist['question_view']['inner1']) && trim($adlist['question_view']['inner1']))}-->
           
     <div class="advlong-bottom">
            <div class="advlong-default">
        
            {$adlist['question_view']['inner1']}
          
            </div>
        </div>
          <!--{/if}-->
          
          <div class="container">
          
          <div class="row">
          
            <div class="col-md-17">
            <div class="bb">
        
            <div class="subnav-content-wrap" id="tab_anchor" style="height: 56px;">
            <div class="subnav-wrap" style="left: 0px;">
                <div class="top-hull">
                    <div class="subnav-contentbox">
                        <div class="tab-nav-container">
                            <ul class="subnav-content ">
                                                 <li class="{if $typename=='new'}current{/if}"><a href="{url topic/default}">最新文章</a></li>
                          <li class="{if $typename=='hot'}current{/if}"><a href="{url topic/weeklist}">热门文章</a></li>
                    <li class="{if $typename=='top'}current{/if}"><a href="{url topic/hotlist}">推荐文章</a></li>

                    {if 1==$setting['openwxpay'] }
                                       <li class="{if $typename=='pay'}current{/if}"><a href="{url topic/paylist/money}">付费专栏</a></li>
                    {/if}
                                          
                                      
                            </ul>
                            <div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
              {if $typename=='pay'}
        <div class="text-muted mb10 payorder">排序：
                                <div class="btn-group btn-group-xs">
                                <a class="btn btn-default {if $readmode==3} active{/if}" href="{url topic/paylist/money}" role="button">人民币</a>
                                <a class="btn btn-default {if $readmode==2} active{/if}" href="{url topic/paylist/credit}" role="button">财富值</a>
    
                                </div>
                                </div>
                                 {/if}
              <div class="stream-list blog-stream">
                        <!--{loop $topiclist $nindex $topic}-->
              <section class="stream-list__item">
              <div class="blog-rank stream__item">
              <div data-id="1190000017247505" class="stream__item-zan   btn btn-default mt0">
              <span class="stream__item-zan-icon"></span>
              <span class="stream__item-zan-number">{$topic['articles']}</span>
              </div></div>
              <div class="summary">
              <h2 class="title blog-type-common blog-type-1">
              <a href="{url topic/getone/$topic['id']}">
              {$topic['title']}
                   {if $topic['readmode']==3}
                      <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="支付{$topic['price']}元可以查看全文" class="icon_hot" style="color:#fff;"><i class="fa fa-cny mar-r-03"></i>$topic['price']元阅读</span>
                    {/if}
                       {if $topic['readmode']==2}
                      <span data-toggle="tooltip" data-placement="bottom" title="" data-original-title="支付{$topic['price']}财富值可以查看全文" class="icon_hot" style="color:#fff;"><i class="fa fa-database mar-r-03"></i>$topic['price']财富值</span>
                    {/if}
              </a></h2>
              <ul class="author list-inline">
              <li>
              <a href="{url user/space/$topic['authorid']}">
              <img class="avatar-24 mr10 " src="{$topic['avatar']}">
              </a>
              <span style="vertical-align:middle;">
              <a href="{url user/space/$topic['authorid']}"> {$topic['author']}</a>
                    
                    发布于
                                            <a href="{url topic/catlist/$topic['articleclassid']}">{$topic['category_name']}</a>
                                            </span>
                                            </li>
      <li class="bookmark " title="{$topic['likes']} 收藏" >
      <span style="vertical-align:middle;">
      <small class="fa fa-bookmark mr5"></small>
      <span class="blog--bookmark__text">{if $topic['likes']}$topic['likes']{/if} 收藏</span>
      </span></li></ul>
      <p class="excerpt wordbreak ">
       {if $topic['price']!=0}
                         <div class="box_toukan ">

  {eval echo clearhtml($topic['freeconent']);}
  {if $topic['readmode']==2}
											<a  class="thiefbox font-12" ><i class="icon icon-lock font-12"></i> &nbsp;更多阅读需支付&nbsp;$topic['price']&nbsp;&nbsp;财富值……</a>
{/if}
  {if $topic['readmode']==3}
											<a  class="thiefbox font-12" ><i class="icon icon-lock font-12"></i> &nbsp;更多阅读需支付&nbsp;$topic['price']&nbsp;&nbsp;元……</a>
{/if}

										</div>
                   {else}
                     {eval echo clearhtml($topic['describtion']);}
                    {/if}

  
  </p>
      </div>
      </section>
        <!--{/loop}-->
              </div>
                  <div class="pages">
    $departstr
    </div>
        </div>
          </div>
              <div class="col-md-7 aside" style="padding:0px;margin-top:0px;">
         <!--{template sider_searcharticle}-->
         <div class=" alert alert-success tipwrite">
                <p>发布经验，赚取财富值，去财富商城兑换礼品！</p>
                <a href="{url user/addxinzhi}" class="btn btn-success btn-block mt-10">写文章</a>
            </div>
                <!--{template sider_author}-->
              
    
     <!--{template sider_hotarticle}-->
              
  
    
        <div class="standing" style="margin-top:20px;">
  <div class="positions bb" id="rankScroll">
      <h3 class="title" style="float:none;" >热门标签</h3>
       <ul class="taglist--inline multi" >
                                    <!--{eval $hosttaglist = $this->fromcache("hosttaglist");}-->
                              
                                          <!--{loop $hosttaglist $index $hottag}-->
                              
                                                            <li class="tagPopup">
                                    <a style="color: #0084FF;" class="tag" href="{url tags/view/$hottag['tagalias']}" >
                                                                          {if $hottag['tagimage']}  <img src="$hottag['tagimage']">{/if}
                                                                        {$hottag['tagname']}</a>
                                </li>
                                                    <!--{/loop}-->         
                                                    </ul>
  </div>
  </div>
  
    
          </div>
            <div>
          </div>
          </div>
            
          </div>
  
    
   


    </div>
<!--{template footer}-->