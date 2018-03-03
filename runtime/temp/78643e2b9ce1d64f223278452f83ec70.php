<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\www\admin/app/admin\view\organization\picturetypeEdit.html";i:1519907120;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>修改图册</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="__ADMIN__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="__ADMIN__/css/style.css">
</head>

<body>
<div style="margin: 15px;" ng-app="hd" ng-controller="ctrl">
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>修改图册</legend>
    </fieldset>

    <form class="layui-form layui-form-pane">

        <div class="layui-form-item">
            <label class="layui-form-label">图册名称</label>
            <div class="layui-input-6">
                <input type="text" name="opi_title" ng-model="field.opi_title" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>图册名称" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-submit="" lay-filter="auth">立即提交</button>
                <a href="<?php echo url('picturetype'); ?>" class="layui-btn layui-btn-primary">返回</a>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="__ADMIN__/plugins/layui/layui.js"></script>
<script src="__STATIC__/js/angular.min.js"></script>
<script src="__STATIC__/js/jquery.2.1.1.min.js"></script>
<script>
    var m = angular.module('hd',[]);
    m.controller('ctrl',['$scope',function($scope){
        $scope.field = '<?php echo $picinfo; ?>'!='null'?<?php echo $picinfo; ?>:{opi_id:'',opi_title:''};
        layui.use(['form', 'layer'], function () {
            var form = layui.form(),layer = layui.layer;
            form.on('submit(auth)', function (data) {
                // 提交到方法 默认为本身
                data.field.opi_id =  $scope.field.opi_id;
                $.post("<?php echo url('picturetypeEdit'); ?>",data.field,function(res){
                    if(res.code > 0){
                        layer.msg(res.msg,{time:1800},function(){
                            location.href = res.url;
                        });
                    }else{
                        layer.msg(res.msg,{time:1800});
                    }
                });
            })
        })
    }]);
</script>
</body>

</html>