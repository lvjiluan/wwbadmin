<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"/Users/lvjiluan/project/wwbadmin/app/admin/view/content/slideEdit.html";i:1519745674;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>表单</title>
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
        <legend>编辑轮播图信息</legend>
    </fieldset>

    <form class="layui-form layui-form-pane">
        <div class="layui-form-item">
            <label class="layui-form-label">描述</label>
            <div class="layui-input-4">
                <input type="text" name="car_title" ng-model="field.car_title"  lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>轮播图描述" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">轮播图</label>
            <div class="layui-input-block">
                <div class="site-demo-upload">
                    <img id="cltThumb" style="cursor: pointer;" title="点击上传图片" src="__ADMIN__/images/tong.png">
                    <div class="site-demo-upbar">
                        <input name="url" type="hidden" id="thumbval"/>
                        <input type="file" style="display: none" onchange="imgChange(event)" name="thumb" lay-type="images" class="layui-upload-file" id="thumb">
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">跳转链接</label>
            <div class="layui-input-4">
                <input type="text" name="car_url" ng-model="field.car_url"  lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>轮播图跳转链接" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-submit="" lay-filter="auth">立即提交</button>
                <a href="<?php echo url('slide'); ?>" class="layui-btn layui-btn-primary">返回</a>
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
        $scope.field = '<?php echo $slideinfo; ?>'!='null'?<?php echo $slideinfo; ?>:{car_id:'',car_title:'',car_picurl:'',car_url:''};
        if($scope.field.car_picurl){
            cltThumb.src = $scope.field.car_picurl;
        }
        layui.use(['form', 'layer'], function () {
            var form = layui.form(),layer = layui.layer;
            form.on('submit(auth)', function (data) {
                // 提交到方法 默认为本身
                data.field.car_id =  $scope.field.car_id;
                $.post("<?php echo url('slideEdit'); ?>",data.field,function(res){
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
    function imgChange(e) {
        console.info(e.target.files[0]);//图片文件
        var dom = $("input[id^='thumb']")[0];
        console.info(dom.value);//这个是文件的路径 C:\fakepath\icon (5).png
        console.log(e.target.value);//这个也是文件的路径和上面的dom.value是一样的
        var reader = new FileReader();
        reader.onload = (function (file) {
            return function (e) {
                $("#cltThumb")[0].src = this.result;
                $("#thumbval").val(this.result);
            };
        })(e.target.files[0]);
        reader.readAsDataURL(e.target.files[0]);
    }
    $(function() {
        $("#cltThumb").click(function(){
            $("#thumb").trigger("click");//模拟执行id=thumb的事件
        })
    })
</script>
</body>

</html>