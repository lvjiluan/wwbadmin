<<<<<<< HEAD
<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2017 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

namespace think\config\driver;

class Ini
{
    public function parse($config)
    {
        if (is_file($config)) {
            return parse_ini_file($config, true);
        } else {
            return parse_ini_string($config, true);
        }
    }
}
=======
<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2017 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

namespace think\config\driver;

class Ini
{
    public function parse($config)
    {
        if (is_file($config)) {
            return parse_ini_file($config, true);
        } else {
            return parse_ini_string($config, true);
        }
    }
}
>>>>>>> e0e786473fa2c4a6034924ea9b087f8098764833
