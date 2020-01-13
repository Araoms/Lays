<!--{template meta}-->
<div id="body">
    <div class="top-bar">
        <div class="wrapper clearfix">
            <ul class="znav">
                <!--{eval $headernavlist = $this->fromcache("headernavlist");}-->
                <!--{loop $headernavlist $headernav}-->
                <!--{if $headernav['type']==1 && $headernav['available']}-->


                <li class="tab-head-item <!--{if strstr($headernav['url'],$regular)}--> current<!--{/if}-->"><a  href="{$headernav['format_url']}" title="{$headernav['title']}">{$headernav['name']}</a></li>
                <!--{/if}-->
                <!--{/loop}-->


            </ul>
            <div class="pub-bbs-top-inner">
                <ul class="pub-bbs-login" id="pub-bbs-login">
                    <li class="pub-user-bar help_new">
                        {if $this->user['vip']}
                            欢迎您：
                        <a href="{url user/default}">{eval echo $this->user['vip']['iickname']}
                        </a>
                        来到【Lays IT中文网】
                        {else}
                        {if $user['username']}
                        欢迎您：
                        <a href="{url user/default}">{$user['username']}</a>
                        来到【Lays IT中文网】
                        {/if}
                        {/if}
                    </li>

                    <li class="pub-user-bar help_new">
                        <a href="javascript:;" title="官方技术②群，加群暗号：Lays IT中文网">
                            <img border="0" src="http://wpa.qq.com/pa?p=2:1349859051:52" alt="官方技术②群，加群暗号：Lays IT中文网" />
                            <span>QQ群：144879040</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    <div class="nav-headerbox" >
        <div class="nav-header clearfix">
            <div class="ask-logo">
                <a href="{SITE_URL}" target="_blank">
                    <img src="{$setting['site_logo']}" alt="Lays 问答">
                </a>
            </div>

            <ul class="hnav clearfix">

                <li class="<!--{if strstr('index/index',$regular)}--> current<!--{/if}-->">
                    <a href="{SITE_URL}" >首页</a>
                    <p>Home</p>
                </li>

                <li class="<!--{if strstr('topic/default',$regular)}--> current<!--{/if}-->">
                    <a href="{url topic/default}" >文章库</a>
                    <p>Article</p>
                </li>

                <li class="<!--{if strstr('new/default',$regular)}--> current<!--{/if}-->">
                    <a href="{url newpage/index}" >问答库</a>
                    <p>Questions</p>
                </li>

                <!--预测目标-->

                <li  class="<!--{if strstr('itembank/index',$regular)}--> current<!--{/if}--> itembank ">
                    <a href="{url itembank/index}" >技术题库</a>
                    <p>Item Bank</p>
                </li>

                <li class="<!--{if strstr('xxx/default',$regular)}--> current<!--{/if}-->">
                    <a href="{url xxx/index}" >工具库</a>
                    <p>Tools</p>
                </li>
{if false}
                <li class="<!--{if strstr('videos/index',$regular)}--> current<!--{/if}-->">
                                    <a href="{url videos/index}" >视频库</a>
                                    <p>Videos</p>
                </li>
{/if}
                <li class="<!--{if strstr('expert/index',$regular)}--> current<!--{/if}-->">
                    <a href="{url expert/index}" >专家</a>
                    <p>Expert</p>
                </li>


            </ul>

            <div class="searchbox">
                <div class="search">
                    <form name="searchform" action="{url question/search}" method="post" accept-charset="UTF-8">

                        <input type="text" id="search-kw" autocomplete="off" value=""  class="key-words" name="word" placeholder="请输入关键词">

                        <span class="search-cancel"></span>
                    </form>
                    <a class="sear-btn"></a>
                </div>
                <div class="header_ask">
                    <!--{if 0==$user['uid']}-->
                    <a href="javascript:;" onclick="login()" class="ask">提问</a>

                    <!--{else}-->
                    <a href="{url question/add}"  class="ask">提问</a>

                    <!--{/if}-->
                </div>
                <div class="header_menu">
                    <header>
                        <nav class="ws_header">

                            <div class="menu">




                                <div class="user-center">

                                    <!--{if 0!=$user['uid']}-->
                                    <ul class="login" >

                                        <li class="message">

                                            <a class="message-list"><i class="fa fa-bell"></i>
                                                <sup class="subnav-dot-sup hide"></sup>
                                            </a>
                                            <div class="menu-list message-box hide">
                                                <section>消息盒 </section>
                                                <div id="contetn-2" class="message-box-list-wrapper">
                                                    <ul class="message-box-list mCustomScrollbar _mCS_1 mCS-autoHide mCS_no_scrollbar"><div id="mCSB_1" class="mCustomScrollBox mCS-dark mCSB_vertical mCSB_inside" style="max-height: 225px;" ><div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
                                                                <li class="news-circle personmsgbox"> </li>
                                                                <li class="news-circle systemmsgbox"> </li>
                                                            </div>
                                                            <div id="mCSB_1_scrollbar_vertical" class="mCSB_scrollTools mCSB_1_scrollbar mCS-dark mCSB_scrollTools_vertical" style="display: none;"><a href="#" class="mCSB_buttonUp"></a><div class="mCSB_draggerContainer"><div id="mCSB_1_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div><a href="#" class="mCSB_buttonDown"></a></div></div></ul>

                                                </div>
                                                <div id="empty_message_box" class="msg-box-null">
                                                    <div class="msg-box-inner">
                                                        <span class="null-images"></span>
                                                        <span class="msg-null-tips">没有新消息</span>
                                                    </div>
                                                </div>
                                                <a  class="check-all" href="{url message/personal}">查看全部 </a>
                                            </div>
                                            <!--                        -->
                                        </li>
                                        <li class="user"><div class="avatar-container-30">

                                                <a href="{url user/default}" class="user-list" ><img src="{$user['avatar']}" title="{$user['username']}" alt="{$user['username']}"></a>

                                            </div>
                                            <div class="menu-list user-box hide">
                                                <section>
                                                    <a href="{url user/default}" z-st="nav_userbox_name">{eval echo $this->user['vip']['iickname']}</a></section>
                                                <div class="user-box-list">
                                                    <div class="user-box-list-area">
                                                        <!--{if $user['groupid']<=3}-->
                                                        <p class="works-manange"><a href="{SITE_URL}index.php?admin_main" >后台管理</a></p>

                                                        <!--{/if}-->
                                                        <p class="works-manange"><a href="{url user/recommend}" >为我推荐</a></p>
                                                        <p class="works-manange"><a href="{url user/ask}" >我的提问</a></p>
                                                        <p class="works-manange"><a href="{url user/answer}" >我的回答</a></p>
                                                        <p class="works-manange"><a href="{url topic/userxinzhi/$user['uid']}">我的文章</a></p>
                                                        <p class="works-manange"><a href="{url user/attention/question}" >我的关注</a></p>

                                                    </div>
                                                    <div class="user-box-list-area">

                                                        <p class="works-manange"><a href="{url user/profile}" >资料与帐号</a></p>
                                                    </div>
                                                    <div class="user-box-list-area">
                                                        <p class="works-manange"><a href="{url user/logout}" >退出</a></p>
                                                    </div>
                                                </div>
                                            </div>


                                        </li>

                                        <li class="ll_logo" >
                                            <a href="javascript:laysLogin();" class="user-list"  >
                                                <img src="{$setting['site_ll_logo']}"
                                                     title="{$user['username']}"
                                                     alt="快来这里 有大佬哦 ~" />
                                            </a>
                                        </li>

                                    </ul>
                                    <!--{else}-->
                                    <ul class="unlogin ">
                                        <li><a href="javascript:login();"  class="nav-unlogin">登录<i></i></a><a href="{url user/register}">注册</a></li>
                                    </ul>
                                    <!--{/if}-->
                                </div>
                        </nav>
                    </header>
                </div>
            </div>

        </div>
        <!-- fix-hnav end -->
    </div>
    <script type="text/javascript">
        $(".sear-btn").click(function(){
            var _txt=$.trim($("#search-kw").val());
            if(_txt==''){
                alert("关键词不能为空");
                return ;
            }
            document.searchform.action = "{url question/search}";
            document.searchform.submit();
        });

        $(".message .message-list,.message .message-box").hover(function(){
            $(".message .message-box").show();
        },function(){	$(".message .message-box").hide();});

    </script>

    <div class="main-wrapper index">