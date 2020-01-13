<!--{template header}-->
<!--{eval $adlist = $this->fromcache("adlist");}-->
<link rel="stylesheet" media="all" href="{SITE_URL}static/css/widescreen/css/topic.css" />
<script type="text/javascript" src="{SITE_URL}static/js/qrcode.min.js"></script>
<link rel="stylesheet" href="{SITE_URL}static/css/dist/css/zui.min.css" />
<style>
    .table th{
        text-align: center;
    }
    .recommend{
        padding-top:10px;
    }
    .recommend .trigger-menu {
        margin: 0px;
        text-align: left;
    }
    .item-content > div{
        float: left;
    }
    .text {
        text-align: right;
        width: 30%;
    }
    .text_value {
        text-align: center;
        width: 70%;
    }
    .recharge_value{
        text-align: left;
        width: 70%;
    }
    .payment{
        cursor: pointer;
        width: 72px;

    }
    #pay_img{
        position: absolute;
        width: 1000px;
        height: 300px;
        margin-top: 20px;
    }
    .paymentMode{
        border: 1px solid red;
    }
    #money{
        color: orange;
        font-size: 20px;
    }
    #qr_code_img{
        margin: 0 auto;
        width: 150px;
        height: 150px;
    }
    #Load{
        top: -150px;
        margin: 0 auto;
        width: 150px;
        height: 150px;
        background: #eee;
        opacity: 0.7;
    }
    #payment_method{
        position: absolute;
        top: 54%;
        right: 43%;
        width: 150px;
        height: 50px;
    }
    #rmb{
        position: absolute;
        right: 285px;
        top: 60px;
        width: 100px;
        height: 50px;
    }
</style>
<div class="container recommend" >
    <div style="background: #fff;padding:10px;">
        <ul class="trigger-menu" data-pjax-container="#list-container">

            <li {if $status=='index'}   class="active"{/if} >
            <a data-order-by="recommend" href="{url vip/index}">
                <i class="fa fa-address-card-o"></i> 会员特权
            </a>
            </li>

            <li {if $status=='recharge'}    class="active"{/if} >
            <a data-order-by="hot" href="{url vip/recharge}">
                <i class="fa fa-bitcoin"></i> 充值中心
            </a>
            </li>

            <li {if $status=='member'}    class="active"{/if} >
            <a data-order-by="hot" href="{url vip/member}">
                <i class="fa fa-user-circle-o"></i> 我的会员
            </a>
            </li>
            <li {if $status=='member_record'}    class="active"{/if} >
            <a data-order-by="hot" href="{url vip/member_record}">
                <i class="fa fa-align-justify"></i> 充值记录</a>
            </li>
        </ul>
    </div>
    <div class="items items-hover">
        <div class="item">
            <div class="item-content">
                <div >
                    会员充值
                </div>
            </div>
        </div>
        <div class="item">
            <div class="item-content">
                <div class="text">
                    您充值的账号：
                </div>
                <div class="text_value">
                    {$user['username']}
                </div>
            </div>
        </div>
        <div class="item">
            <div class="item-content">
                <div class="text">
                    充值会员选择：
                </div>
                <div class="text_value">
                    <label class="radio-inline">
                        <input type="radio" name="vip_id" checked value="{$vip_info[0]['monthly_selling_price']}" vip_id="{$vip_info[0]['vip_id']}" > <span style="color:{$vip_info[0]['iickname']} ">{$vip_info[0]['grade']} {$vip_info[0]['monthly_selling_price']}元/月</span>
                    </label>

                    <label class="radio-inline">
                        <input type="radio" vip_id="{$vip_info[1]['vip_id']}" name="vip_id" value="{$vip_info[1]['monthly_selling_price']}" > <span style="color:{$vip_info[1]['iickname']} ">{$vip_info[1]['grade']} {$vip_info[1]['monthly_selling_price']}元/月</span>
                    </label>

                    <label class="radio-inline">
                        <input type="radio" name="vip_id" vip_id="{$vip_info[2]['vip_id']}" value="{$vip_info[2]['monthly_selling_price']}" > <span style="color:{$vip_info[2]['iickname']} ">{$vip_info[2]['grade']} {$vip_info[2]['monthly_selling_price']}元/月</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="item-content">
                <div class="text">
                    充值月份：
                </div>
                <div class="text_value">
                    <label class="radio-inline">
                        <input type="radio" checked name="month" value="1">  1个月
                    </label>

                    <label class="radio-inline">
                        <input type="radio" name="month" value="3">  3个月
                    </label>

                    <label class="radio-inline">
                        <input type="radio" name="month" value="6">  6个月
                        <span style="color: red;">( {$vip_info[0]['halfyear']} 折 )</span>
                    </label>

                    <label class="radio-inline">
                        <input type="radio" name="month" value="8">  8个月
                        <span style="color: red;">( {$vip_info[0]['halfyear']} 折 )</span>
                    </label>

                    <label class="radio-inline">
                        <input type="radio" name="month" value="12">  12个月
                        <span style="color: red;">( {$vip_info[0]['pack_year']} 折 )</span>
                    </label>

                </div>
            </div>
        </div>
        <div class="item">
            <div class="item-content">
                <div class="text">
                    赠送财富值共计：
                </div>
                <div class="text_value" id="recharge">

                </div>
            </div>
        </div>

        <div class="text_value" id="pay_img">
            <div id="qr_code_img"></div>
            <div data-loading="正在加载..."
                 class="load-indicator loading" id="Load">
            </div>
            <div id="payment_method">
                {loop $payment $val}
                {if $val['payment_pinyin']== 'zhifubao'}
                <img src="{$setting['zhifubao_logo']}" alt="马云背后的男人~" class="payment paymentMode"     paymentMode="$val['payment_pinyin']">
                {/if}
                {if $val['payment_pinyin']== 'weixin'}
                <img src="{$setting['weixin_logo']}"   alt="马化腾背后的男人~" class="payment"    paymentMode="$val['payment_pinyin']">
                {/if}
                {/loop}
            </div>
            <div id="rmb">
               支付： <span id="money"></span> 元 &nbsp; &nbsp;
            </div>

        </div>

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="items items-hover">
        <div class="item">
            <div class="item-content">
                <div >
                    会员充值活动说明：
                </div>
            </div>
        </div>
        <div class="item">
            <div class="item-content">
                <div class="recharge_value">
                    一：充值6个月至11个月之内，总金额 打 <span style="color: red;">{$vip_info[0]['halfyear']}</span> 折
                </div>
            </div>
        </div>
        <div class="item">
            <div class="item-content">
                <div class="recharge_value">
                    二：充值12个月，总金额 打 <span style="color: red;">{$vip_info[0]['pack_year']}</span> 折
                </div>
            </div>
        </div>
        <div class="item">
            <div class="item-content">
                <div class="recharge_value">
                    三：充值  每6个月以上的
                    <span style="color:{$vip_info[2]['iickname']}"> {$vip_info[2]['grade']}  </span>
                    享受 "站长" 免费技术服务指导次数
                    <span style="color: red">1</span> 次 (可叠加)
                </div>
            </div>
        </div>
        <div class="item">
            <div class="item-content">
                <div class="recharge_value">
                    四：续费开通会员须知：
                    本站开通多个会员 只能实行最高等级会员。
                    非同等级的会员，只有在过期的三天内才可开通，或者设置 <a href="{url vip/member}" style="color: red;">'提前过期'</a>。
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(function () {

        //计算应付金额
        var vip_money =  $("input[name='vip_id']:checked").val();
        var vip_id = $("input[name='vip_id']:checked").attr('vip_id');
        var month =  $("input[name='month']:checked").val();
        var amount_money = '';

        var halfyear = {$vip_info[0]['halfyear']};     //半年
        var pack_year = {$vip_info[0]['pack_year']};   //包年
        var recharge = {$vip_info[0]['recharge']};   //财富值
        var recharge_1 = {$vip_info[1]['recharge']};   //财富值
        var recharge_2 = {$vip_info[2]['recharge']};   //财富值

        $("input:radio[name='month']").on('click',function () {
            $("#Load").show();
            month =  $(this).val();
            request_pay(vip_money,vip_id,month);
        });

        $("input:radio[name='vip_id']").on('click',function () {
            $("#Load").show();
            vip_money =  $(this).val();
            vip_id =  $(this).attr('vip_id');
            request_pay(vip_money,vip_id,month);
        });

        //请求支付
        request_pay(vip_money,vip_id,month);
        function  request_pay(){

            var payment = true;
            //会员选择是否勾选、
            if(vip_id == ''){
                alert('请勾选充值会员');
                payment = false;
            }
            //充值月份是否勾选、
            if(month == ''){
                alert('请勾选充值月份');
                payment = false;
            }

            //支付方式是否勾选、
            var paymentMode = $('.payment').hasClass('paymentMode');

            if(paymentMode == false){
                alert('请选择支付方式');
                payment = false;
            }

            if(vip_money!='' && month!==''){
                amount_money =  vip_money * month;
                if(month>=6 && month<12){
                    amount_money =  (amount_money * halfyear)/10
                }else  if(amount_money!='' && month==12){
                    amount_money =  (amount_money * pack_year)/10
                }
                calculation(vip_id,month);
                $("#money").text(amount_money.toFixed(2));

            }

            if(payment){
                paymentMode = $('.payment').attr('paymentMode');
                $.ajax({
                    url: g_site_url+"index.php?vip/member_recharge",
                    type: 'post',
                    data: {vip_id:vip_id,month:month,paymentMode:paymentMode},
                    dataType: 'json',
                    success: function(msg) {
                        if(msg.status == 200){
                            $("#qr_code_img").html('');
                            var qrcode = new QRCode(document.getElementById("qr_code_img"), {
                                width : 150,
                                height : 150
                            });
                            function makeCode () {
                                $("#Load").hide();
                                qrcode.makeCode(msg.qr_code);
                            }
                            makeCode();
                        }else {
                            $("#Load").attr('data-loading',msg.msg);
                        }
                    }
                });
            }
        }

        /**
         *  选择支付
         * */
        $(".payment").on('click',function () {
            $('img').removeClass('paymentMode');
            $(this).addClass('paymentMode');
            request_pay();

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
            $("#recharge").text(wealth);
        }
    });




    /**
     * 支付弹窗、
     * */
    $(function () {

    });
</script>
<!--{template footer}-->