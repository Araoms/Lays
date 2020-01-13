<!--{template header}-->
<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
    <div style="float:left;">
        <a href="index.php?admin_main/stat{$setting['seo_suffix']}" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;会员列表
    </div>
</div>
<div id="append"></div>
<!--{if isset($message)}-->
<!--{eval $type=isset($type)?$type:'correctmsg'; }-->
<table class="table">
    <tr>
        <td class="{$type}">{$message}</td>
    </tr>
</table>
<!--{/if}-->

<form action="index.php?admin_vip/search{$setting['seo_suffix']}" method="post">
    <table class="table">
        <tr class="header" ><td colspan="7">会员列表</td></tr>
        <tr class="altbg1"><td colspan="7">可以通过如下搜索条件，检索用户</td></tr>
    </table>
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-3">
        </div>
    </div>
    <table class="table">
        <tbody>
        <tr>
            <td width="20%" ><label >
                    充值日期:</label>
                <div class="input-group date form-date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16" id="timestart" name="srchregdatestart" value="{if isset($search['srchregdatestart'])}$search['srchregdatestart']{/if}"  readonly="">
                    <span class="input-group-addon"><span class="icon-remove"></span></span>
                    <span class="input-group-addon"><span class="icon-calendar"></span></span>
                </div>
            </td>
            <td width="20%" >
                <label>
                    到</label>
                <div class="input-group date form-date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input class="form-control" size="16"  id="timeend" name="srchregdateend" value="{if isset($search['srchregdateend'])}$search['srchregdateend']{/if}" readonly="">
                    <span class="input-group-addon"><span class="icon-remove"></span></span>
                    <span class="input-group-addon"><span class="icon-calendar"></span></span>
                </div>
            </td>
        </tr>
        <tr>
            <td width="20%" >用户名:<input class="txt form-control" name="srchname" value="{if isset($search['srchname'])}$search['srchname']{/if}" /></td>
            <td  width="20%">UID:<input class="txt form-control" name="srchuid" value="{if isset($search['srchuid'])}$search['srchuid']{/if}" /></td>
            <td  width="20%">Email:<input class="txt form-control" name="srchemail" value="{if isset($search['srchemail'])}$search['srchemail']{/if}" /></td>

        </tr>
        <tr>
            <td rowspan="2" >
                <button class="btn btn-success" type="submit" >提 交</button>
            </td>
        </tr>
        </tbody>
    </table>
</form>
<form name="userForm" action="index.php?admin_vip/remove{$setting['seo_suffix']}" method="post">
    <table class="table table-striped">
        <thead>
        <tr class="header" >
            <td ><input class="checkbox" value="chkall" id="chkall" onclick="checkall('uid[]')" type="checkbox" name="chkall"><label for="chkall">全选</label></td>
            <td >用户ID</td>
            <td >用户名</td>
            <td >会员等级</td>
            <td >充值时间</td>
            <td >到期时间</td>
            <td >当前充值总金额</td>
            <td >充值历史总金额</td>
            <td>会员状态</td>
            <td>"站长" 免费技术服务指导剩余次数</td>
            <td>会员过期提醒</td>
            <td>操作</td>
        </tr>
        </thead>


        <!--{loop $vip_member_list $member}-->
        <tr>
            <td class="altbg2"><input class="checkbox" type="checkbox" value="{$member['uid']}" name="uid[]"></td>
            <td class="altbg2"><strong>{$member['uid']}</strong></td>
            <td class="altbg2"><strong>{$user_name[$member['uid']]}</strong></td>
            <td class="altbg2">{$viplist[$member['vip_id']]}</td>
            <td class="altbg2">{eval echo date('Y-m-d H:i:s',$member['recharge_time']);}</td>
            <td class="altbg2">{eval echo date('Y-m-d H:i:s',$member['due_time']);}</td>
            <td class="altbg2">{$member['this_recharge_money']}</td>
            <td class="altbg2">{$member['recharge_amount']}</td>
            <td class="altbg2">
                {if $member['vip_member']==0}
                <span class="text-danger" > 正常
                    </span>
                {else}
                禁用
                {/if}

            </td>
            <td class="altbg2">{$member['service_times']}</td>
            <td class="altbg2">
                {if $member['due_status']==0}
                <span class="text-danger" > 未提醒
                    </span>
                {else}
                已提醒
                {/if}
            </td>

            <td class="altbg2"><a href="index.php?admin_vip/edit/$member['uid']{$setting['seo_suffix']}">编辑</a></td>
        </tr>
        <!--{/loop}-->

        <!--{loop $vip_member_info $member}-->
        <tr>
            <td class="altbg2"><input class="checkbox" type="checkbox" value="{$member['uid']}" name="uid[]"></td>
            <td class="altbg2"><strong>{$member['uid']}</strong></td>
            <td class="altbg2"><strong>{$member['username']}</strong></td>
            <td class="altbg2">{$member['grade']}</td>
            <td class="altbg2">{eval echo date('Y-m-d H:i:s',$member['recharge_time']);}</td>
            <td class="altbg2">{eval echo date('Y-m-d H:i:s',$member['due_time']);}</td>
            <td class="altbg2">{$member['this_recharge_money']}</td>
            <td class="altbg2">{$member['recharge_amount']}</td>
            <td class="altbg2">
                {if $member['vip_member']==0}
                <span class="text-danger" > 正常
                    </span>
                {else}
                禁用
                {/if}

            </td>
            <td class="altbg2">{$member['service_times']}</td>
            <td class="altbg2">
                {if $member['due_status']==0}
                <span class="text-danger" > 未提醒
                    </span>
                {else}
                已提醒
                {/if}
            </td>

            <td class="altbg2">
                <a href="index.php?admin_vip/edit/$member['uid']{$setting['seo_suffix']}">编辑</a>
            </td>
        </tr>
        <!--{/loop}-->

        <!--{if $departstr}-->
        <tr class="smalltxt">
            <td class="altbg2" colspan="8" align="left"><div class="pages">{$departstr}</div></td>
        </tr>
        <!--{/if}-->
    </table>
</form>
<br>
<link href="{SITE_URL}static/css/dist/lib/datetimepicker/datetimepicker.min.css" rel="stylesheet">
<script src="{SITE_URL}static/css/dist/lib/datetimepicker/datetimepicker.min.js"></script>

<script type="text/javascript">
    function change_expert(type) {
        if ($("input[name='uid[]']:checked").length == 0) {
            alert('你没有选择任何用户');
            return false;
        }
        document.userForm.action = "index.php?admin_vip/expert/" + type;
        document.userForm.submit();

    }
    function thankTa(uid){
        if(confirm("是否确认感谢Ta,确认后会打赏一块钱给Ta")){
            window.location.href="{SITE_URL}index.php?admin_tixian/ganxie/"+uid+"{$setting['seo_suffix']}";
        }

    }
    function change_caijiuser(type) {
        if ($("input[name='uid[]']:checked").length == 0) {
            alert('你没有选择任何用户');
            return false;
        }
        document.userForm.action = "index.php?admin_vip/caijiuser/" + type;
        document.userForm.submit();

    }

    function remove_user() {
        if ($("input[name='uid[]']:checked").length == 0) {
            alert('你没有选择任何用户');
            return false;
        }
        if (confirm('是否同时删除用户的所有问答？') == true) {
            document.userForm.action = "index.php?admin_vip/remove/all{$setting['seo_suffix']}";
            document.userForm.submit();
        } else {
            document.userForm.action = "index.php?admin_vip/remove{$setting['seo_suffix']}";
            document.userForm.submit();
        }
    }
    // 仅选择日期
    $(".form-date").datetimepicker(
        {
            language:  "zh-CN",
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0,
            format: "yyyy-mm-dd"
        });
</script>
<!--{template footer}-->


