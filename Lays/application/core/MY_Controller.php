<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
header ( "Access-Control-Allow-Origin: *" );
header ( "Access-Control-Allow-Headers: Content-Type" );
header('Access-Control-Allow-Methods: GET, POST, PUT,DELETE');
defined ( 'APP_SECRET' ) or define ( 'APP_SECRET', '72b4b3307249dd9782850f55a5fbee0c' ); // accesstoken加密秘钥
defined ( 'ACCESSTOKEN_EXPIRETIME' ) or define ( 'ACCESSTOKEN_EXPIRETIME', 24 ); // accesstoken过期时间 ，单位小时
defined ( 'SESSTION_EXPIRETIME' ) or define ( 'SESSTION_EXPIRETIME', 2 ); // 会话过期时间 ，单位分钟，多久时间不操作自动过期
defined ( 'CODE_EXPIRETIME' ) or define ( 'CODE_EXPIRETIME', 1 ); // 验证码过期时间 ，单位分钟，多久时间不操作自动过期
/**

* 问题接口

* @date: 2018年8月22日 下午3:08:09

* @author: 61703

*/
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class MY_Controller extends CI_Controller {
	var $whitelist;
	function __construct() {
	
		parent::__construct ();

	
		
	
	}
	
}
class APP_Controller extends MY_Controller{
	var $whitelist;
	function __construct() {
		
		parent::__construct ();
	
		
	}
	/**
	
	* 	//校验token
	//检查accesstoken是否过期
	
	* @date: 2018年8月22日 下午3:59:36
	
	* @author: 61703
	
	* @param: variable
	
	* @return:
	
	*/
	public function check_token($accesstoken) {
		if ($accesstoken) {
			
			try {
				$accesstoken = decode ( $accesstoken, APP_SECRET ); //解码accesstoken
				$user = unserialize ( $accesstoken );
			} catch ( Exception $e ) {
				$message ['code'] = 2088;
				$message ['message'] ='会话过期，重新登录1';
				echo json_encode($message);
				exit ( );
				
			}
			
			//获取用户的uid
			$uid =trim($user ['uid']);
			$username = $user ['username'];
			//$item = $this->db->query ( "SELECT * FROM " . $this->db->dbprefix . "user WHERE username='$username'" )->row_array ();
			//$uid = trim($item ['uid']);
			//先判断是否存在用户登录文件
			$userfile = FCPATH . '/data/userlogin/' . $uid . '.php';
			if (! file_exists ( $userfile )) {
				$message ['code'] = 2088;
				$message ['message'] ='会话过期，重新登录2';
				echo json_encode($message);
				exit ( );
				
			}
			$user = $this->returnuser ( $userfile );
			$user ['uid'] = $uid;
			if (($user ['expire'] - time ()) <= 0) {
				unlink ( $userfile );
				$message ['code'] = 2088;
				$message ['message'] ='会话过期，'.'重新登录3';
				echo json_encode($message);
				exit ( );
				
				
			}
			//判断两次操作时间间隔
			//				if ((time () - $user ['operationtime']) > SESSTION_EXPIRETIME * 60) {
			//
			//					echo 'error|太久没操作了，重新登录';
			//					unlink($userfile);
			//					exit ();
			//				}
			/*$user ['operationtime'] = time (); //当前操作时间
			$accesstoken = encode ( serialize ( $user ), APP_SECRET );
			$strdata = "<?php\nreturn " . var_export ( $user, true ) . ";\n?>";
			$filesave = FCPATH . 'data/userlogin/' . $user ['uid'] . '.php';
			if (file_exists ( $filesave )) {
				unlink ( $filesave );
			}
			writetofile ( $filesave, $strdata );*/
			return $user;
		} else {
			$message ['code'] = "201";
			$message ['message'] ='权限验证失败';
			echo json_encode($message);
			exit ( );
			
		}
		
	}
	public function returnuser($file) {
		return @include $file;
	}
	//检查特殊字符函数
	public function checkstring($str) {
		if (preg_match ( "/[\'<>{}]|\]|\[|\/|\\\|\"|\|/", $str )) {
			$message ['code'] = "201";
			$message ['message'] ='用户名或者密码不能包含特殊字符';
			echo json_encode($message);
			exit ( );
			
		}
		
	}
	//检查特殊字符函数
	function checkdeepstring($str) {
		if (preg_match ( "/[\',:;*?~`!#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/", $str )) {
			$message ['code'] = "201";
			$message ['message'] ='用户名或者密码不能包含特殊字符';
			echo json_encode($message);
			exit ( );
			
		}
	}
	
}