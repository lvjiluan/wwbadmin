<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:53:"D:\www\admin/app/admin\view\content\headlinesAdd.html";i:1520007006;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>添加评论</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">

    <link rel="stylesheet" href="__ADMIN__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="__ADMIN__/css/style.css">
    <style>
        .replayuser ul{position:absolute;top:38px;left:0;z-index: 99999;background-color: #fff;width:100%;border: 1px solid #e6e6e6}
        .replayuser ul li{padding:10px;}
        .replayuser ul li:hover{background-color: #009688;color:#fff;cursor: pointer;}
    </style>
</head>
<body>
<div style="margin: 15px;"  ng-app="hd" ng-controller="ctrl">
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>添加头条内容</legend>
    </fieldset>
    <form class="layui-form layui-form-pane">

        <div class="layui-form-item">
            <label class="layui-form-label">头条标题</label>
            <div class="layui-input-4">
                <input type="text" name="ta_title"  lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>头条标题" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">图片</label>
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
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">内容</label>
            <div class="layui-input-block">
                <textarea id="ta_content" name="ta_content"  placeholder="请输入文章内容" class="layui-textarea"></textarea>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">首页推荐</label>
            <div class="layui-input-block">
                <input type="radio" name="ta_hot" lay-verify="required"  ng-checked="field.ta_hot=='1'" ng-value="1" title="是">
                <input type="radio" name="ta_hot" lay-verify="required"  ng-checked="field.ta_hot=='2'" ng-value="2" title="否">
            </div>
        </div>


        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-submit="0" lay-filter="auth">立即发布</button>
                <button type="button" class="layui-btn layui-btn-normal" lay-submit="1" lay-filter="auth">存为草稿</button>
                <a href="<?php echo url('headlines'); ?>" class="layui-btn layui-btn-primary">返回</a>
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
        layui.use(['form', 'layer','layedit'], function () {
            var form = layui.form(),layer = layui.layer;
            var layedit = layui.layedit;
            layedit.set({
                uploadImage: {
                    url: '<?php echo url("UpFiles/editUpload"); ?>' //接口url
                    ,type: '' //默认post
                }
            });
            layedit.build('ta_content'); //建立编辑器
            form.on('submit(auth)', function (data) {
                data.field.ta_content= layui.layedit.getContent(1);
                data.field.ta_status= $(this).attr("lay-submit");
                $.post("<?php echo url('headlinesAdd'); ?>",data.field,function(res){
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

    function imgChange(e) {
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