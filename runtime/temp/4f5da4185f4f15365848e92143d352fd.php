<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:51:"D:\www\admin/app/admin\view\content\commentAdd.html";i:1519907154;}*/ ?>
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
        <legend>添加评论</legend>
    </fieldset>
    <form class="layui-form layui-form-pane">
        <div class="layui-form-item">
            <label class="layui-form-label">评论的文章</label>
            <div class="layui-input-4">
                <select name="tmc_tmaid" lay-verify="required" ng-model="field.tma_id" ng-options="v.tma_id as v.tma_title for v in articleinfo"  >
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">选择用户</label>
            <div class="layui-input-4">
                <select name="tmc_useid" lay-verify="required" ng-model="field.tmc_useid" ng-options="v.use_id as v.use_nickname for v in userinfo" >
                    <option value="">请选择用户</option>
                </select>
            </div>
            <span style="height:38px;line-height: 38px;color:red;">（仅提供内部账号）</span>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">类型</label>
            <div class="layui-input-block">
                <input type="radio" name="tmc_type" lay-verify="required"  ng-checked="field.tmc_type=='1'" ng-value="1" title="评论">
                <input type="radio" name="tmc_type" lay-verify="required"  ng-checked="field.tmc_type=='2'" ng-value="2" title="回复">
            </div>
        </div>

        <div class="layui-form-item replayuser">
            <label class="layui-form-label">被回复用户</label>
            <div class="layui-input-4">
                <input style="position: relative;" type="text"  lay-verify="" placeholder="输入关键字搜索用户" class="layui-input replayuserverify">
                <ul class="userul">
                    <?php if(is_array($userlist) || $userlist instanceof \think\Collection || $userlist instanceof \think\Paginator): $i = 0; $__LIST__ = $userlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <li class="userli" val="<?php echo $v['use_id']; ?>"><?php echo $v['use_nickname']; ?></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div><input type="text" class="tmc_replayuseid"  style="display:none;" readonly="true" name="tmc_replayuseid"/>
            <span style="height:38px;line-height: 38px;color:red;">注：此处为输入关键字匹配用户（类型为2时无需填写）</span>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">内容</label>
            <div class="layui-input-4">
                <input type="text" name="tmc_content"  lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>评论/回复内容" class="layui-input">
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
        $scope.field = <?php echo $article; ?>;
        $scope.articleinfo = <?php echo $articleinfo; ?>;
        $scope.userinfo = <?php echo $userinfo; ?>;
        layui.use(['form', 'layer'], function () {
            var form = layui.form(),layer = layui.layer;
            form.on('submit(auth)', function (data) {
                // 提交到方法 默认为本身
                if(data.field.tmc_type == 2 && data.field.tmc_replayuseid == "") {
                    alert("请选择被回复用户！");
                    return false;
                }else if(data.field.tmc_type != 1 && data.field.tmc_type != 2) {
                    alert("请选择类型！");
                    return false;
                }
                $.post("<?php echo url('commentAdd'); ?>",data.field,function(res){
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

    $(function() {
        $(".userul").css('display', 'none');
        $(".userli").css('display', 'none');
        $(".replayuserverify").keyup(function() {
            $(".userul").css('display', 'block');//只要输入就显示列表框
            if ($(this).val().length <= 0) {
                $(".userul").css('display', 'none');
                $(".userli").css('display', 'none');//如果什么都没填，跳出，保持全部显示状态
                return;
            }
            $(".userli").css('display', 'none');//如果填了，先将所有的选项隐藏

            for (var i = 0; i < $(".userli").length; i++) {
                //模糊匹配，将所有匹配项显示
                if ($(".userli").eq(i).text().indexOf($(this).val()) != -1) {
                    $(".userli").eq(i).css('display', 'block');
                }
            }
        })
        $(".userli").click(function() {
            $(".tmc_replayuseid").val($(this).attr("val"));
            $(".replayuserverify").val($(this).html());
            $(".userli").hide();
            $(".userul").hide();
        })
    })

</script>
</body>

</html>