<<<<<<< HEAD
<?php
namespace app\admin\controller;
//use think\{Controller,Db,Input};//
use think\Controller;
use think\Db;
use think\Input;

class Ajax extends Common{
    public function getRegion(){
        $Region=db("region");
        $map['pid']=input("pid");
        $map['type']=input("type");
        $list=$Region->where($map)->select();
        echo json_encode($list);
    }

=======
<?php
namespace app\admin\controller;
//use think\{Controller,Db,Input};//
use think\Controller;
use think\Db;
use think\Input;

class Ajax extends Common{
    public function getRegion(){
        $Region=db("region");
        $map['pid']=input("pid");
        $map['type']=input("type");
        $list=$Region->where($map)->select();
        echo json_encode($list);
    }

>>>>>>> e0e786473fa2c4a6034924ea9b087f8098764833
}