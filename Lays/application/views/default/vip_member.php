<!--{template header}-->
<!--{eval $adlist = $this->fromcache("adlist");}-->
<link rel="stylesheet" media="all" href="{SITE_URL}static/css/widescreen/css/topic.css" />
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
    .paymentMode{
        border: 1px solid red;
    }
    #money{
        color: orange;
        font-size: 20px;
    }
    img{
        cursor: pointer;
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
                    我的会员信息
                </div>
            </div>
        </div>
        <div class="item">
            <div class="item-content">
                <div class="text">
                    您的账号：
                </div>
                <div class="text_value">
                    <span style="">
                        {if $this->user['vip']}
                        {eval echo $this->user['vip']['iickname']}
                        {else}
                         {$user['username']}
                        {/if}
                    </span>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="item-content">
                <div class="text">
                    会员等级：
                </div>
                <div class="text_value">
                    {$vip_name}
                </div>
            </div>
        </div>
        {if $user_info && $user_info['due_time'] > time()}
        <div class="item">
            <div class="item-content">
                <div class="text">
                    会员状态：
                </div>
                <div class="text_value">
                    {if $user_info['vip_member']}
                    <span style="color: red">禁用</span>
                    {else}
                    正常
                    {/if}
                </div>
            </div>
        </div>
        <div class="item">
            <div class="item-content">
                <div class="text">
                    会员开通时间：
                </div>
                <div class="text_value">
                    <span>{eval echo date('Y-m-d H:i:s',$user_info['recharge_time'])}</span>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="item-content">
                <div class="text">
                    会员到期时间：
                </div>
                <div class="text_value">
                    <span>{eval echo date('Y-m-d H:i:s',$user_info['due_time'])}</span>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="item-content">
                <div class="text">
                    会员开通方式：
                </div>
                <div class="text_value">
                    <span>活动赠送</span>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="item-content">
                <div class="text">
                    "站长" 免费技术服务指导剩余次数：
                </div>
                <div class="text_value">
                    <span>{$user_info['service_times']}</span>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="item-content">
                <div class="text">
                    设置会员过期 ，执行之后会员到期时间剩余2天、<span style="color: red;">(此操作一旦执行,不可恢复,请注意.)</span>：
                </div>
                <div class="text_value">
                    <span style="color: red;text-decoration: underline;cursor: pointer;" id="overdue">点击 提前到期、</span>
                </div>
            </div>
        </div>
        {/if}
    </div>
</div>


<script>

    $(function () {

        /**
         *  提前到期、
         * */
        $("#overdue").on('click',function () {

            if(confirm('确认要设置马上到期吗?会员特权将结束')){
                $.ajax({
                    url: g_site_url+"index.php?vip/overdue",
                    data: {},
                    dataType: 'json',
                    success: function(msg) {
                            alert(msg.msg);
                    }
                });
            }

        });

    });
</script>
<!--{template footer}-->