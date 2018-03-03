<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/Users/lvjiluan/project/wwbadmin/app/admin/view/content/circlearticle.html";i:1519745654;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>文章管理</title>
    <link rel="stylesheet" href="__ADMIN__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/global.css" media="all">
    <link rel="stylesheet" href="__ADMIN__/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="__ADMIN__/css/style.css" />
</head>

<body>
<div class="admin-main">
    <blockquote class="layui-elem-quote">
        <a href="<?php echo url('circlearticleAdd'); ?>" class="layui-btn layui-btn-small">
            <i class="fa fa-plus"></i> <?php echo lang('add'); ?>圈子文章
        </a>
    </blockquote>
    <fieldset class="layui-elem-field ">
        <legend>文章<?php echo lang('list'); ?></legend>
        <div class="layui-field-box table-responsive">
            <form method="post" id="formSearch" action="<?php echo url('circlearticle'); ?>">
                <div class="demoTable" style="margin-bottom: 10px;">
                    按圈子搜索：
                    <div class="layui-inline">
                        <input class="layui-input" value="<?php echo $keyword; ?>" name="keyword" id="username" autocomplete="off">
                    </div>
                    <button class="layui-btn" data-type="reload">搜索</button>
                </div>
            </form>
            <table class=" layui-table table-hover">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>文章标题</th>
                    <th>文章内容</th>
                    <th>所属圈子</th>
                    <th>是否精选</th>
                    <th>是否置顶</th>
                    <th>发布时间</th>
                    <th>状态</th>
                    <th><?php echo lang('action'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo $v['tma_id']; ?></td>
                    <td><?php echo $v['tma_title']; ?></td>
                    <td><?php echo $v['tma_content']; ?></td>
                    <td><?php echo $v['tmd_name']; ?></td>
                    <td><?php echo $v['tma_excellent']; ?></td>
                    <td><?php echo $v['tma_istop']; ?></td>
                    <td><?php echo $v['tma_time']; ?></td>
                    <td>
                        <?php if($v["tma_isshow"] == 1): ?>
                        <a class="red" href="javascript:;" onclick="return stateyes('<?php echo $v['tma_id']; ?>');" title="正常">
                            <div id="zt<?php echo $v['tma_id']; ?>">
                                <button class="layui-btn layui-btn-warm layui-btn-mini">正常</button>
                            </div>
                        </a>
                        <?php else: ?>
                        <a class="red" href="javascript:;" onclick="return stateyes('<?php echo $v['tma_id']; ?>');" title="隐藏">
                            <div id="zt<?php echo $v['tma_id']; ?>">
                                <button class="layui-btn layui-btn-danger layui-btn-mini">隐藏</button>
                            </div>
                        </a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="javascript:void(0)" tma_id="<?php echo $v['tma_id']; ?>" id="layerDemo<?php echo $v['tma_id']; ?>" data-method="setTop" class="layui-btn layui-btn-mini">查看文章</a>
                        <a href="<?php echo url('commentAdd',['tma_id'=>$v['tma_id']]); ?>" class="layui-btn layui-btn-mini">添加评论</a>
                        <a href="<?php echo url('circlearticleEdit',['tma_id'=>$v['tma_id']]); ?>" class="layui-btn layui-btn-mini"><?php echo lang('edit'); ?></a>
                        <a href="javascript:;" onclick="return del('<?php echo $v['tma_id']; ?>')" class="layui-btn layui-btn-mini layui-btn-danger"><?php echo lang('del'); ?></a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>

        </div>
    </fieldset>
    <div class="admin-table-page">
        <div id="page" class="page">
            <?php echo $page; ?>
        </div>
    </div>
</div>
<script type="text/javascript" src="__ADMIN__/plugins/layui/layui.js"></script>
<script src="__STATIC__/js/jquery.2.1.1.min.js"></script>
<script>
    layui.use(['form', 'layer'], function() {
        var form = layui.form(), layer = layui.layer;
        $('.demoTable .layui-btn').on('click', function(){
            $("#formSearch").submit();
        });
    });
    function del(id) {
        layer.confirm('<?php echo lang("Are you sure you want to delete it"); ?>', {icon: 3}, function (index) {
            window.location.href = "<?php echo url('circlearticleDel'); ?>?tma_id="+id;
        });
    }
    function stateyes(id) {
        $.post('<?php echo url("circlearticleState"); ?>',{'tma_id': id},function (data) {
            if (data.status==1) {
                if (data.info == "隐藏") {
                    var a = '<button class="layui-btn layui-btn-danger layui-btn-mini">隐藏</button>'
                    $('#zt' + id).html(a);
                    return false;
                } else {
                    var b = '<button class="layui-btn layui-btn-warm layui-btn-mini">正常</button>'
                    $('#zt' + id).html(b);
                    return false;
                }
            }else{
                layer.alert(data.info, {icon: 4});
                return false;
            }
        });
        return false;
    }

    layui.use('layer', function(obj){ //独立版的layer无需执行这一句
        var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句
        //触发事件
        var active = {
            setTop: function(e){
                var pid = e.attr("tma_id");
                //多窗口模式，层叠置顶
                layer.open({
                    type: 2 //此处以iframe举例
                    ,title: '文章内容详情'
                    ,area: ['800px', '500px']
                    ,shade: 0
                    ,maxmin: true
                    ,offset: [
                        ($(window).height()*0.1)
                        ,($(window).width()*0.2)
                    ]
                    ,content: "<?php echo url('circlearticleView'); ?>?tma_id="+pid
                    ,btn: ['关闭'] //只是为了演示
                    ,btn2: function(){
                        layer.closeAll();
                    }
                });
            }

        };
        $('.layui-btn').on('click', function(){
            var othis = $(this), method = othis.data('method');
            active[method] ? active[method].call(this, othis) : '';
        });

    });
</script>
</body>

</html>