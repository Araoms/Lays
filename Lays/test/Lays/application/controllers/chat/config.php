<?php
#配置信息，一个都不能少
define("DB_HOST",'127.0.0.1');
define("DB_USER",'root');
define('DB_PWD','root');
define('DB_NAME','lays');
define('DB_PORT','3306');
define('DB_TYPE','mysql');
error_reporting(5);
define('DB_CHARSET','utf8');
define('QN_FILE','http://XXXXXXXXX.bkt.clouddn.com/');//这里是七牛云的仓库地址 用于上传文件，如果不需要可以改为本地储存
define('AK','XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');//这里是七牛云的access_key
define('SK','XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');//这里是七牛云的secret_key
const ADD_USER_MSG = 1;//为请求添加用户
const ADD_USER_SYS = 2;//为系统消息（添加好友
const ADD_GROUP_MSG = 3;//为请求加群
const ADD_GROUP_SYS = 4;//为系统消息（添加群）
const ADD_ADMIN = 6;//为添加管理
const REMOVE_ADMIN = 7;//为取消管理
const ALLUSER_SYS = 5;// 全体会员消息
const UNREAD = 1;//未读
const AGREE_BY_TO= 2;//同意
const DISAGREE_BY_TO = 3;//拒绝
const AGREE_BY_FROM = 4;//同意且返回消息已读
const DISAGREE_BY_FROM = 5;//拒绝且返回消息已读
const READ = 6;//全体消息已读
