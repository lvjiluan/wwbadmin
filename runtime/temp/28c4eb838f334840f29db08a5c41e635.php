<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:55:"D:\www\admin/app/admin\view\organization\basicEdit.html";i:1520004685;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>机构信息修改</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=1L4C5Ac4HM1R3HMu2PP9GTmG4zFUjFqs"></script>
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
        <legend>机构信息修改</legend>
    </fieldset>
    <form class="layui-form layui-form-pane"  enctype="multipart/form-data">

        <div class="layui-form-item">
            <label class="layui-form-label">机构名称</label>
            <div class="layui-input-6">
                <input type="text" name="org_name" ng-model="field.org_name"  lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>机构名称" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">评价星级</label>
            <div class="layui-input-6">
                <input type="text" name="org_grade" ng-model="field.org_grade"  lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>评价星级" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">负责人姓名</label>
            <div class="layui-input-6">
                <input type="text" name="org_chargename" ng-model="field.org_chargename"  lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>负责人姓名" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">负责人头像</label>
            <div class="layui-input-block layui-input-blocks" style="display: inline;">
                <div class="site-demo-upload">
                    <img id="cltThumb" onclick="fileclick(0)" style="width:100px;height:auto;" title="点击上传图片" src="__ADMIN__/images/tong.png">
                    <div class="site-demo-upbar">
                        <input name="url" type="hidden" id="thumbval"/>
                        <input type="file" style="display: none" onchange="imgChangearr(event,0)" name="thumb" lay-type="images" class="layui-upload-file" id="thumb">
                    </div>
                </div>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">机构缩略图</label>
            <div class="layui-input-block layui-input-blocks" style="display: inline;">
                <div class="site-demo-upload">
                    <img id="cltThumb999" onclick="fileclick(999)"  title="点击上传图片" src="__ADMIN__/images/tong.png">
                    <div class="site-demo-upbar">
                        <input name="url999" type="hidden" id="thumbval999"/>
                        <input type="file" style="display: none" onchange="imgChangearr(event,999)" name="thumb" lay-type="images" class="layui-upload-file" id="thumb999">
                    </div>
                </div>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">联系方式</label>
            <div class="layui-input-6">
                <input type="text" name="org_phone" ng-model="field.org_phone" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>联系方式" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">机构地址</label>
            <div class="layui-input-6">
                <input type="text" name="org_address"  ng-model="field.org_address"  lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>机构地址" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">机构性质</label>
            <div class="layui-input-block">
                <input type="radio" name="org_class" ng-checked="field.org_class=='1'" ng-value="1" title="民办">
                <input type="radio" name="org_class" ng-checked="field.org_class=='2'" ng-value="2" title="公办">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">机构类型</label>
            <div class="layui-input-block">
                <input type="radio" name="org_type" ng-checked="field.org_type=='1'" ng-value="1" title="托儿所">
                <input type="radio" name="org_type" ng-checked="field.org_type=='2'" ng-value="2" title="幼儿园">
                <input type="radio" name="org_type" ng-checked="field.org_type=='3'" ng-value="3" title="早教中心">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">机构标签</label>
            <div class="layui-input-block">
                <input type="checkbox" name="ode_tag[1]" ng-checked="field.ode_tag1=='1'" value="全日托" title="全日托">
                <input type="checkbox" name="ode_tag[2]" ng-checked="field.ode_tag2=='1'" value="半日托" title="半日托">
                <input type="checkbox" name="ode_tag[3]" ng-checked="field.ode_tag3=='1'" value="月托" title="月托">
                <input type="checkbox" name="ode_tag[4]" ng-checked="field.ode_tag4=='1'" value="暑期托" title="暑期托">
                <input type="checkbox" name="ode_tag[5]" ng-checked="field.ode_tag5=='1'" value="家庭式服务" title="家庭式服务">
                <input type="checkbox" name="ode_tag[6]" ng-checked="field.ode_tag6=='1'" value="午餐" title="午餐">
                <input type="checkbox" name="ode_tag[7]" ng-checked="field.ode_tag7=='1'" value="校园公开日" title="校园公开日">
                <input type="checkbox" name="ode_tag[8]" ng-checked="field.ode_tag8=='1'" value="独立操场" title="独立操场">
                <input type="checkbox" name="ode_tag[9]" ng-checked="field.ode_tag9=='1'" value="儿童乐园" title="儿童乐园">
                <input type="checkbox" name="ode_tag[10]" ng-checked="field.ode_tag10=='1'" value="示范园" title="示范园">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">机构特色标签</label>
            <div class="layui-input-block">
                <input type="checkbox" name="ode_selftag[1]" ng-checked="field.ode_selftag1=='1'" value="全日托" title="全日托">
                <input type="checkbox" name="ode_selftag[2]" ng-checked="field.ode_selftag2=='1'" value="半日托" title="半日托">
                <input type="checkbox" name="ode_selftag[3]" ng-checked="field.ode_selftag3=='1'" value="月托" title="月托">
                <input type="checkbox" name="ode_selftag[4]" ng-checked="field.ode_selftag4=='1'" value="暑期托" title="暑期托">
                <input type="checkbox" name="ode_selftag[5]" ng-checked="field.ode_selftag5=='1'" value="家庭式服务" title="家庭式服务">
                <input type="checkbox" name="ode_selftag[6]" ng-checked="field.ode_selftag6=='1'" value="午餐" title="午餐">
                <input type="checkbox" name="ode_selftag[7]" ng-checked="field.ode_selftag7=='1'" value="校园公开日" title="校园公开日">
                <input type="checkbox" name="ode_selftag[8]" ng-checked="field.ode_selftag8=='1'" value="独立操场" title="独立操场">
                <input type="checkbox" name="ode_selftag[9]" ng-checked="field.ode_selftag9=='1'" value="儿童乐园" title="儿童乐园">
                <input type="checkbox" name="ode_selftag[10]" ng-checked="field.ode_selftag10=='1'" value="示范园" title="示范园">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">经度</label>
            <div class="layui-input-6">
                <input type="text" id="ode_lon" name="ode_lon" ng-model="field.ode_lon"  lay-verify="" placeholder="<?php echo lang('pleaseEnter'); ?>经度" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">维度</label>
            <div class="layui-input-6">
                <input type="text" id="ode_lat" name="ode_lat" ng-model="field.ode_lat"  lay-verify="" placeholder="<?php echo lang('pleaseEnter'); ?>维度" class="layui-input">
            </div>
        </div>

        <div style="width:80%;height:400px;margin:20px;" id="allmap"></div>

        <div class="layui-form-item">
            <label class="layui-form-label">机构级别</label>
            <div class="layui-input-block">
                <input type="radio" name="ode_level" ng-checked="field.org_type=='8'"  ng-value="8" title="示范园">
                <input type="radio" name="ode_level" ng-checked="field.org_type=='1'"  ng-value="1" title="一级">
                <input type="radio" name="ode_level" ng-checked="field.org_type=='2'"  ng-value="2" title="二级">
                <input type="radio" name="ode_level" ng-checked="field.org_type=='3'"  ng-value="3" title="三级">
                <input type="radio" name="ode_level" ng-checked="field.org_type=='4'"  ng-value="4" title="未定">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">机构面积</label>
            <div class="layui-input-6">
                <input type="text" name="ode_area" ng-model="field.ode_area"  lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>机构面积" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">班级数量</label>
            <div class="layui-input-6">
                <input type="text" name="ode_classnum" ng-model="field.ode_classnum"  lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>班级数量" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">师资力量</label>
            <div class="layui-input-6">
                <input type="text" name="ode_teachernum" ng-model="field.ode_teachernum"  lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>师资力量" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">展示图片</label>
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
            </div>
            <div class="layui-input-block">
                <div class="site-demo-upload">
                    <img id="cltThumb4" onclick="fileclick(4)" title="点击上传图片" src="__ADMIN__/images/tong.png">
                    <div class="site-demo-upbar">
                        <input name="urlarr[4]" type="hidden" id="thumbval4"/>
                        <input type="file" style="display: none" onchange="imgChangearr(event,4)" name="thumb4" lay-type="images" class="layui-upload-file" id="thumb4">
                    </div>
                </div>
                <div class="site-demo-upload">
                    <img id="cltThumb5" onclick="fileclick(5)" title="点击上传图片" src="__ADMIN__/images/tong.png">
                    <div class="site-demo-upbar">
                        <input name="urlarr[5]" type="hidden" id="thumbval5"/>
                        <input type="file" style="display: none" onchange="imgChangearr(event,5)" name="thumb5" lay-type="images" class="layui-upload-file" id="thumb5">
                    </div>
                </div>
                <div class="site-demo-upload">
                    <img id="cltThumb6" onclick="fileclick(6)" title="点击上传图片" src="__ADMIN__/images/tong.png">
                    <div class="site-demo-upbar">
                        <input name="urlarr[6]" type="hidden" id="thumbval6"/>
                        <input type="file" style="display: none" onchange="imgChangearr(event,6)" name="thumb6" lay-type="images" class="layui-upload-file" id="thumb6">
                    </div>
                </div>

            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">机构简介</label>
            <div class="layui-input-block">
                <textarea name="ode_detail" ng-model="field.ode_detail" lay-verify="required" placeholder="请输入机构简介" class="layui-textarea"></textarea>
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
        $scope.field = <?php echo $orginfo; ?>;
        if($scope.field.org_chargepicurl){
            cltThumb.src = $scope.field.org_chargepicurl;
        }
        if($scope.field.org_img){
            cltThumb999.src = $scope.field.org_img;
        }
        if($scope.field.ode_picurl!=""){
            var val = $scope.field.ode_picurl;
            for(var i=0; i<val.length; i++){
                var cltThumbn = $("#cltThumb"+(i+1));
                cltThumbn.attr("src",val[i]);
            }
        }
        layui.use(['form', 'layer'], function () {
            var form = layui.form(),layer = layui.layer;
            form.on('submit(auth)', function (data) {
                // 提交到方法 默认为本身
                data.field.org_id =  $scope.field.org_id;
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
<script type="text/javascript">
    // 百度地图API功能
    var map = new BMap.Map("allmap",{enableMapClick: false});
    map.enableScrollWheelZoom();   //启用滚轮放大缩小，默认禁用
    map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用
    var orginfo = <?php echo $orginfo; ?>;
    var lon = orginfo.ode_lon;
    var lat = orginfo.ode_lat;
    if(lon && lat) {
        var poi = new BMap.Point(lon,lat);
        map.centerAndZoom(poi, 16);
    } else {
        map.centerAndZoom("上海",16);
    }


    //单击获取点击的经纬度
    map.addEventListener("click",function(e){
        // alert(e.point.lng + "," + e.point.lat);
        $("#ode_lon").val(e.point.lng);
        $("#ode_lat").val(e.point.lat);
    });
</script>