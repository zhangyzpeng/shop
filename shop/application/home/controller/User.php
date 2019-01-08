<?php
namespace app\home\controller;

//使用短信类
use lampol\Mail;
use think\Controller;
use think\Request;
use think\Db;

//引入模型进行验证注册
use app\home\model\User as userModel;
class User extends Base
{
  /*
	//用户管理
    public function userPic(){
    	return $this->fetch('user_pic');
    }
  
    //地址管理
    public function address(){
    	return $this->fetch('address');
    }
    */
    //用户订单列表
    public function orderList(){
    	return $this->fetch('order_list');
    }
    //用户等待付款
    public function waitPay(){
    	return $this->fetch('wait_pay');
    }
    //用户退款
   public function backPay(){
   		return $this->fetch('back_pay');
   }
   //用户登录
   public function login(Request $request){
    //判断用户是否通过post登录
      if($request->isPost()){
          $code=$request->param('telcode','','trim');
          if($code!=Session('mail_code')){
            return json(['status'=>'fail','msg'=>'验证码不正确']);
               //return json(['status'=>'success','msg'=>'注册成功']);
          }

          $email=$request->param('email','','trim');
          $password=$request->param('password','','trim');

          $userModel = new userModel();
          $res = $userModel->tologin($email,$password);
          return json($res);
      }
   		return $this->fetch('login');
   }
   //用户退出
   public function logout(){
      session('user_name',null);
      $this->redirect('/user/login');
   }
   //用户注册
   public function register(Request $request){
      if($request->isPost()){
          //halt($request->param());
        //接收验证码
        $code=$request->param('telcode','','trim');
            if($code!=Session('mail_code')){
              return json(['status'=>'fail','msg'=>'验证码不正确']);
                //return json(['status'=>'success','msg'=>'注册成功']);
            }//else{
               //return json(['status'=>'fail','msg'=>'验证码不正确']);
            //}

            //接收用户上传信息
            $email=$request->param('email','','trim');
            $password=$request->param('password','','trim');

            $salt=mt_rand(100000,999999);

            $password = md5($password.$salt);

            //拼接数据
            $data=[
              'number'=>$email,
              'password'=>$password,
              'salt'=>$salt,
              'create_time'=>time()
            ];
            //实例化模型
            $userModel = new userModel();
            $res = $userModel->insertUser($data);
            if($res){
                session('email',$email);
                return json(['status'=>'success','msg'=>'注册成功']);
            }else{
              return json(['status'=>'fail','msg'=>'注册失败 ']);
            }

      }else{
        return $this->fetch('register');
      }
   }
   //实时验证用户是否注册过
   public function checkuser(Request $request){
      //dump($request->param());
        $email = $request->param('param','','trim');
        $userModel = new userModel();
        $res = $userModel->checkUser($email);
        if($res){
            //返回值用遵循validform
            return json(['status'=>'n','info'=>'此手机已经注册']);
        }else{
          return json(['status'=>'y','info'=>'此手机可以注册']);
        }
   }
   //发送邮件
   public function send_email(Request $request){
      $email=$request->param('email','','trim');
      //halt($email);
      //引入第三方类
      $config = [
          'emailName'=>'2283446980@qq.com',
          'emailPass'=>'rtmbfcaaeqetecif',
          'host'     =>'smtp.qq.com'
        ];

    $mail = new Mail($config,true); //第二个参数是开启异常默认关闭
    $captcha = mt_rand(1000,9999);
    $to=$email;
    $subject="mogujie";
    $content="Your mogujie verified as ".$captcha." do not leak";
    $res = $mail->sendMail($to,$subject,$content);//第四个参数是发送附件 可以不带此参数  
     //$res ={"status":"success","info":"发送成功"};
    //dump($res);
    //return $res;
    //判断用户是否发送信息成功
    //print_r($res);
    //echo $res['status'];
    if($res['status']=='success'){
        Session('mail_code',$captcha);
        Db::name('mobile')->insert(['mobile'=>$email,'code'=>$captcha,'create_time'=>time()]);
        return json(['status'=>'success','msg'=>'发送成功']);
    }else{
        return json(['status'=>'fail','msg'=>'发送失败']);
    }
   }
}
