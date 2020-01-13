<!--{template header}-->
<div class="container person">
    <div class="row">
        <div class="col-xs-17 main">
            <!-- 用户title部分导航 -->
            <!--{template user_title}-->
            <ul class="trigger-menu" data-pjax-container="#list-container">
                <liclass=""><a href="{url user/default}"><i class="fa fa-clipboard"></i> 动态</a></li>
                <li class=""><a href="{url user/ask}"><i class="fa fa-question-circle-o"></i> 提问</a></li>
                <li class=""><a href="{url user/answer}"><i class="fa fa-comments"></i>回答</a></li>
                <li class=""><a href="{url ut-$user['uid']}"><i class="fa fa-rss"></i>文章</a></li>
                <li class=""><a href="{url user/recommend}"><i class="fa fa-newspaper-o"></i>推荐</a></li>
                <li class="active"><a href="{url user/record}"><i class="fa fa-tasks"></i>做题记录</a></li>
            </ul>
            <div id="list-container">

                <!--{loop $record_info  $key $val}-->

                <div class="list-group">
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">时间：{eval echo date('Y-m-d',$val['start_time']);}</h4>
                        <p class="list-group-item-text text-muted">得分：{$val['total_score']} </p>
                        <p class="list-group-item-text text-muted">等级：{$val['grade']}</p>
                        <p class="list-group-item-text text-muted">称号：{$val['title']}</p>
                    </a>
                </div>
                <!--{/loop}-->

                {if empty($record_info) }
                   <div>没有回答</div>
                {/if}
            </div>
        </div>

        <div class="col-xs-7  aside">
            <!--{template user_menu}-->
        </div>

    </div>
</div>
<!--{template footer}-->
