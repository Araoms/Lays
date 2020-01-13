<!--{template header}-->
<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
    <div style="float:left;"><a href="index.php?admin_main/stat{$setting['seo_suffix']}" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;搜索设置</div>
</div>
<!--{if isset($message)}-->
<!--{eval $type=isset($type)?$type:'correctmsg'; }-->
<table class="table">
    <tr>
        <td class="{$type}">{$message}</td>
    </tr>
</table>
<!--{/if}-->
<table class="table">
    <tbody><tr class="header"><td>设置说明</td></tr>
        <tr><td>1、开启全文检索之前系统要开启了PHP iconv库,否则系统不支持<br />
                2、全文检索目前整合的是第三方搜全文检索引擎xunsearch，整合前请先确认已配置好xunsearch。
            </td></tr>
    </tbody></table>
<br />
<form action="index.php?admin_setting/search{$setting['seo_suffix']}" method="post">
    <a name="基本设置"></a>
    <table class="table">
        <tr class="header">
            <td colspan="2">参数设置</td>
        </tr>
        <tr>
            <td width="45%" class="altbg1"><b>搜索框提示文字</b><br><span class="smalltxt">可以留空</span></td>
            <td class="altbg2"><input type="text" style="width:332px;" name="search_placeholder" value="{$setting['search_placeholder']}" /></td>
        </tr>
           <tr>
            <td width="45%" class="altbg1"><b>搜索框下拉显示条数</b><br><span class="smalltxt">默认5条</span></td>
            <td class="altbg2"><input type="text" style="width:332px;" name="search_shownum" value="{$setting['search_shownum']}" /></td>
        </tr>
   
    
    </table>
    <br>
    <center><input type="submit" class="btn btn-success" name="submit" value="提 交"></center><br>
</form>
<script type="text/javascript">
var qpages =$qpages;
var question_num=0;

    function makeindex(){

        $("#question").prop("disabled", "disabled");

      	  $.get("{SITE_URL}index.php?admin_question/makeindex/"+question_num, function(msg) {
                if(msg=='ok'){



              	  if(question_num<=qpages){
                		makeindex();
              	  }else{
              		question_num=0;
             		 $("#indexmsg").html("<font color='green'>已完成!</font>");
              		return false;
              	  }
                	$("#makeindex").parent().html("<font color='orange'>正在重新建立问题索引,请稍后("+question_num+"/"+qpages+")...</font>");

              	question_num++;


                }
            });


    }
    function maketopicindex() {
        $("#maketopicindex").parent().html("<font color='orange'>正在重新建立文章索引,请稍后...</font>");
        $.get("{SITE_URL}index.php?admin_topic/makeindex", function(msg) {
            if (msg == 'ok') {
                $("#topicindexmsg").html("<font color='green'>已完成!</font>");
            }
        });
    }
</script>
<!--{template footer}-->