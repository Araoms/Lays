<!--{template header}-->
<script type="text/javascript">g_site_url = '{SITE_URL}';
    g_prefix = '{$setting['seo_prefix']}';
    g_suffix = '{$setting['
    seo_suffix']}';
</script>
<script type="text/javascript" src="{SITE_URL}static/js/neweditor/ueditor.config.js"></script>
<script type="text/javascript" src="{SITE_URL}static/js/neweditor/ueditor.all.js"></script>
<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
    <div style="float:left;"><a href="index.php?admin_main/stat{$setting['seo_suffix']}" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;会员设置</div>
</div>
<style>
    .shortinput{
        max-width: 180px;
    }
</style>
<!--{if isset($message)}-->
<!--{eval $type=isset($type)?$type:'correctmsg'; }-->
<div class="alert  alert-warning">{$message}</div>
<!--{/if}-->
<form class="form-horizontal" action="index.php?admin_vip/vip_set{$setting['seo_suffix']}" method="post" enctype="multipart/form-data">
    <input type="hidden" value="true" name="form_submit"/>
    <a name="基本设置"></a>
    <table class="table">
        <tr class="header">
            <th colspan="4">会员设置</th>
        </tr>
        <tr class="header">
            <td>会员等级</td>
            <th>{$viplist[0]['grade']}</th>
            <th>{$viplist[1]['grade']}</th>
            <th>{$viplist[2]['grade']}</th>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>充值赠送财富值:</b><br>
                <span class="smalltxt">充值时一次性赠送财富值</span></td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[0]['recharge']}"               name="recharge">
            </td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[1]['recharge']}"               name="recharge_1">
            </td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[2]['recharge']}"               name="recharge_2">
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>每日首次登陆获得财富值:</b><br>
                <span class="smalltxt">首次登陆</span></td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[0]['firstlanding']}"               name="firstlanding">
            </td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[1]['firstlanding']}"               name="firstlanding_1">
            </td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[2]['firstlanding']}"               name="firstlanding_2">
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>回答问题财富值:</b><br>
                <span class="smalltxt">回答问题获得额外财富值</span></td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[0]['answer']}"               name="answer">
            </td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[1]['answer']}"               name="answer_1">
            </td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[2]['answer']}"               name="answer_2">
            </td>
        </tr>

        <tr>
            <td class="altbg1" width="45%"><b>发布问题获得财富值:</b><br>
                <span class="smalltxt">发布问题额外获得财富值</span></td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[0]['publish_articles']}"               name="publish_articles">
            </td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[1]['publish_articles']}"               name="publish_articles_1">
            </td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[2]['publish_articles']}"               name="publish_articles_2">
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>邀请注册获得财富值:</b><br>
                <span class="smalltxt">邀请注册获得额外财富值</span></td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[0]['invitationregister']}"               name="invitationregister">
            </td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[1]['invitationregister']}"               name="invitationregister_1">
            </td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[2]['invitationregister']}"               name="invitationregister_2">
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>会员显示昵称颜色:</b><br>
                <span class="smalltxt">会员全站显示昵称颜色</span></td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[0]['iickname']}"               name="iickname">
            </td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[1]['iickname']}"               name="iickname_1">
            </td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[2]['iickname']}"               name="iickname_2">
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>包年打折:</b><br>
                <span class="smalltxt">包年会员打折</span></td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[0]['pack_year']}"               name="pack_year">
            </td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[1]['pack_year']}"               name="pack_year_1">
            </td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[2]['pack_year']}"               name="pack_year_2">
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>半年打折:</b><br>
                <span class="smalltxt">半年会员打折</span></td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[0]['halfyear']}"               name="halfyear">
            </td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[1]['halfyear']}"               name="halfyear_1">
            </td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[2]['halfyear']}"               name="halfyear_2">
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>会员售价:</b><br>
                <span class="smalltxt">一个月会员售价</span></td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[0]['monthly_selling_price']}"               name="monthly_selling_price">
            </td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[1]['monthly_selling_price']}"               name="monthly_selling_price_1">
            </td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[2]['monthly_selling_price']}"               name="monthly_selling_price_2">
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>一个月规定天数:</b><br>
                <span class="smalltxt">开通会员一个月时长</span></td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[0]['monthly_selling_time']}"               name="monthly_selling_time">
            </td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[1]['monthly_selling_time']}"               name="monthly_selling_time_1">
            </td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$viplist[2]['monthly_selling_time']}"               name="monthly_selling_time_2">
            </td>
        </tr>
    </table>

   
    <br>
    <center><input type="submit" class="button" name="submit" value="提 交"></center><br>
</form>
<br>
<!--{template footer}-->