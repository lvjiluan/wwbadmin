<<<<<<< HEAD
<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2015 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: yunwuxin <448901948@qq.com>
// +----------------------------------------------------------------------

namespace think\console\output\driver;

use think\console\Output;

class Nothing
{

    public function __construct(Output $output)
    {
        // do nothing
    }

    public function write($messages, $newline = false, $options = Output::OUTPUT_NORMAL)
    {
        // do nothing
    }

    public function renderException(\Exception $e)
    {
        // do nothing
    }
}
=======
<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2015 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: yunwuxin <448901948@qq.com>
// +----------------------------------------------------------------------

namespace think\console\output\driver;

use think\console\Output;

class Nothing
{

    public function __construct(Output $output)
    {
        // do nothing
    }

    public function write($messages, $newline = false, $options = Output::OUTPUT_NORMAL)
    {
        // do nothing
    }

    public function renderException(\Exception $e)
    {
        // do nothing
    }
}
>>>>>>> e0e786473fa2c4a6034924ea9b087f8098764833
