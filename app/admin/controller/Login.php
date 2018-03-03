<<<<<<< HEAD
<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Admin;
class Login extends Controller
{
    private $cache_model;
    public function index(){
        if(request()->isPost()) {
            $admin = new Admin();
            $data = input('post.');
            $num = $admin->login($data);
            if($num == 1){
                return json(['code' => 1, 'msg' => '登录成功!', 'url' => url('index/index')]);
            } elseif($num == 2){
                return json(array('code' => 0, 'msg' => '您的机构账号存在异常，请联系管理员!'));
            }else {
                return json(array('code' => 0, 'msg' => '用户名或者密码错误，重新输入!'));
            }
        }
        $this->cache_model=array('Auth_rule','System_basic');
        if(empty($this->Sys)){
            foreach($this->cache_model as $r){
                savecache($r);
            }
        }
        return $this->fetch('login');
    }
    //退出登陆
    public function logout(){
        session(null);
        $this->redirect('login/index');
    }
=======
<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Admin;
class Login extends Controller
{
    private $cache_model;
    public function index(){
        if(request()->isPost()) {
            $admin = new Admin();
            $data = input('post.');
            $num = $admin->login($data);
            if($num == 1){
                return json(['code' => 1, 'msg' => '登录成功!', 'url' => url('index/index')]);
            }else {
                return json(array('code' => 0, 'msg' => '用户名或者密码错误，重新输入!'));
            }
        }
        $this->cache_model=array('Auth_rule','System_basic');
        if(empty($this->Sys)){
            foreach($this->cache_model as $r){
                savecache($r);
            }
        }
        return $this->fetch('login');
    }
    //退出登陆
    public function logout(){
        session(null);
        $this->redirect('login/index');
    }
>>>>>>> e0e786473fa2c4a6034924ea9b087f8098764833
}