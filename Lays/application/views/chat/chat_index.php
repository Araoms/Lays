<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/static/chat/css/contextMenu.css" />
        <link rel="stylesheet" href="/static/chat/layui/css/layui.css">
        <link rel="stylesheet" href="/static/chat/css/menu.css">
        <script type='text/javascript' src='/static/chat/js/webim.config.js'></script>
        <script type='text/javascript' src='/static/chat/js/strophe-1.2.8.js'></script>
        <script type='text/javascript' src='/static/chat/js/websdk-1.4.13.js'></script>
        <script src="/static/chat/layui/layui.js"></script>
    </head>
    <div  class="sign" data-token="{$_SESSION['info']['id']}" data-rykey="{$_SESSION['info']['easemob_token']}">
    </div>
    <script>

        //定义路径
        var uploadsPerson =  '/static/chat/uploads/person/';
        var uploadsSkin =  '/static/chat/uploads/skin/';

    </script>
    <script>
        $(function () {
            //layui绑定扩展
            layui.config({
                base: '/static/chat/js/'
            }).extend({
                socket: 'socket',
            });
            layui.use(['layim', 'jquery', 'socket'], function (layim, socket) {
                var $ = layui.jquery;
                var socket = layui.socket;
                var token = $('.sign').data('token');
                var rykey = $('.sign').data('rykey');
                socket.config({
                    user: token,
                    pwd: rykey ,
                    layim: layim,
                });

                layim.config({
                    init: {
                        url: '/index.php?chat/user/ajaxpoplogin&action=get_user_data', data: {}
                    },
                    //获取群成员
                    members: {
                        url: '/index.php?chat/user/ajaxpoplogin&action=groupMembers', data: {}
                    }
                    //上传图片接口
                    , uploadImage: {
                        url: '/index.php?chat/user/ajaxpoplogin&action=uploadImage' //（返回的数据格式见下文）
                        , type: 'post' //默认post
                    }
                    //上传文件接口
                    , uploadFile: {
                        url: '/index.php?chat/user/ajaxpoplogin&action=uploadFile' //
                        , type: 'post' //默认post
                    }
                    //自定义皮肤
                    ,uploadSkin: {
                        url: '/index.php?chat/user/ajaxpoplogin&action=uploadSkin'
                        , type: 'post' //默认post
                    }
                    //选择系统皮肤
                    ,systemSkin: {
                        url: '/index.php?chat/user/ajaxpoplogin&action=systemSkin'
                        , type: 'post' //默认post
                    }
                    //获取推荐好友
                    ,getRecommend:{
                        url:  '/index.php?chat/user/ajaxpoplogin&action=getRecommend'
                        , type: 'get' //默认
                    }
                    //查找好友总数
                    ,findFriendTotal:{
                        url: '/index.php?chat/user/ajaxpoplogin&action=findFriendTotal'
                        , type: 'get' //默认
                    }
                    //查找好友
                    ,findFriend:{
                        url: '/index.php?chat/user/ajaxpoplogin&action=findFriend'
                        , type: 'get' //默认
                    }
                    //获取好友资料
                    ,getInformation:{
                        url: '/index.php?chat/user/ajaxpoplogin&action=getInformation'
                        , type: 'get' //默认
                    }
                    //保存我的资料
                    ,saveMyInformation:{
                        url: '/index.php?chat/user/ajaxpoplogin&action=saveMyInformation'
                        , type: 'post' //默认
                    }
                    //提交建群信息
                    ,commitGroupInfo:{
                        url: '/index.php?chat/user/ajaxpoplogin&action=commitGroupInfo'
                        , type: 'get' //默认
                    }
                    //获取系统消息
                    ,getMsgBox:{
                        url: '/index.php?chat/user/ajaxpoplogin&action=getMsgBox'
                        , type: 'get' //默认post
                    }
                    //获取总的记录数
                    ,getChatLogTotal:{

                        url: '/index.php?chat/user/ajaxpoplogin&action=getChatLogTotal'
                        , type: 'get' //默认post
                    }
                    //获取历史记录
                    ,getChatLog:{

                        url: '/index.php?chat/user/ajaxpoplogin&action=getChatLog'
                        , type: 'get' //默认post
                    }
                    , isAudio: false //开启聊天工具栏音频
                    , isVideo: false //开启聊天工具栏视频
                    , groupMembers: true
                    //扩展工具栏
                    // , tool: [{
                    //         alias: 'code'
                    //         , title: '代码'
                    //         , icon: '&#xe64e;'
                    //     }]
                    ,title: 'layim'
                    ,copyright:false
                    , initSkin: '1.jpg' //1-5 设置初始背景
                    , notice: true //是否开启桌面消息提醒，默认false
                    , systemNotice: false //是否开启系统消息提醒，默认false
                    , msgbox: '/static/chat/layui/css/modules/layim/html/msgbox.html' //消息盒子页面地址，若不开启，剔除该项即可
                    , find: '/static/chat/layui/css/modules/layim/html/find.html' //发现页面地址，若不开启，剔除该项即可
                    , chatLog: '/static/chat/layui/css/modules/layim/html/chatlog.html' //聊天记录页面地址，若不开启，剔除该项即可
                    , createGroup: '/static/chat/layui/css/modules/layim/html/createGroup.html' //创建群页面地址，若不开启，剔除该项即可
                    , Information: '/static/chat/layui/css/modules/layim/html/getInformation.html' //好友群资料页面
                });
            });
        });

    </script>
</html>
