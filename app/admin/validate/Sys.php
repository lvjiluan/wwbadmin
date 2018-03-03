<<<<<<< HEAD
<?php
namespace app\admin\validate;

use think\Validate;

class Sys extends Validate
{
	protected $rule = [
		['sys_name', 'require', '站点名称不能为空！'],
		['sys_url', 'require', '站点网址不能为空！']
	];
=======
<?php
namespace app\admin\validate;

use think\Validate;

class Sys extends Validate
{
	protected $rule = [
		['sys_name', 'require', '站点名称不能为空！'],
		['sys_url', 'require', '站点网址不能为空！']
	];
>>>>>>> e0e786473fa2c4a6034924ea9b087f8098764833
}