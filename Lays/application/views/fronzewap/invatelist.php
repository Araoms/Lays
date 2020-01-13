<!--{template header}-->

<section class="ui-container">
<!--{template user_title}-->
     <ul class="tab-head">
                                         
                  
                      <li class="tab-head-item current"><a href="{url user/invatelist}" title="邀请的人">邀请的人</a></li>
                                                                               
                  
                      <li class="tab-head-item "><a href="{url user/invateme}" title="邀请回答">邀请回答</a></li>
                                                                               
                  
                            

   
</ul>
   
    <section class="user-content-list">
    
                          <ul class="ui-list ui-list-one ui-list-link ui-border-tb">
                 {if $followerlist==null}
                
               
    <p class="user-p-tip ui-txt-warning">  你还没有邀请任何人注册。</p>

                 {/if}
                    <!--{loop $followerlist $index $follower}-->
    <li class="ui-border-t" onclick="window.location.href='{url user/space/$follower['uid']}'">
    
        <div class="ui-list-thumb">
            <span style="background-image:url({$follower['avatar']})"></span>
        </div>
        <div class="ui-list-info">
            <h4 class="ui-nowrap">{$follower['username']}</h4>
            <div class="ui-txt-info">
             <!--{if (1 == $follower['gender'])}--> 男 
            
             <!--{else}-->
             女
            <!--{/if}-->
            </div>
        </div>
    </li>
  <!--{/loop}-->    
</ul>
          <div class="pages" >{$departstr}</div>   
    </section>
</section>


<!--{template footer}-->