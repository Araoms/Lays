<!--{template header}-->
<script type="text/javascript" src="{SITE_URL}static/js/jquery-ui/jquery-ui.js"></script>
<script src="{SITE_URL}static/js/admin.js" type="text/javascript"></script>

<style>
    em{
        color:red;
    }
</style>
<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
    <div style="float:left;"><a href="index.php?admin_main/stat{$setting['seo_suffix']}" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;专题管理</div>
</div>
<!--{if isset($message)}-->
<table class="table">
    <tr>
        <td class="{if isset($type)}$type{/if}">{$message}</td>
    </tr>
</table>
<!--{/if}-->
<a class="btn write-btn btn-success" target="_blank" href="{url user/addxinzhi}">
    <i class="fa fa-pencil"></i>写文章
</a>
<a class="btn write-btn btn-success"  href="{url admin_topic/shenhe}">
    <i class="fa fa-check"></i>文章审核
</a>
<a class="btn write-btn btn-success"  href="{url admin_topic/vertifycomments}">
    <i class="fa fa-check"></i>文章评论审核
</a>
<a class="btn write-btn btn-success"  href="{url admin_topic/rule_replacement}">
    <i class="fa fa-check"></i>文章内容规则替换
</a>
<form id="form">
    <input type="hidden" value="true" name="submit"/>
    <table class="table">
        <tr class="header">
        <tr>
            <td class="altbg1" width="45%"><b>文章分类:</b></td>
            <td class="altbg2">
                <div id="dialogcate1">
                    <select  id="category1"  size="1" name="category1" ></select>
                    <select  id="category2"   size="1" name="category2" ></select>
                    <select  id="category3"  size="1"  name="category3" ></select>
                </div>
            </td>
        </tr>
        </tr>
        <tr>
            <td class="altbg1" width="45%">
                <b>文章内容文字替换规则一:</b>
                <br>
                输入要替换的文字或者标签
            </td>
            <td class="altbg2">
                <input type="text"   class="form-control short-input"  value="" name="rule[]" style="width:300px" />
            </td>
            <td class="altbg1" width="45%"><b>文章内容文字替换规则一:</b><br>
                输入替换后的内容(不填写默认为空)
            </td>
            <td class="altbg2">
                <input type="text"  class="form-control short-input"  value="" name="rule_value[]" style="width:300px" />
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>文章内容文字替换规则二:</b>
                <br>
                输入要替换的文字或者标签
            </td>
            <td class="altbg2">
                <input type="text"  class="form-control short-input"  value="" name="rule[]" style="width:300px" />
            </td>
            <td class="altbg1" width="45%"><b>文章内容文字替换规则二:</b><br>
                输入替换后的内容(不填写默认为空)
            </td>
            <td class="altbg2">
                <input type="text"  class="form-control short-input"  value="" name="rule_value[]" style="width:300px" />
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>文章内容文字替换规则三:</b>
                <br>
                输入要替换的文字或者标签
            </td>
            <td class="altbg2">
                <input type="text"   class="form-control short-input"  value="" name="rule[]" style="width:300px" />
            </td>
            <td class="altbg1" width="45%"><b>文章内容文字替换规则三:</b><br>
                输入替换后的内容(不填写默认为空)
            </td>
            <td class="altbg2">
                <input type="text"   class="form-control short-input"  value="" name="rule_value[]" style="width:300px" />
            </td>
        </tr>
        <tr>
            <td class="altbg1" width="45%"><b>文章内容文字替换规则四:</b>
                <br>
                注意：该替换是找到内容之前 替换为空，或者内容之后的内容替换为空
                输入要替换的文字或者标签
            </td>
            <td class="altbg2">
                <input type="text"   class="form-control short-input"  value="" name="replace_value" style="width:300px" />
            </td>
            <td class="altbg1" width="45%"><b>文章内容文字替换规则四:</b><br>
            </td>
            <td class="altbg2">
                <input type="radio"     value="1" name="replace" />替换之前的数据 <br/>
                <input type="radio"     value="2" name="replace" />替换之后的数据
            </td>
        </tr>
    </table>
    <button style="background-color: #3c8dbc;" > 确认替换 </button>
</form>
<script>

    var category1 = {$categoryjs[category1]};
    var category2 = {$categoryjs[category2]};
    var category3 = {$categoryjs[category3]};
    $(function () {
        initcategory(category1);
        fillcategory(category2, $("#category1 option:selected").val(), "category2");
        fillcategory(category3, $("#category2 option:selected").val(), "category3");

        function selectcate() {
            var selectedcatestr = '';
            var category1 = $("#category1 option:selected").val();
            var category2 = $("#category2 option:selected").val();
            var category3 = $("#category3 option:selected").val();
            if (category1 > 0) {
                selectedcatestr = $("#category1 option:selected").html();
                $("#cid").val(category1);
                $("#cid1").val(category1);
            }
            if (category2 > 0) {
                selectedcatestr += " > " + $("#category2 option:selected").html();
                $("#cid").val(category2);
                $("#cid2").val(category2);
            }
            if (category3 > 0) {
                selectedcatestr += " > " + $("#category3 option:selected").html();
                $("#cid").val(category3);
                $("#cid3").val(category3);
            }

        }

        selectcate();





        $("#form").submit(function () {
            var checked = false;
            if($("input[name='replace_value']").val()){
                 $("input[name='replace']").each(function () {

                     checked =  $(this).is(':checked');
                           if(checked){
                               return false;

                           }

                });

                if(!checked){
                    alert('规则四请勾选');
                    return false;
                }
            }

            var value1 =$('#category1').val();//一级分类
            var value2 =$('#category2') .val();//2级分类
            var value3 =$('#category3') .val();//3级分类
            if(value1==null){
                alert('当前没有分类选择');
                return false;
            }
            var url = "index.php?admin_topic/rule_replacement";
            var data = $("#form").serialize();
            $.ajax(
                {   type:'get',
                    url:url,
                    data:data,
                    datatype:'json',
                    success:function (data) {
                        var data = JSON.parse(data);
                             alert(data.msg);
                    },
                    error:function (msg) {
                        // console.log(msg);
                    }
                }
            );
            return false;
        });


    });
</script>
<script src="{SITE_URL}static/css/bianping/js/common.js"></script>
<!--{template footer}-->