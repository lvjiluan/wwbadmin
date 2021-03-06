<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/Users/lvjiluan/project/wwbadmin/app/admin/view/platform/searchrecommend.html";i:1519745724;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>热门搜索设置</title>
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
        <legend>热门搜索设置</legend>
    </fieldset>

    <form class="layui-form layui-form-pane">
        <?php if(is_array($hotlistarr) || $hotlistarr instanceof \think\Collection || $hotlistarr instanceof \think\Paginator): $k = 0; $__LIST__ = $hotlistarr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
        <div class="layui-form-item">
            <label class="layui-form-label">推荐词<?php echo $k; ?></label>
            <div class="layui-input-4">
                <input type="text" name="sho_content[<?php echo $k; ?>]" value="<?php echo $v['sho_content']; ?>" placeholder="<?php echo lang('pleaseEnter'); ?>推荐词" class="layui-input">
            </div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-submit="" lay-filter="auth">立即提交</button>
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
        layui.use(['form', 'layer'], function () {
            var form = layui.form(),layer = layui.layer;
            form.on('submit(auth)', function (data) {
                // 提交到方法 默认为本身
                $.post("<?php echo url('searchrecommend'); ?>",data.field,function(res){
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