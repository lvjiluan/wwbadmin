<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/Users/lvjiluan/project/wwbadmin/app/admin/view/content/circlearticleAdd.html";i:1519745656;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>添加圈子文章</title>
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
<div style="margin: 15px;"  ng-app="hd" ng-controller="ctrl">
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>添加文章</legend>
    </fieldset>
    <form class="layui-form layui-form-pane" enctype="multipart/form-data">

        <div class="layui-form-item">
            <label class="layui-form-label">标题</label>
            <div class="layui-input-4">
                <input type="text" name="tma_title"  lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>文章标题" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">选择圈子</label>
            <div class="layui-input-4">
                <select name="tma_tmdid" lay-verify="required" ng-model="field.tma_tmdid" ng-options="v.tmd_id as v.tmd_name for v in momentinfo" >
                    <option value="">请选择圈子</option>
                </select>
            </div>
        </div>

        <!--<div class="layui-form-item">-->
            <!--<label class="layui-form-label">热门度</label>-->
            <!--<div class="layui-input-4">-->
                <!--<input type="text" name="tma_hot"  lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>热门度" class="layui-input">-->
            <!--</div>-->
        <!--</div>-->

        <div class="layui-form-item">
            <label class="layui-form-label">是否精选</label>
            <div class="layui-input-block">
                <input type="radio" name="tma_excellent"  ng-model="field.tma_excellent" ng-checked="field.tma_excellent=='1'" ng-value="1" title="是">
                <input type="radio" name="tma_excellent" ng-model="field.tma_excellent" ng-checked="field.tma_excellent=='0'" ng-value="0" title="否">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否置顶</label>
            <div class="layui-input-block">
                <input type="radio" name="tma_istop"  ng-model="field.tma_istop" ng-checked="field.tma_istop=='1'" ng-value="1" title="是">
                <input type="radio" name="tma_istop" ng-model="field.tma_istop" ng-checked="field.tma_istop=='0'" ng-value="0" title="否">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">文章内容</label>
            <div class="layui-input-block">
                <textarea id="tma_content" name="tma_content" ng-model="field.tma_content" lay-verify="required" placeholder="请输入文章内容" class="layui-textarea"></textarea>
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-submit="" lay-filter="auth">立即提交</button>
                <a href="<?php echo url('circlearticle'); ?>" class="layui-btn layui-btn-primary">返回</a>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="__ADMIN__/plugins/layui/layui.js"></script>
<script src="__STATIC__/js/angular.min.js"></script>
<script src="__STATIC__/js/jquery.2.1.1.min.js"></script>
<script>
    var m = angular.module('hd',[]);
    m.controller('ctrl',['$scope',function($scope) {
        $scope.momentinfo = <?php echo $momentinfo; ?>;
        layui.use(['form', 'layer','layedit'], function () {
            var layedit = layui.layedit;
            layedit.set({
                uploadImage: {
                    url: '<?php echo url("UpFiles/editUpload"); ?>' //接口url
                    ,type: '' //默认post
                }
            });
            layedit.build('tma_content'); //建立编辑器
            var form = layui.form(),layer = layui.layer;
            //自定义验证规则
            form.verify({
                tma_content: function(value){
                    if(layedit.getContent(1).length < 4){
                        return '内容请输入至少4个字符';
                    }
                }
            });
            form.on('submit(auth)', function (data) {
                // 提交到方法 默认为本身
                data.field.tma_content= layui.layedit.getContent(1);
                $.post("<?php echo url('circlearticleAdd'); ?>",data.field,function(res){
                    if(res.code > 0){
                        layer.msg(res.msg,{time:1800,icon:1},function(){
                            location.href = res.url;
                        });
                    }else{
                        layer.msg(res.msg,{time:1800,icon:2});
                    }
                });
            })
        });
    }]);

</script>
</body>

</html>