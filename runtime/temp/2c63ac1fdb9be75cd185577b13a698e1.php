<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:57:"D:\www\admin/app/admin\view\organization\commentEdit.html";i:1519907131;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>机构评论修改</title>
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
        .layui-input-blocks{float:left;width:100%;}
        .site-demo-upload{float:left;width:150px;margin:10px;}
        .site-demo-upload img{cursor: pointer;width:150px;height:auto;}
    </style>
</head>

<body>
<div style="margin: 15px;" ng-app="hd" ng-controller="ctrl">
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>机构评论修改</legend>
    </fieldset>
    <form class="layui-form layui-form-pane"  enctype="multipart/form-data">

        <div class="layui-form-item">
            <label class="layui-form-label">机构</label>
            <div class="layui-input-4">
                <select name="oco_orgid" lay-verify="required" ng-model="field.oco_orgid" ng-options="v.org_id as v.org_name for v in orginfo" >
                    <option value="">请选择所属机构</option>
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">用户</label>
            <div class="layui-input-4">
                <select name="oco_userid" lay-verify="required" ng-model="field.oco_userid" ng-options="v.use_id as v.use_nickname for v in userinfo" >
                    <option value="">请选择用户</option>
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">评价星级</label>
            <div class="layui-input-6">
                <input type="text" name="oco_grade"  lay-verify="required" ng-model="field.oco_grade" placeholder="<?php echo lang('pleaseEnter'); ?>评价星级" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">浏览量</label>
            <div class="layui-input-6">
                <input type="text" name="oco_click"  lay-verify="required" ng-model="field.oco_click"  placeholder="<?php echo lang('pleaseEnter'); ?>浏览量" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">留言数</label>
            <div class="layui-input-6">
                <input type="text" name="oco_com"  lay-verify="required" ng-model="field.oco_com"  placeholder="<?php echo lang('pleaseEnter'); ?>留言数" class="layui-input">
            </div>
        </div>


        <div class="layui-form-item">
            <label class="layui-form-label">评论图片</label>
            <div class="layui-input-block layui-input-blocks">
                <div class="site-demo-upload">
                    <img id="cltThumb1" onclick="fileclick(1)" title="点击上传图片" src="__ADMIN__/images/tong.png">
                    <div class="site-demo-upbar">
                        <input name="urlarr[1]" type="hidden" id="thumbval1"/>
                        <input type="file" style="display: none" onchange="imgChangearr(event,1)" name="thumb1" lay-type="images" class="layui-upload-file" id="thumb1">
                    </div>
                </div>
                <div class="site-demo-upload">
                    <img id="cltThumb2" onclick="fileclick(2)" title="点击上传图片" src="__ADMIN__/images/tong.png">
                    <div class="site-demo-upbar">
                        <input name="urlarr[2]" type="hidden" id="thumbval2"/>
                        <input type="file" style="display: none" onchange="imgChangearr(event,2)" name="thumb2" lay-type="images" class="layui-upload-file" id="thumb2">
                    </div>
                </div>
                <div class="site-demo-upload">
                    <img id="cltThumb3" onclick="fileclick(3)" title="点击上传图片" src="__ADMIN__/images/tong.png">
                    <div class="site-demo-upbar">
                        <input name="urlarr[3]" type="hidden" id="thumbval3"/>
                        <input type="file" style="display: none" onchange="imgChangearr(event,3)" name="thumb3" lay-type="images" class="layui-upload-file" id="thumb3">
                    </div>
                </div>
                <div class="site-demo-upload">
                    <img id="cltThumb4" onclick="fileclick(4)" title="点击上传图片" src="__ADMIN__/images/tong.png">
                    <div class="site-demo-upbar">
                        <input name="urlarr[4]" type="hidden" id="thumbval4"/>
                        <input type="file" style="display: none" onchange="imgChangearr(event,4)" name="thumb4" lay-type="images" class="layui-upload-file" id="thumb4">
                    </div>
                </div>
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">评论内容</label>
            <div class="layui-input-block">
                <textarea name="oco_content" ng-model="field.oco_content" lay-verify="required" placeholder="请输入评论内容" class="layui-textarea"></textarea>
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-submit="" lay-filter="auth">立即提交</button>
                <a href="<?php echo url('comment'); ?>" class="layui-btn layui-btn-primary">返回</a>
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
        $scope.field = '<?php echo $cominfo; ?>'!='null'?<?php echo $cominfo; ?>:{oco_id:'',oco_picurl:'',oco_userid:''};
        $scope.orginfo = <?php echo $orginfo; ?>;
        $scope.userinfo = <?php echo $userinfo; ?>;
        if($scope.field.oco_picurl) {
            if ($scope.field.oco_picurl != "") {
                var val = $scope.field.oco_picurl;
                for (var i = 0; i < val.length; i++) {
                    var cltThumbn = $("#cltThumb" + (i + 1));
                    cltThumbn.attr("src", val[i]);
                }
            }
        }
        layui.use(['form', 'layer'], function () {
            var form = layui.form(),layer = layui.layer;
            form.on('submit(auth)', function (data) {
                // 提交到方法 默认为本身
                data.field.oco_id =  $scope.field.oco_id;
                $.post("<?php echo url('commentEdit'); ?>",data.field,function(res){
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
    function imgChangearr(e,num) {
        if(num == 0) num = "";
        console.info(e.target.files[0]);//图片文件
        var dom = $("input[id^='thumb"+num+"']")[0];
        console.info(dom.value);//这个是文件的路径 C:\fakepath\icon (5).png
        console.log(e.target.value);//这个也是文件的路径和上面的dom.value是一样的
        var reader = new FileReader();
        reader.onload = (function (file) {
            return function (e) {
//                console.info(this.result); //这个就是base64的数据了
                $("#cltThumb"+num)[0].src = this.result;
                $("#thumbval"+num).val(this.result);
            };
        })(e.target.files[0]);
        reader.readAsDataURL(e.target.files[0]);
    }
    function fileclick(num) {
        if(num == 0) num = "";
        $("#thumb"+num).trigger("click");//模拟执行id=thumb的事件
    }
</script>
</body>

</html>