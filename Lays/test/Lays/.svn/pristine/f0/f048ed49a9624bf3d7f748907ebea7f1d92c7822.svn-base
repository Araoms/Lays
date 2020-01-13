<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Api_user extends CI_Controller {
    var $apikey = '';
    var $whitelist;
    // 构造函数
    function __construct() {
        $this->whitelist = "bindloginapi";
        parent::__construct ();
        $this->load->model ( 'user_model' );
    }
    // -----------------------------------用户注册录接口函数
    function bindregisterapi() {
        $sitename = $this->setting ['site_name'];
        $useragent = $_SERVER ['HTTP_USER_AGENT'];
        if (! strstr ( $useragent, 'MicroMessenger' )) {
            exit ( "只能微信里绑定哟，您就别费劲想耍花招了" );
        }
        if (! $this->setting ['allow_register']) {
            exit ( "系统注册功能暂时处于关闭状态!" );
        }
        $openid = trim ( $this->input->post ( 'openid' ) ); // openid
        $username = strip_tags ( trim ( $this->input->post ( 'uname' ) ) ); // 用户注册名字，strip_tags第一层过滤
        $password = trim ( $this->input->post ( 'upwd' ) ); // 用户注册密码
        $repassword = trim ( $this->input->post ( 'rupwd' ) ); // 用户注册密码
        $this->checkdeepstring ( $username );
        $usernamecensor = $this->user_model->check_usernamecensor ( $username );
        if (FALSE == $usernamecensor)
            exit ( '用户包含敏感词' );
        $this->checkstring ( $password );
        $this->checkstring ( $repassword );
        $email = $this->input->post ( 'email' ); // 用户邮箱

        $emailaccess = $this->user_model->check_emailaccess ( $email );
        if (FALSE == $emailaccess) {
            exit ( "邮件地址被禁止注册" );
        }

        $groupid = 7; // 角色ID
        if ($repassword != $password) {
            exit ( "两次输入密码不一样" ); // 用户密码不能为空
        }
        if ('' == $username || '' == $password) {
            exit ( "reguser_cant_null" ); // 用户密码不能为空
        } else if (! preg_match ( "/^[a-z'0-9]+([._-][a-z'0-9]+)*@([a-z0-9]+([._-][a-z0-9]+))+$/", $email )) {
            exit ( "regemail_Illegal" ); // 注册邮箱不合法
        } else if ($this->db->from ( 'user' )->where ( array (
            'email' => $email
        ) )->count_all_results ()) {
            exit ( "regemail_has_exits" ); // 注册邮箱已经存在
        } else if (! $this->user_model->check_usernamecensor ( $username )) {
            exit ( "regemail_cant_use" ); // 注册邮箱不能使用
        }

        $user = $this->user_model->get_by_username ( $username );
        $user && exit ( "reguser_has_exits" ); // 注册用户已经存在

        // ucenter注册。
        if ($this->setting ["ucenter_open"]) {
            $this->load->model ( 'ucenter_model' );
            $msg = $this->ucenter_model->ajaxregister ( $username, $password, $email );
            if ($msg == 'ok') {
                // $uid = $_ENV['user']->adduserapi($username, $password, $email,$groupid);//插入model/user.class.php里adduserapi函数里
                $user = $this->user_model->get_by_username ( $username );
                $uid = $user ['uid'];
                $this->user_model->refresh ( $uid );

                $_opentmp_user = $this->user_model->get_by_openid ( $openid );

                if (! $_opentmp_user) {
                    $this->db->query ( "UPDATE " . $this->db->dbprefix . "user SET  `openid`='$openid' WHERE `uid`=$uid" );
                }

                $this->credit ( $uid, $this->setting ['credit1_register'], $this->setting ['credit2_register'] ); // 注册增加积分

                if (isset ( $this->setting ['register_on'] ) && $this->setting ['register_on'] == '1') {

                    $activecode = md5 ( rand ( 10000, 50000 ) );
                    $url = SITE_URL . 'index.php?user/checkemail/' . $uid . '/' . $activecode;
                    $message = "这是一封来自【" . $sitename . "】邮箱验证，<a target='_blank' href='$url'>请点击此处验证邮箱邮箱账号</a>";
                    $v = md5 ( "yanzhengask2email" );
                    $v1 = md5 ( "yanzhengask2time" );
                    setcookie ( "emailsend" );
                    setcookie ( "useremailcheck" );
                    $expire1 = time () + 60; // 设置1分钟的有效期
                    setcookie ( "emailsend", $v1, $expire1 ); // 设置一个名字为var_name的cookie，并制定了有效期
                    $expire = time () + 86400; // 设置24小时的有效期
                    setcookie ( "useremailcheck", $v, $expire ); // 设置一个名字为var_name的cookie，并制定了有效期
                    $this->user_model->update_emailandactive ( $email, $activecode, $uid );
                    $this->user_model->refresh ( $this->user ['uid'], 1 );
                    sendmailto ( $email, "邮箱验证提醒-$sitename", $message, $this->user ['username'] );
                }
                // $this->credit($this->user['uid'], $this->setting['credit1_register'], $this->setting['credit2_register']); //注册增加积分user

                if (isset ( $this->setting ['register_on'] ) && $this->setting ['register_on'] == '1') {
                    exit ( "reguser_ok1" );

                    // exit("注册成功，系统已发送注册邮件，24小时之内请进行邮箱验证，在您没激活邮件之前你不能发布问题和文章等操作！");//注册成功
                } else {
                    exit ( "reguser_ok" );
                }
            } else {
                exit ( $msg );
            }
        }

        $uid = $this->user_model->adduserapi ( $username, $password, $email, $groupid ); // 插入model/user.class.php里adduserapi函数里
        $this->user_model->refresh ( $uid );

        $_opentmp_user = $this->user_model->get_by_openid ( $openid );

        if (! $_opentmp_user) {
            $this->db->query ( "UPDATE " . $this->db->dbprefix . "user SET  `openid`='$openid' WHERE `uid`=$uid" );
        }

        $sitename = $this->setting ['site_name'];

        $this->credit ( $uid, $this->setting ['credit1_register'], $this->setting ['credit2_register'] ); // 注册增加积分

        if (isset ( $this->setting ['register_on'] ) && $this->setting ['register_on'] == '1') {

            $activecode = md5 ( rand ( 10000, 50000 ) );
            $url = SITE_URL . 'index.php?user/checkemail/' . $uid . '/' . $activecode;
            $message = "这是一封来自【" . $sitename . "】邮箱验证，<a target='_blank' href='$url'>请点击此处验证邮箱邮箱账号</a>";
            $v = md5 ( "yanzhengask2email" );
            $v1 = md5 ( "yanzhengask2time" );
            setcookie ( "emailsend" );
            setcookie ( "useremailcheck" );
            $expire1 = time () + 60; // 设置1分钟的有效期
            setcookie ( "emailsend", $v1, $expire1 ); // 设置一个名字为var_name的cookie，并制定了有效期
            $expire = time () + 86400; // 设置24小时的有效期
            setcookie ( "useremailcheck", $v, $expire ); // 设置一个名字为var_name的cookie，并制定了有效期
            $this->user_model->update_emailandactive ( $email, $activecode, $uid );
            $this->user_model->refresh ( $this->user ['uid'], 1 );
            sendmailto ( $email, "邮箱验证提醒-$sitename", $message, $this->user ['username'] );
        }
        // $this->credit($this->user['uid'], $this->setting['credit1_register'], $this->setting['credit2_register']); //注册增加积分

        if (isset ( $this->setting ['register_on'] ) && $this->setting ['register_on'] == '1') {
            exit ( "reguser_ok1" );

            // exit("注册成功，系统已发送注册邮件，24小时之内请进行邮箱验证，在您没激活邮件之前你不能发布问题和文章等操作！");//注册成功
        } else {
            exit ( "reguser_ok" );
        }
    }
    // -----------------------------------用户注册录接口函数
    // 注册新用户时 增加聊天账号 Lays 账号、
    function registerapi() {
        $sitename = $this->setting ['site_name'];
        $this->check_registerapikey (); // 判断是否为正确的http请求

        $username = strip_tags ( trim ( $this->input->post ( 'uname' ) ) ); // 用户注册名字，strip_tags第一层过滤
        $password = trim ( $this->input->post ( 'upwd' ) ); // 用户注册密码
        $phone = trim ( $this->input->post ( 'phone' ) ); // 用户注册密码
        $repassword = trim ( $this->input->post ( 'rupwd' ) ); // 用户注册密码
        $frominvatecode = trim ( $this->input->post ( 'frominvatecode' ) ) ; // 用户邀请码

        $this->checkdeepstring ( $username );
        if (! $this->setting ['allow_register']) {
            exit ( "系统注册功能暂时处于关闭状态!" );
        }
        if (isset ( $this->setting ['max_register_num'] ) && $this->setting ['max_register_num'] && ! $this->user_model->is_allowed_register ()) {
            exit ( "您的当前的IP已经超过当日最大注册数目，如有疑问请联系管理员!" );
        }
        if(!$this->setting['needinvatereg']){
            if (trim ( $this->input->post ( 'seccode_verify' ) ) == '') {
                exit ( '验证码不能为空' );
            }
            if (strtolower ( trim ( $this->input->post ( 'seccode_verify' ) ) ) != $this->user_model->get_code ()) {
                exit ( '验证码错误' );
            }



        }
        if($this->setting['needinvatereg']==1){
            if($frominvatecode){
                if(!is_numeric($frominvatecode)){
                    exit ( '邀请码不正确' );
                }
            }
        }


        //判断邀请码是否为真
        if($frominvatecode){
            $tempinvateuser = $this->user_model->get_by_invatecode ( $frominvatecode );
            if(!$tempinvateuser){
                exit ( '邀请码不存在' );
            }
        }else{
            $frominvatecode='';
        }

        $usernamecensor = $this->user_model->check_usernamecensor ( $username );

        if (isset ( $this->setting ['smscanuse'] ) && $this->setting ['smscanuse'] == 1) {

            if (! preg_match ( "/^1[34578]{1}\d{9}$/", $phone )) {

                exit ( "手机号码不正确" );
            }
        }

        if (FALSE == $usernamecensor)
            exit ( '用户包含敏感词' );
        $this->checkstring ( $password );
        $this->checkstring ( $repassword );
        $email = $this->input->post ( 'email' ); // 用户邮箱

        $emailaccess = $this->user_model->check_emailaccess ( $email );
        if (FALSE == $emailaccess) {
            exit ( "邮件地址被禁止注册" );
        }

        $groupid = 7; // 角色ID
        if(!$this->setting['needinvatereg']){
            if ($repassword != $password) {
                exit ( "两次输入密码不一样" ); // 用户密码不能为空
            }
        }

        if ('' == $username || '' == $password) {
            exit ( "reguser_cant_null" ); // 用户密码不能为空
        } else if (! preg_match ( "/^[a-z'0-9]+([._-][a-z'0-9]+)*@([a-z0-9]+([._-][a-z0-9]+))+$/", $email )) {
            exit ( "regemail_Illegal" ); // 注册邮箱不合法
        } else if ($this->db->from ( 'user' )->where ( array (
            'email' => $email
        ) )->count_all_results ()) {
            exit ( "regemail_has_exits" ); // 注册邮箱已经存在
        } else if (! $this->user_model->check_usernamecensor ( $username )) {
            exit ( "regemail_cant_use" ); // 注册邮箱不能使用
        }

        $user = $this->user_model->get_by_username ( $username );
        $user && exit ( "reguser_has_exits" ); // 注册用户已经存在

        // ucenter注册。
        if ($this->setting ["ucenter_open"]) {
            $this->load->model ( 'ucenter_model' );
            $msg = $this->ucenter_model->ajaxregister ( $username, $password, $email );
            if ($msg == 'ok') {
                // $uid = $_ENV['user']->adduserapi($username, $password, $email,$groupid);//插入model/user.class.php里adduserapi函数里
                $user = $this->user_model->get_by_username ( $username );
                $uid = $user ['uid'];

                // 判断是否有第三方登录
                if ($_SESSION ['authinfo'] != null) {
                    $this->bindthird ( $uid, $_SESSION ['authinfo'] );
                }
                $this->user_model->refresh ( $uid );
                $sitename = $this->setting ['site_name'];
                $this->load->model ( "doing_model" );
                $this->doing_model->add ( $uid, $username, 12, $uid, "欢迎您注册了$sitename" );
                $this->credit ( $uid, $this->setting ['credit1_register'], $this->setting ['credit2_register'] ); // 注册增加积分

                if (isset ( $this->setting ['register_on'] ) && $this->setting ['register_on'] == '1') {

                    $activecode = md5 ( rand ( 10000, 50000 ) );
                    $url = SITE_URL . 'index.php?user/checkemail/' . $uid . '/' . $activecode;
                    $message = "这是一封来自【" . $sitename . "】邮箱验证，<a target='_blank' href='$url'>请点击此处验证邮箱邮箱账号</a>";
                    $v = md5 ( "yanzhengask2email" );
                    $v1 = md5 ( "yanzhengask2time" );
                    setcookie ( "emailsend" );
                    setcookie ( "useremailcheck" );
                    $expire1 = time () + 60; // 设置1分钟的有效期
                    setcookie ( "emailsend", $v1, $expire1 ); // 设置一个名字为var_name的cookie，并制定了有效期
                    $expire = time () + 86400; // 设置24小时的有效期
                    setcookie ( "useremailcheck", $v, $expire ); // 设置一个名字为var_name的cookie，并制定了有效期
                    $this->user_model->update_emailandactive ( $email, $activecode, $uid );
                    $this->user_model->refresh ( $uid, 1 );
                    sendmailto ( $email, "邮箱验证提醒-$sitename", $message, $this->user ['username'] );
                }
                // $this->credit($this->user['uid'], $this->setting['credit1_register'], $this->setting['credit2_register']); //注册增加积分

                if ($frominvatecode != 0) {
                    $this->user_model->updateinvatecode ( $uid, $frominvatecode );
                }
                if (isset ( $this->setting ['register_on'] ) && $this->setting ['register_on'] == '1') {

                    exit ( "reguser_ok1" );

                    // exit("注册成功，系统已发送注册邮件，24小时之内请进行邮箱验证，在您没激活邮件之前你不能发布问题和文章等操作！");//注册成功
                } else {
                    exit ( "reguser_ok" );
                }
            } else {
                exit ( $msg );
            }
        }
        $uid = 0;
        if (isset ( $this->setting ['smscanuse'] ) && $this->setting ['smscanuse'] == 1) {
            $userone = $this->user_model->get_by_phone ( $phone );
            if ($userone != null) {
                exit ( "手机号已存在!" );
            }
        }

        if (isset ( $this->setting ['smscanuse'] ) && $this->setting ['smscanuse'] == 1) {

            $uid = $this->user_model->adduserapi ( $username, $password, $email, $groupid, 0, $phone); // 插入model/user.class.php里adduserapi函数里
        } else {

            $memberIdx =  $this->AddChat(array('memberName'=>$username,'emailAddress'=>$email));
            if(!$memberIdx){
                exit ( "Lays 账号创建失败!" );
            }
            $uid = $this->user_model->adduserapi ( $username, $password, $email, $groupid,0,0, $memberIdx);
        }

        if ($frominvatecode != 0) {
            $this->user_model->updateinvatecode ( $uid, $frominvatecode );
        }
        // 判断是否有第三方登录
        if ($_SESSION ['authinfo'] != null) {
            $this->bindthird ( $uid, $_SESSION ['authinfo'] );
        }
        $this->user_model->refresh ( $uid );
        $sitename = $this->setting ['site_name'];

        $this->load->model ( "doing_model" );
        $this->doing_model->add ( $uid, $username, 12, $uid, "欢迎您注册了$sitename" );
        $this->credit ( $uid, $this->setting ['credit1_register'], $this->setting ['credit2_register'] ); // 注册增加积分

        if (isset ( $this->setting ['register_on'] ) && $this->setting ['register_on'] == '1') {

            $activecode = md5 ( rand ( 10000, 50000 ) );
            $url = SITE_URL . 'index.php?user/checkemail/' . $uid . '/' . $activecode;
            $message = "这是一封来自【" . $sitename . "】邮箱验证，<a target='_blank' href='$url'>请点击此处验证邮箱邮箱账号</a>";
            $v = md5 ( "yanzhengask2email" );
            $v1 = md5 ( "yanzhengask2time" );
            setcookie ( "emailsend" );
            setcookie ( "useremailcheck" );
            $expire1 = time () + 60; // 设置1分钟的有效期
            setcookie ( "emailsend", $v1, $expire1 ); // 设置一个名字为var_name的cookie，并制定了有效期
            $expire = time () + 86400; // 设置24小时的有效期
            setcookie ( "useremailcheck", $v, $expire ); // 设置一个名字为var_name的cookie，并制定了有效期
            $this->user_model->update_emailandactive ( $email, $activecode, $uid );
            $this->user_model->refresh ( $this->user ['uid'], 1 );
            sendmailto ( $email, "邮箱验证提醒-$sitename", $message, $this->user ['username'] );
        }
        if (isset ( $this->setting ['register_on'] ) && $this->setting ['register_on'] == '1') {
            exit ( "reguser_ok1" );

            // exit("注册成功，系统已发送注册邮件，24小时之内请进行邮箱验证，在您没激活邮件之前你不能发布问题和文章等操作！");//注册成功
        } else {
            exit ( "reguser_ok" );
        }
    }
    // 检查http请求的主机和请求的来路域名是否相同，不相同拒绝请求
    function check_loginapikey() {
        if (! isset ( $_SESSION )) {
            session_start ();
        }
//        if ($_SESSION ["logintokenid"] == null || $this->input->post ( 'apikey' ) == null) {
//            echo '非法操作.';
//            exit ();
//        }
        if ($_SESSION ["logintokenid"] != $this->input->post ( 'apikey' )) {
            echo '页面过期，请保存数据刷新页面在操作!';
            exit ();
        }
    }
    // 检查http请求的主机和请求的来路域名是否相同，不相同拒绝请求
    function check_registerapikey() {
        if (! isset ( $_SESSION )) {
            session_start ();
        }
//        if ($_SESSION ["registrtokenid"] == null || $this->input->post ( 'apikey' ) == null) {
//            echo '非法操作.';
//            exit ();
//        }
//        if ($_SESSION ["registrtokenid"] != $this->input->post ( 'apikey' )) {
//            echo '页面过期，请保存数据刷新页面在操作!';
//            exit ();
//        }
    }
    // ---------------------------用户登录接口函数
    /*
     *
     *
     * uname:用户名
     *
     * upwd:用户密码
     */
    function loginapi() {
        $this->check_loginapikey (); // 判断是否为正确的http请求
        $username = trim ( $this->input->post ( 'uname' ) ); // 用户名

        $password = md5 ( trim ( $this->input->post ( 'upwd' ) ) ); // 用户密码
        $registrationid = trim ( $this->input->post ( 'registrationid' ) ); // registrationid

        $this->checkdeepstring ( $username );

        $this->checkstring ( $password );
        if ('' == $username || '' == $password) {
            exit ( 'login_null' ); // 登录参数为空
        }

        // ucenter登陆。
        if ($this->setting ["ucenter_open"]) {
            $this->load->model ( 'ucenter_model' );
            $msg = $this->ucenter_model->ajaxlogin ( $username, $this->input->post ( 'upwd' ) );
            if ($msg == 'ok') {

                $cookietime = 2592000;
                $user = $this->user_model->get_by_username ( $username );
                $openid=$_SESSION ['authinfo']['uid'];
// 				if($user['wechatopenid']!=''&&$user['wechatopenid']!=$openid){
// 					exit ( '该账号已绑定其它微信，请先解绑!' );
// 				}
                $this->user_model->refresh ( $user ['uid'], 1, $cookietime );
                if ($user ['isblack'] == 1) {
                    exit ( '用户被列入网站黑名单!' ); // 登录参数为空
                }
                // 判断是否有第三方登录
                if ($_SESSION ['authinfo'] != null) {
                    $this->bindthird ( $user ['uid'], $_SESSION ['authinfo'] );
                }

                $this->credit ( $user ['uid'], $this->setting ['credit1_login'], $this->setting ['credit2_login'] ); // 登录增加积分
                // 如果$registrationid不为空就绑定
                if ($registrationid) {
                    $uid = $user ['uid'];
                    $this->db->query ( "UPDATE " . $this->db->dbprefix . "user SET  `registrationid`='$registrationid' WHERE `uid`=$uid" );
                    // runlog("regid","UPDATE " . $this->db->dbprefix . "user SET `registrationid`='$registrationid' WHERE `uid`=$uid");
                    require FCPATH . '/lib/jpush/config.php';
                    try {
                        // 更新 Alias
                        $result = $client->device ()->getDevices ( $registrationid );
                        // $client->device()->deleteAlias("$uid");
                        $client->device ()->updateAlias ( $registrationid, $uid );
                        // $client->device()->removeTags($registrationid, '$uid');
                        // $client->device()->addTags($registrationid, $uid);
                    } catch ( \JPush\Exceptions\APIConnectionException $e ) {
                        // try something here
                        // print $e;
                    } catch ( \JPush\Exceptions\APIRequestException $e ) {
                        // try something here
                        // print $e;
                    }
                }
                exit ( 'login_ok' ); // 登录成功
            } else {
                exit ( $msg );
            }
        }

        $user = $this->user_model->get_by_username ( $username );
        if (! $user) {

            exit ( '用户名或者密码错误' ); // 用户名或者密码错误
        }
        $cookietime = 7200;
        if (is_array ( $user ) && ($password == $user ['password'])) {
            if ($user ['isblack'] == 1) {
                exit ( '用户被列入网站黑名单!' ); // 登录参数为空
            }
            $openid=$_SESSION ['authinfo']['uid'];
// 			if($user['wechatopenid']!=''&&$user['wechatopenid']!=$openid){
// 				exit ( '该账号已绑定其它微信，请先解绑!' );
// 			}

            // 判断是否有第三方登录
            if ($_SESSION ['authinfo'] != null) {
                $this->bindthird ( $user ['uid'], $_SESSION ['authinfo'] );
            }

            $this->user_model->refresh ( $user ['uid'], 1, $cookietime );
            $this->credit ( $user ['uid'], $this->setting ['credit1_login'], $this->setting ['credit2_login'] ); // 登录增加积分
            // 如果$registrationid不为空就绑定
            if ($registrationid) {
                $uid = $user ['uid'];
                $this->db->query ( "UPDATE " . $this->db->dbprefix . "user SET  `registrationid`='$registrationid' WHERE `uid`=$uid" );
                require FCPATH . '/lib/jpush/config.php';
                try {
                    // 更新 Alias
                    $result = $client->device ()->getDevices ( $registrationid );
                    // $client->device()->deleteAlias("$uid");
                    $client->device ()->updateAlias ( $registrationid, $uid );
                    // $client->device()->removeTags($registrationid, '$uid');
                    // $client->device()->addTags($registrationid, $uid);
                } catch ( \JPush\Exceptions\APIConnectionException $e ) {
                    // try something here
                    // print $e;
                } catch ( \JPush\Exceptions\APIRequestException $e ) {
                    // try something here
                    // print $e;
                }
            }
            exit ( 'login_ok' ); // 登录成功
        } else {
            exit ( '用户名或者密码错误' ); // 用户名或者密码错误
        }
    }
    // 添加第三方绑定,新浪微博，qq
    function bindthird($uid, $auth) {
        $time = time ();
        $openid = $auth ['uid'];
        $token = $auth ['access_token'];
        $type = $auth ['type'];
        if ($type != 'weixin') {
            $this->db->query ( "INSERT INTO " . $this->db->dbprefix . "login_auth(uid,type,token,openid,time) values ($uid,'$type','$token','$openid',$time)" );
        } else {
            $_opentmp_user = $this->user_model->get_by_wechatopenid ( $openid );

            if ( $_opentmp_user) {
                exit ( '此微信已授权其它账号！' ); // 用户名或者密码错误
            }

            $this->db->query ( "UPDATE " . $this->db->dbprefix . "user SET  `wechatopenid`='$openid' WHERE `uid`=$uid" );
        }

        session_start ();
        $_SESSION ['authinfo'] = null;
        unset ( $_SESSION ['authinfo'] );
    }
    // ---------------------------绑定微信登录接口函数
    /*
     *
     *
     * uname:用户名
     *
     * upwd:用户密码
     */
    function bindloginapi() {
        $useragent = $_SERVER ['HTTP_USER_AGENT'];
        if (! strstr ( $useragent, 'MicroMessenger' )) {
            exit ( "只能微信里绑定哟，您就别费劲想耍花招了" );
        }
        $openid = trim ( $this->input->post ( 'openid' ) ); // openid
        $username = trim ( $this->input->post ( 'uname' ) ); // 用户名
        $registrationid = trim ( $this->input->post ( 'registrationid' ) ); // registrationid
        // 判断是否包含特殊字符

        $password = md5 ( trim ( $this->input->post ( 'upwd' ) ) ); // 用户密码

        $this->checkdeepstring ( $username );

        $this->checkstring ( $password );
        if ('' == $username || '' == $password) {
            exit ( 'login_null' ); // 登录参数为空
        }

        // ucenter登录
        if ($this->setting ["ucenter_open"]) {
            $this->load->model ( 'ucenter_model' );
            $msg = $this->ucenter_model->ajaxlogin ( $username, $password );
            if ($msg == 'ok') {
                $user = $this->user_model->get_by_username ( $username );
                $cookietime = 2592000;

                $this->user_model->refresh ( $user ['uid'], 1, $cookietime );
                $this->credit ( $user ['uid'], $this->setting ['credit1_login'], $this->setting ['credit2_login'] ); // 登录增加积分
                $uid = $user ['uid'];

                $_opentmp_user = $this->user_model->get_by_openid ( $openid );

                if (! $_opentmp_user) {
                    $this->db->query ( "UPDATE " . $this->db->dbprefix . "user SET  `openid`='$openid' WHERE `uid`=$uid" );
                }

                // 如果$registrationid不为空就绑定
                if ($registrationid) {
                    $this->db->query ( "UPDATE " . $this->db->dbprefix . "user SET  `registrationid`='$registrationid' WHERE `uid`=$uid" );
                }
                exit ( 'login_ok' ); // 登录成功
            } else {
                exit ( $msg );
            }
        }

        $user = $this->user_model->get_by_username ( $username );
        $cookietime = 2592000;
        if (is_array ( $user ) && ($password == $user ['password'])) {
            if ($user ['isblack'] == 1) {
                exit ( '用户被列入网站黑名单!' ); // 登录参数为空
            }
            $uid = $user ['uid'];

            $this->user_model->refresh ( $uid, 1, $cookietime );
            $this->credit ( $user ['uid'], $this->setting ['credit1_login'], $this->setting ['credit2_login'] ); // 登录增加积分

            $_opentmp_user = $this->user_model->get_by_openid ( $openid );

            if (! $_opentmp_user) {
                $this->db->query ( "UPDATE " . $this->db->dbprefix . "user SET  `openid`='$openid' WHERE `uid`=$uid" );
            }

            // 如果$registrationid不为空就绑定
            if ($registrationid) {
                $this->db->query ( "UPDATE " . $this->db->dbprefix . "user SET  `registrationid`='$registrationid' WHERE `uid`=$uid" );
            }
            exit ( 'login_ok' ); // 登录成功
        }
        exit ( 'login_user_or_pwd_error' ); // 用户名或者密码错误
    }
    // ---------------------------------登录退出接口函数
    function loginoutapi() {
        if (! isset ( $_SESSION )) {
            session_start ();
        }

        session_destroy (); // 清空以创建的所有SESSION
        $this->user_model->logout ();
        exit ( 'loginout_ok' ); // 退出成功
    }
    // --------------------------修改密码接口
    function editpwdapi() {
        global $user;
        $this->check_registerapikey (); // 判断是否为正确的http请求
        $uid = $user ['uid']; // 用户名
        // 判断是否包含特殊字符

        if ($uid == 0) {
            exit ( "请先登录" );
        }
        $newpwd = trim ( $this->input->post ( 'newpwd' ) ); // 用户密码
        $this->user_model->uppass ( $uid, trim ( $newpwd ) );
        exit ( 'editpwd_ok' );
    }
    // 检查特殊字符函数
    function checkstring($str) {
        if (preg_match ( "/[\'<>{}]|\]|\[|\/|\\\|\"|\|/", $str )) {
            exit ( '用户名或者密码不能包含特殊字符' ); // 参数不合法
        }
    }
    // 检查特殊字符函数
    function checkdeepstring($str) {
        if (preg_match ( "/[\',:;*?~`!#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/", $str )) {
            exit ( '用户名或者密码不能包含特殊字符' ); // 参数不合法
        }
    }

    //创建 Lays 聊天账号、
    function AddChat($data=[]){

        //聊天账号四位数起、不重复、顺序排列、
        $memberIdx  = 1000;
        $tb_person = $this->db->query ( 'SELECT memberIdx FROM tb_person ORDER BY memberIdx DESC LIMIT 1' )->row_array () ;
        if($tb_person){
            $memberIdx = intval($tb_person['memberIdx']) + 1;
        }
     $sql =  "INSERT INTO tb_person (memberIdx,memberName,birthday,memberSex,
            memberStatus,signature,emailAddress,
            phoneNumber,memberPWD,userToken) values
        ($memberIdx,'{$data['memberName']}','','3',0,
                            '设置签名让别人了解你','{$data['emailAddress']}','','c286dc5c0b2f4707d9ba5c7ea8a021d7','egsudUhV\$oJP')";
        $this->db->query ($sql);

       //分组
        $sql_my_group =  "INSERT INTO tb_my_group (mygroupIdx,memberIdx,mygroupName,weight) values
        ('',{$memberIdx},'我的Lays好友、','1'),('',{$memberIdx},'我的同事、','2'),('',{$memberIdx},'陌生人、','3')";
        $this->db->query ($sql_my_group);

       //自定义皮肤
        $sql_skin =  "INSERT INTO tb_skin (skinIdx,memberIdx,url,isUserUpload) values
        ('',{$memberIdx},'2.jpg','1')";
        $this->db->query ($sql_skin);

        return $memberIdx;
    }

}

?>