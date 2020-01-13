<!DOCTYPE html>
<html>
 <!--{eval global $starttime,$querynum;$mtime = explode(' ', microtime());$runtime=number_format($mtime[1] + $mtime[0] - $starttime,6); $setting=$this->setting;$user=$this->user;$headernavlist=$this->nav;$regular=$this->regular;$toolbars="'".str_replace(",", "','", $setting['editor_toolbars'])."'";}-->
<head lang="ch">
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
  
    <meta name="format-detection" content="telephone=no">
     <!--{if isset($seo_title)}-->
        <title>{$seo_title}</title>
        <!--{else}-->
        <title><!--{if $navtitle}-->{$navtitle} - <!--{/if}-->{$setting['site_name']}</title>
        <!--{/if}-->
        <!--{if isset($seo_description)}-->
        <meta name="description" content="{$seo_description}" />
        <!--{else}-->
        <meta name="description" content="{$setting['site_name']}" />
        <!--{/if}-->
        <meta name="keywords" content="{$seo_keywords}" />
        <meta name="generator" content="Lays {Lays_CHARSET} {Lays_CHARSET}" />
        <meta name="author" content="Ask2 Team" />
        <meta name="copyright" content="2016 ask2.cn" />
   {if trim(config_item('mobile_domain')) }
      <script type="text/javascript">
      function IsPC() {
    	  var userAgentInfo = navigator.userAgent;
    	  var Agents = ["Android", "iPhone",
    	        "SymbianOS", "Windows Phone",
    	        "iPad", "iPod"];
    	  var flag = true;
    	  for (var v = 0; v < Agents.length; v++) {
    	    if (userAgentInfo.indexOf(Agents[v]) > 0) {
    	      flag = false;
    	      break;
    	    }
    	  }
    	  return flag;
    	}
  	
        var _currenturl=window.location.href;
       var _baseurl="{eval echo trim(config_item('base_url'));}";
       var _mobilebaseurl="{eval echo trim(config_item('mobile_domain'));}";
       var _mobileurl=_currenturl.replace(_baseurl,_mobilebaseurl);
     if(!IsPC()){
         if(_currenturl.indexOf(_mobilebaseurl)<0){
        	 window.location.href=_mobileurl;
         }
    	
     }
      
      
      </script>
      {/if}
    <link rel="stylesheet" href="{if config_item('mobile_domain')}{eval echo config_item('mobile_domain');}{else}{SITE_URL}{/if}static/css/fronze/css/frozen.css?v=1.2">
    <link rel="stylesheet" href="{if config_item('mobile_domain')}{eval echo config_item('mobile_domain');}{else}{SITE_URL}{/if}static/css/fronze/css/main.css?v=1.5">

    <link rel="stylesheet" media="all" href="{if config_item('mobile_domain')}{eval echo config_item('mobile_domain');}{else}{SITE_URL}{/if}static/css/fronze/css/green.css?v=1.4" />
        <link rel="stylesheet" media="all" href="{if config_item('mobile_domain')}{eval echo config_item('mobile_domain');}{else}{SITE_URL}{/if}static/css/fronze/css/xiangying.css?v=1.2" />
    <link rel="stylesheet" media="all" href="{if config_item('mobile_domain')}{eval echo config_item('mobile_domain');}{else}{SITE_URL}{/if}static/css/fronze/js/lib/swiper.min.css" />
    <script src="{if config_item('mobile_domain')}{eval echo config_item('mobile_domain');}{else}{SITE_URL}{/if}static/css/fronze/js/lib/swiper.min.js" type="text/javascript"></script>
     <!-- Font Awesome Icons -->
    <link href="{if config_item('mobile_domain')}{eval echo config_item('mobile_domain');}{else}{SITE_URL}{/if}static/css/static/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
   <style>
   body{
     max-width:900px;
     margin:0 auto;
   }
   </style>
      <script src="{if config_item('mobile_domain')}{eval echo config_item('mobile_domain');}{else}{SITE_URL}{/if}static/css/fronze/lib/zepto.min.js"></script>

    <script src="{if config_item('mobile_domain')}{eval echo config_item('mobile_domain');}{else}{SITE_URL}{/if}static/css/fronze/js/frozen.js"></script>
 
        <script type="text/javascript">
            var g_site_url = "{if config_item('mobile_domain')}{eval echo config_item('mobile_domain');}{else}{SITE_URL}{/if}";
            var query = '?';
            var g_site_name = "{$setting['site_name']}";
            var g_prefix = "{$setting['seo_prefix']}";
            var g_suffix = "{$setting['seo_suffix']}";
            var g_uid = {$user['uid']};
            </script>
            {if $topicid&&$topicone['xzsrc']&&$setting['xiongzhang_appid'] }
<script type="application/ld+json">
    {
        "@context": "https://ziyuan.baidu.com/contexts/cambrian.jsonld",
        "@id": "{SITE_URL}{eval echo substr($_SERVER['REQUEST_URI'],1);}",
        "appid": "{eval echo trim($setting['xiongzhang_appid']);}",  //替换成自己的appid值
        "title": "{$navtitle}",
        "images": [
        "{$topicone['xzsrc']}"
        ],
        "pubDate": "{eval echo date('Y-m-d',$topicone['timespan']);}T{eval echo date('H:i:s',$topicone['timespan']);}" 
    }

</script>
{/if}
</head>
<body ontouchstart>