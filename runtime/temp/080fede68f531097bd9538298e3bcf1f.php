<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"/Users/lvjiluan/project/wwbadmin/app/admin/view/userinfo/basicEdit.html";i:1519745727;}*/ ?>
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
        <legend>编辑用户信息</legend>
    </fieldset>

    <form class="layui-form layui-form-pane">
        <div class="layui-form-item">
            <label class="layui-form-label">昵称</label>
            <div class="layui-input-4">
                <input type="text" name="use_nickname" ng-model="field.use_nickname"  lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>昵称" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">手机号</label>
            <div class="layui-input-4">
                <input type="text" name="use_phone" ng-model="field.use_phone"  lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>手机号" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">头像</label>
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
            <label class="layui-form-label">所属机构</label>
            <div class="layui-input-4">
                <select name="use_orgid" lay-verify="required" ng-model="field.use_orgid" ng-options="v.org_id as v.org_name for v in orginfo" >
                    <option value="">请选择所属机构</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">性别</label>
            <div class="layui-input-block">
                <input type="radio" name="use_sex"  ng-model="field.use_sex" ng-checked="field.use_sex=='男'" ng-value="1" title="男">
                <input type="radio" name="use_sex" ng-model="field.use_sex" ng-checked="field.use_sex=='女'" ng-value="0" title="女">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">简介</label>
            <div class="layui-input-block">
                <textarea name="use_content" ng-model="field.use_content" lay-verify="required" placeholder="请输入简介内容" class="layui-textarea"></textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-submit="" lay-filter="auth">立即提交</button>
                <a href="<?php echo url('basic'); ?>" class="layui-btn layui-btn-primary">返回</a>
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
        $scope.field = '<?php echo $useinfo; ?>'!='null'?<?php echo $useinfo; ?>:{use_id:'',use_nickname:'',use_phone:'',use_sex:'',use_picurl:'',use_content:''};
        $scope.orginfo = <?php echo $orginfo; ?>;
        if($scope.field.use_picurl){
            cltThumb.src = $scope.field.use_picurl;
        }
        layui.use(['form', 'layer'], function () {
            var form = layui.form(),layer = layui.layer;
            form.on('submit(auth)', function (data) {
                // 提交到方法 默认为本身
                data.field.use_id =  $scope.field.use_id;
                $.post("<?php echo url('basicEdit'); ?>",data.field,function(res){
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