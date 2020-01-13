
   <!--{if $setting['cancopy']==1}-->
              <script src="{SITE_URL}static/js/nocopy.js"></script>
                <!--{/if}-->

<script src="{SITE_URL}static/js/jquery.lazyload.min.js"></script>
<script>

 <!--{if $setting['opensinglewindow']==1}-->
 $("a").attr("target","_self");

                <!--{/if}-->
  

                    $("img.lazy").lazyload({effect: "fadeIn" });

</script>

  <div class="side-tool" id="to_top"><ul><li data-placement="left" data-toggle="tooltip" data-container="body" data-original-title="回到顶部" >
    <a href="#" class="function-button"><i class="fa fa-angle-up"></i></a>
    </li>



      </ul></div>
      <script>
window.onload = function(){
	  $(".edui-upload-video").attr("preload","");
  var oTop = document.getElementById("to_top");

  var screenw = document.documentElement.clientWidth || document.body.clientWidth;
  var screenh = document.documentElement.clientHeight || document.body.clientHeight;
  window.onscroll = function(){
    var scrolltop = document.documentElement.scrollTop || document.body.scrollTop;
 
    if(scrolltop<=screenh){
    	oTop.style.display="none";
    }else{
    	oTop.style.display="block";
    }
    if(scrolltop>30){
	     
    	$(".scrollshow").show();
    }else{
    	$(".scrollshow").hide();
    }
  }
  oTop.onclick = function(){
    document.documentElement.scrollTop = document.body.scrollTop =0;
  }
}

</script>

    <footer id="footer">
        <div class="footer-wrapper">
            <div class="footer-wrapper-top">
                <div class="footer-wrapper-top-left">
                    <a href="{url tags}"><i class="hide"></i>标签大全</a>
                    <a href="{url new}" >站内问题</a>
                    <a href="{url topic/default}" >专栏文章</a>
                    <a href="{url expert/default}">站内专家</a>
                    <a href="{url category/viewtopic/hot}" >站内话题</a>
                    <a href="{url note/list}" >站内公告</a>
                     <a href="{url note/about}">关于我们</a>
     <!--{if $setting['site_statcode']}--> {eval echo decode($setting['site_statcode'],'tongji');}<!--{/if}-->

                </div>
               
            </div>
            
                     {if $regular=='index/index'}
                     
                            <div class="container youlian">
                <ul class="list-unstyled list-inline">
            <li>友情链接</li>
             <!--{eval $links=$this->fromcache('link');}-->

         <!--{if $links }-->


              <!--{loop $links $link}-->
              
                        <li><a target="_blank" href="{$link['url']}" title="{$link['description']}">    {$link['name']}</a></li>
                <!--{/loop}-->
   <!--{/if}-->
                    </ul>
       
      
    </div>
    
    
            
            
            
   {/if}
   
         
           
            <div class="footer-wrapper-bottom space-footer-bottom">
                <a href="http://www.12377.cn/" target="_blank">网上有害信息举报专区</a>
                    <i></i>
                    <a href="http://beian.miit.gov.cn" target="_blank">{$setting['site_icp']}</a>
                <i></i>
                <span >
                    <a href="https://www.baidu.com" target="_blank">
                        百度一下
                    </a></span>
                <i></i>
                <span><a href="https://www.aliyun.com" target="_blank">阿里云官网</a></span>
                <i></i>
                <span><a href="https://ai.baidu.com" target="_blank">百度ai开放平台</a></span>
               <i></i>
                <span><a href="https://cloud.tencent.com" target="_blank">腾讯云官网</a></span>
            
                <span class="copyrightLink">Copyright © 2019-2020 <a href="" target="_blank"></a></span>
            </div>
        </div>
    </footer>
   <div><?php require_once STATICPATH .'push/baidu_js_push.php' ?></div>
</div>

</body>
</html>
