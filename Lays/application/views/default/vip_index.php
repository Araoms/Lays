<!--{template header}-->
<!--{eval $adlist = $this->fromcache("adlist");}-->
<link rel="stylesheet" media="all" href="{SITE_URL}static/css/widescreen/css/topic.css" />

<style>
    <!--
    .main-wrapper {
        margin-bottom: 40px;
        background: #fff;
    }
    .recommend{
        padding-top:10px;
    }
    .recommend .trigger-menu {
        margin: 0px;
        text-align: left;
    }
    -->
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
                <i class="fa fa-bitcoin"></i> 充值中心</a>
            </li>

            <li {if $status=='member'}    class="active"{/if} >
            <a data-order-by="hot" href="{url vip/member}">
                <i class="fa fa-user-circle-o"></i> 我的会员</a>
            </li>

            <li {if $status=='member_record'}    class="active"{/if} >
            <a data-order-by="hot" href="{url vip/member_record}">
                <i class="fa fa-align-justify"></i> 充值记录</a>
            </li>

        </ul>
    </div>
    <div class="alert alert-warning-inverse ">
        Lays提供多种会员，性价比、功能、技术服务、各方面综合对比。
    </div>
    <table class="table table-bordered font-18">
        <thead>
        <th>服务项目/对比</th>
        <th>Lays 普通会员</th>
        <th>Lays 黄金会员</th>
        <th>Lays 钻石会员</th>
        <th>Lays 王者会员</th>
        </thead>
        <tbody>
        <tr>
            <td>充值赠送财富值</td>
            <td ><span class="wrong-w">×</span></td>
            <td><span class="right-r">{$vip_info[0]['recharge']}</span></td>
            <td><span class="right-r">{$vip_info[1]['recharge']}</span></td>
            <td><span class="right-r">{$vip_info[2]['recharge']}</span></td>
        </tr>
        <tr>
            <td>每日首次登录额外获得财富值</td>
            <td><span class="right-r">×</span></td>
            <td><span class="right-r">{$vip_info[0]['firstlanding']}</span></td>
            <td><span class="right-r">{$vip_info[1]['firstlanding']}</span></td>
            <td><span class="right-r">{$vip_info[2]['firstlanding']}</span></td>
        </tr>
        <tr>
            <td>回答问题额外获得财富值</td>
            <td ><span class="right-r">×</span></td>
            <td ><span class="right-r">{$vip_info[0]['answer']}</span></td>
            <td><span class="right-r">{$vip_info[1]['answer']}</span></td>
            <td><span class="right-r">{$vip_info[2]['answer']}</span></td>
        </tr>
        <tr>
            <td>发布文章额外获得财富值</td>
            <td ><span class="right-r">×</span></td>
            <td ><span class="right-r">{$vip_info[0]['publish_articles']}</span></td>
            <td><span class="right-r">{$vip_info[1]['publish_articles']}</span></td>
            <td><span class="right-r">{$vip_info[2]['publish_articles']}</span></td>
        </tr>
        <tr>
            <td>邀请注册额外获得财富值</td>
            <td ><span class="right-r">×</span></td>
            <td ><span class="right-r">{$vip_info[0]['invitationregister']}</span></td>
            <td><span class="right-r">{$vip_info[1]['invitationregister']}</span></td>
            <td><span class="right-r">{$vip_info[2]['invitationregister']}</span></td>
        </tr>
        <tr>
            <td>全站昵称显示</td>
            <td ><span class="right-r">×</span></td>
            <td ><span class="right-r" style="color: {$vip_info[0]['iickname']}; font-size: 15px;">{$user['username']}</span></td>
            <td><span class="right-r"  style="color: {$vip_info[1]['iickname']};">{$user['username']}</span></td>
            <td><span class="right-r"  style="color: {$vip_info[2]['iickname']};">{$user['username']}</span></td>
        </tr>
        <tr>
            <td>每月享受 "站长" 免费技术服务指导次数 </td>
            <td ><span class="right-r">×</span></td>
            <td ><span class="right-r">{$vip_info[0]['equity']}</span></td>
            <td><span class="right-r">{$vip_info[1]['equity']}</span></td>
            <td><span class="right-r">{$vip_info[2]['equity']}</span></td>
        </tr>
        </tbody>
    </table>

</div>
<!--{template footer}-->