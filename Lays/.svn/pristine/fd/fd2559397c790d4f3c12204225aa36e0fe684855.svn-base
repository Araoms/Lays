<!--{template header}-->
<script type="text/javascript">g_site_url = '{SITE_URL}';
    g_prefix = '{$setting['seo_prefix']}';
    g_suffix = '{$setting['seo_suffix']}';
</script>
<script type="text/javascript" src="{SITE_URL}static/js/neweditor/ueditor.config.js"></script>
<script type="text/javascript" src="{SITE_URL}static/js/neweditor/ueditor.all.js"></script>
<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
    <div style="float:left;"><a href="index.php?admin_main/stat{$setting['seo_suffix']}" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;会员编辑</div>
</div>
<!--{if isset($message)}-->
<!--{eval $type=isset($type)?$type:'correctmsg'; }-->
<div class="alert  alert-warning">{$message}</div>
<!--{/if}-->
<form class="form-horizontal" action="index.php?admin_vip/edit{$setting['seo_suffix']}" method="post" enctype="multipart/form-data">
    <input type="hidden" value="true" name="form_submit"/>
    <input type="hidden" value="{$vip_member_info['uid']}" name="uid"/>
    <a name="基本设置"></a>
    <table class="table">
        <tr class="header">
            <th colspan="4">会员设置</th>
        </tr>
        <tr class="header">
            <td>用户名</td>
            <th>{$vip_member_info['username']}</th>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>会员等级:</b><br>
                <span class="smalltxt">该会员的等级</span></td>
            <td class="altbg2">
                <select name="vip_id" id="">
                    {loop $vip_info $vip}
                        <option value="{$vip['vip_id']}">{$vip['grade']}</option>
                    {/loop}
                </select>
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>充值时间:</b><br>
                <span class="smalltxt">充值会员的时间</span></td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput"
                       value="{eval echo date('Y-m-d H:i:s',$vip_member_info['recharge_time']);}"               name="recharge_time">
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>到期时间:</b><br>
                <span class="smalltxt">充值会员的到期的时间</span></td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput"
                       value="{eval echo date('Y-m-d H:i:s',$vip_member_info['due_time']);}"                        name="due_time">
            </td>
        </tr>

        <tr>
            <td class="altbg1" width="45%"><b>当前充值总金额:</b><br>
                <span class="smalltxt">这次开通会员消费的总金额</span></td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$vip_member_info['this_recharge_money']}"               name="this_recharge_money">
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>充值历史总金额:</b><br>
                <span class="smalltxt">充值会员历史消费的总金额</span></td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$vip_member_info['recharge_amount']}"               name="recharge_amount">
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>会员状态:</b><br>
                <span class="smalltxt">该会员正常 还是禁用</span></td>
            <td class="altbg2">
                <label for="vip_member">
                    正常0/禁用1
                    <input type="number"  class="form-control shortinput"
                            id="vip_member"  name="vip_member" value="{$vip_member_info['vip_member']}"/>
                </label>
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>"站长" 免费技术服务指导剩余次数	会员过期提醒:</b><br>
                <span class="smalltxt">免费服务还剩几次</span></td>
            <td class="altbg2">
                <input type="text" class="form-control shortinput" value="{$vip_member_info['service_times']}"               name="service_times">
            </td>
        </tr>
    </table>
    <br>
    <center><input type="submit" class="button" name="submit" value="提 交"></center><br>
</form>
<br>
<!--{template footer}-->