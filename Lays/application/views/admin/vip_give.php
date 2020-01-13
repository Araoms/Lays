<!--{template header}-->
<script type="text/javascript">g_site_url = '{SITE_URL}';
    g_prefix = '{$setting['seo_prefix']}';
    g_suffix = '{$setting['seo_suffix']}';
</script>
<script type="text/javascript" src="{SITE_URL}static/js/neweditor/ueditor.config.js"></script>
<script type="text/javascript" src="{SITE_URL}static/js/neweditor/ueditor.all.js"></script>
<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
    <div style="float:left;">
        <a href="index.php?admin_main/stat{$setting['seo_suffix']}" target="main">
            <b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;赠送会员</div>
</div>
<!--{if isset($message)}-->
<!--{eval $type=isset($type)?$type:'correctmsg'; }-->
<div class="alert  alert-warning">{$message}</div>
<!--{/if}-->
<form class="form-horizontal" action="index.php?admin_vip/give{$setting['seo_suffix']}" method="post" enctype="multipart/form-data" id="form">
    <input type="hidden" value="true" name="form_submit"/>
    <input type="hidden" value="{$vip_member_info['uid']}" name="uid"/>
    <input type="hidden" value="" name="vip_id"/>
    <a name="基本设置"></a>
    <table class="table">
        <tr class="header">
            <th colspan="4">会员设置</th>
        </tr>
        <tr class="header">
            <td>用户名<br/>
                <span class="smalltxt"> 输入用户名点击查询 </span>
            </td>
            <th>
                <input type="text" class="form-control shortinput" placeholder="用户昵称"
                       name="username" />
                <button class="button" name="button">查 询</button>
            </th>
        </tr>
        <tr>
            <td>结果  <div id="result" style="color: red;"></div></td>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>赠送会员等级:</b><br>
                <span class="smalltxt">该会员等级</span>
            </td>

            <td class="altbg2">
                <select name="monthly_selling_price" id="vip_id" required>
                    {loop $vip_info $vip}
                    <option value="$vip['monthly_selling_price']" vip_id="$vip['vip_id']">$vip['grade']</option>
                    {/loop}
                </select>
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>赠送会员时间:</b></td>
            <td class="altbg2">
                <select name="month" id="month" required>
                    <option value="7">7天</option>
                    <option value="1">1个月</option>
                    <option value="3">3个月</option>
                    <option value="6">6个月</option>
                    <option value="8">8个月</option>
                    <option value="12">12个月</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>财富值:</b></td>
            <td class="altbg2">
                <input type="number"   name="recharge" id="recharge" readonly/>
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>总价值金额:</b></td>
            <td class="altbg2">
                <input type="number"   name="this_recharge_money" id="this_recharge_money" readonly/>
            </td>
        </tr>
    </table>
    <br>
    <center><input type="submit" class="button" name="submit" value="提 交"></center><br>
</form>
<br>
<script>

    $(function () {

        $("#recharge").val(0);
        $("#this_recharge_money").val(0);

        $("button[name='button']").on('click',function () {

            var username = $("input[name='username']").val();
            var str = "";

            if( $.trim(username) ==''){
                alert('用户名不能为空');
            }
            $.ajax({
                url: g_site_url+"index.php?admin_vip/get_userinfo",
                data: {username:username},
                dataType: 'json',
                success: function(msg) {
                    if(msg.status = '200'){
                        str += "<span> 查询成功 </span><br/>";
                        str += "<span> 登录名：" + msg.data.username + " </span><br/>";
                        str += "<span> 邮箱：" + msg.data.email + " </span>";
                        $("input[name='uid']").val(msg.data.uid);
                    }else {
                        str += "<span> 没有查询到数据 </span><br/>";
                    }

                    $("#result").html(str);
                }

            });

            return false;
        });


       /**
        *  计算价值、
        *
        *  */
        var vip_money =  '';
        var month =  '';
        var amount_money = '';
        var vip_id = '';

        var halfyear = {$vip_info[0]['halfyear']};     //半年
        var pack_year = {$vip_info[0]['pack_year']};   //包年
        var recharge = {$vip_info[0]['recharge']};   //财富值
        var recharge_1 = {$vip_info[1]['recharge']};   //财富值
        var recharge_2 = {$vip_info[2]['recharge']};   //财富值

        $("#month").on('change',function () {
            vip_money = $('#vip_id option:selected').val();
            vip_id =  $('#vip_id option:selected').attr('vip_id');
            month =  $(this).val();
            if(vip_money!=''){
                amount_money =  vip_money * month;
                if(month==6 && month ==8){
                    amount_money =  (amount_money * halfyear)/10
                }else if(month==12){
                    amount_money =  (amount_money * pack_year)/10;
                }
                calculation(vip_id,month);
                $("#this_recharge_money").val(amount_money.toFixed(2));
                if(month==7){
                    $("#recharge").val(0);
                    $("#this_recharge_money").val(0);
                }


            }
        });

        $("#vip_id").on('change',function () {
            vip_money =  $(this).val();
            vip_id =  $('#vip_id option:selected').attr('vip_id');

            if(month!=''){
                amount_money =  vip_money * month;
                if(month==6 || month ==8){
                    amount_money =  (amount_money * halfyear)/10
                }else if(month==12){
                    amount_money =  (amount_money * pack_year)/10;
                }
                calculation(vip_id,month);
                $("#this_recharge_money").val(amount_money.toFixed(2));
                if(month==7){
                    $("#recharge").val(0);
                    $("#this_recharge_money").val(0);
                }

            }
        });

        /**
         *  计算财富值
         *
         * */
        function calculation(vip_id,month) {
            var wealth = 0;
            switch (vip_id) {
                case '1':
                    var wealth = recharge* month;
                    break;
                case '2':
                    var wealth = recharge_1* month;
                    break;
                case '3':
                    var wealth = recharge_2* month;
                    break;
            }
            $("#recharge").val(wealth);
            $("input[name='vip_id']").val(vip_id);
        }


        $("#form").on('submit',function () {
                  if($("input[name='uid']").val() == ''){
                       alert('请输入正确的用户名');
                       return false;
                  }
        });

    });
</script>
<!--{template footer}-->