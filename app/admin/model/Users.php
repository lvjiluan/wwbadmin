<<<<<<< HEAD
<?php
namespace app\admin\model;

use think\Model;

class Users extends Model
{
	protected $name = 'users';
	// birthday修改器
	protected function setpwdAttr($value){
			return md5($value);
	}
=======
<?php
namespace app\admin\model;

use think\Model;

class Users extends Model
{
	protected $name = 'users';
	// birthday修改器
	protected function setpwdAttr($value){
			return md5($value);
	}
>>>>>>> e0e786473fa2c4a6034924ea9b087f8098764833
}