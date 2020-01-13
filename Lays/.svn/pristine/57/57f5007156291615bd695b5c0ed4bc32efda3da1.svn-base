<!--{template header}-->

<style>
body,.wrapper{
	overflow:visible;
}
.automain{
	width:60%;
}
.clearfix, .clear {
    clear: none;
}
.auto_pannel_box{

	width:20%;
    min-height:400px;
position:fixed;
right:0px;
top:120px;
background:#fff;
	padding:20px;
}
.form-group,.col-md-12 {
	padding:0px;
margin:0px;
}
.btn-category{
	width:100%;
hegiht:70px;
line-hegiht:70px;
text-align:center;
    background:#777;
    color:#fff;
    border-radius: 3px;
    -webkit-box-shadow: none;
    box-shadow: none;
    border: 1px solid transparent;
display:block;
margin:10px auto;
}
.auto-item{
	margin:10px auto;
}
</style>

<div class="alert alert-warning">
自动采集适合页面数据变动频繁的地址，如果不是最好不要设置，因为没有多大意义，系统不会重复采集。
</div>
<a href="{SITE_URL}index.php?admin_autocaiji/add{$setting['seo_suffix']}" class="btn btn-success">添加问答采集规则</a>
<a href="{SITE_URL}index.php?admin_autocaiji/addwenzhang{$setting['seo_suffix']}" class="btn btn-success">添加文章采集规则</a>
<a target="_blank" href="{SITE_URL}index.php?admin_autocaiji/addtest{$setting['seo_suffix']}" class="btn btn-success">添加测试规则（首次使用）</a>
<ul class="nav nav-secondary">
  <li class="active"><a href="{SITE_URL}index.php?admin_autocaiji{$setting['seo_suffix']}">采集规则列表</a></li>
</ul>
<form  method="post">
    <table class="table">
        <tbody>
        <tr>
            <td  width="200" class="altbg2">采集类型:
                <br/>
                <select  id="caijitype"  size="1" name="caijitype" >
                    <option value="-1">--请选择--</option>
                    <option value="1">--文章--</option>
                    <option value="0">--回答--</option>
                    <option value="2">--刷题--</option>
                </select>

            </td>
            <td  width="200" class="altbg2">分类:
                <br/>
                <select  id="category1"  size="1" name="category1" >
                    <option value="0">--不限--</option>
                </select>
                <select  id="category2"   size="1" name="category2" ></select>
                <select  id="category3"  size="1"  name="category3" ></select>
            </td>
        </tr>
      
        <tr>
            <td  rowspan="2" class="altbg2"><input class="btn btn-info" name="submit" type="submit" value="查询"></td>
        </tr>
        </tbody>
    </table>
</form>
<table class="table table-hover">
    <thead>
      <tr>
       <td ><input class="checkbox" value="chkall" id="chkall" onclick="checkall('caiid[]')" type="checkbox" name="chkall"><label for="chkall">全选</label></td>
        <th>#</th>
        <th>采集类型</th>
        <th>采集对应分类</th>
        <th>采集网址</th>
          <th>是否a标签title熟悉获取标题</th>
         <th>采集来源</th>
        <th>采集状态</th>
        <th>采集进度(当前采集数/采集总数)</th>
         <th>操作</th>
      </tr>
    </thead>
    <tbody>

    <!--{loop $caijilist $index $caiji}-->
      <tr>
        <td class="altbg2">
        <input class="checkbox" type="checkbox" value="{$caiji['id']}" name="caiid[]">
        <input type="hidden" value="{$caiji['caiji_url']}" class="c_caiji_url">
         <input type="hidden" value="{$caiji['caiji_prefix']}" class="c_caiji_prefix">
          <input type="hidden" value="{$caiji['daanyuming']}" class="c_daanyuming">
             <input type="hidden" value="{$caiji['tiwenshijian']}" class="c_tiwenshijian">
              <input type="hidden" value="{$caiji['huidashijian']}" class="c_huidashijian">
               <input type="hidden" value="{$caiji['category1']}" class="c_category1">
                <input type="hidden" value="{$caiji['category2']}" class="c_category2">
                 <input type="hidden" value="{$caiji['category3']}" class="c_category3">
                  <input type="hidden" value="{$caiji['cid']}" class="c_cid">
                   <input type="hidden" value="{$caiji['ckabox']}" class="c_ckabox">
                         <input type="hidden" value="{$caiji['imgckabox']}" class="c_imgckabox">
                    <input type="hidden" value="{$caiji['bianma']}" class="c_bianma">
                     <input type="hidden" value="{$caiji['guize']}" class="c_guize">
                      <input type="hidden" value="{$caiji['daandesc']}" class="c_daandesc">
                      <input type="hidden" value="{$caiji['content']}" class="c_content">
                       <input type="hidden" value="{$caiji['caiji_best']}" class="c_caiji_best">
                        <input type="hidden" value="{$caiji['caiji_hdusername']}" class="c_caiji_hdusername">
                         <input type="hidden" value="{$caiji['caiji_hdusertx']}" class="c_caiji_hdusertx">
                          <input type="hidden" value="{$caiji['atitle']}" class="c_caiji_atitle">
                            <input type="hidden" value="{$caiji['caijitype']}" class="c_caijitype">
        </td>

        <td>{$index}</td>
         <td>
          {if $caiji['caijitype']==1}
         --文章--
          {else}
          回答
          {/if}
        <td>{$caiji['categoryname']}</td>

        <td>{$caiji['caiji_url']}</td>
          <td>
          {if $caiji['atitle']==1}
           是<i class="fa fa-check"></i>
          {else}
          不是
          {/if}
          </td>
         <td>{$caiji['source']}</td>
          <td><span class="c_state">待采集</span></td>
        <td><span class="c_jindu">(0/0)</span></td>
          <td>


          <a href="{SITE_URL}index.php?admin_autocaiji/edit/{$caiji['id']}{$setting['seo_suffix']}" class="btn btn-success">编辑</a>

          &nbsp;<a onclick="delcaiji({$caiji['id']},this)"  class="btn btn-success hand">删除</a></td>
      </tr>
       	<!--{/loop}-->

    </tbody>
  </table>
  <div class="pages">$departstr</div>
  <p style="font-size:20px;color:red">勾选需要自动采集的规则项，采集过程不要关闭网页，数据在读写，容易终止</p>
  <div style="margin:10px auto">
  <span>采集时间间隔</span>
  <select id="timeset" style="width:80px">
  <option value="1">1</option>
    <option value="2">2</option>
      <option value="3">3</option>
        <option value="4">4</option>
          <option value="5">5</option>
            <option value="6">6</option>
              <option value="7">7</option>
               <option value="8">8</option>
                <option value="9">9</option>
                 <option value="10">10</option>
                  <option value="11">11</option>
                   <option value="12">12</option>
  </select>
  <span>小时</span>
  </div>
     <a class="btn btn-success" onclick="autocaiji()">挂机自动采集</a>
     <a class="btn btn-success" onclick="stopcaiji()">停止自动采集</a>
 <script src="{SITE_URL}static/css/bianping/js/common.js"></script>
 <script>
 var cancaiji=false;
 function delcaiji(id,target){
	 if(confirm("确认删除吗?")){
		 var myurl=g_site_url+"index.php?admin_autocaiji/del{$setting['seo_suffix']}";
		 function success(result){
			 if(result.msg='ok'){
				 alert("删除成功");
				 $(target).parent().parent().remove();
			 }else{
				 alert("删除失败");
			 }
		 }
		 var data={
				 id:id
		 }
		 ajaxpost(myurl,data,success);
	 }

 }
 function stopcaiji(){
	 cancaiji=false;
 }
 function CaijiGet(id,time,caijiwangzhi,liebiaoguize,yuming,bianma,target,tiwenshijian,huidashijian,category1,category2,category3,cid,ckabox,imgckabox,guize,daandesc,content,caiji_best,caiji_hdusername,caiji_hdusertx,atitle,caijitype){
	　　　　this.id = id;
	　       this.index = 0;
	　　　　this.time = time;
	　　　　this.caijiwangzhi = caijiwangzhi;
	           　this.liebiaoguize = liebiaoguize;
	          　this.bianma = bianma;
	          this.target = target;
	           this.yuming = yuming;
	          　this.tiwenshijian= tiwenshijian;
	         　this.huidashijian = huidashijian;
	        　this.category1 = category1;
	       　this.category2 = category2;
	      　this.category3 = category3;
	     　this.cid = cid;
	    　this.ckabox= ckabox;
	    　this.imgckabox = imgckabox;
	   　this.guize = guize;
	  　this.daandesc = daandesc;
	  　this.content = content;
	 　this.caiji_best = caiji_best;
	　this.caiji_hdusername = caiji_hdusername;
	　this.caiji_hdusertx = caiji_hdusertx;
	　this.atitle = atitle;
	　this.caijitype = caijitype;
	　　　　CaijiGet.prototype.gocaiji = function(){
		          var _self=this;

		             console.log("开始")
		             getquestionlist(id,caijiwangzhi,bianma,liebiaoguize,target,yuming,_self,atitle);

	　　　　};
	　　}
 var golisten=null;
 function autocaiji(){
	 if(cancaiji){alert("采集在进行...");return false;};
	 var _val=$("#timeset").val();

	 setcaijitast(_val);
	 if(golisten==null){
		  golisten=setInterval(function(){


	         setcaijitast(_val);
	         if(cancaiji==false){
	        	 clearInterval(golisten);
		         golisten=null;
	         }

	     },_val*3600*1000);
	 }



 }
 function setcaijitast(_val){
	 $("input[name='caiid[]']:checked").each(function(){
		 cancaiji=true;
		   var target=$(this);
		   target.parent().parent().find(".c_state").html("采集未开始");
			var caijiwangzhi=target.parent().find(".c_caiji_url").val();
			var liebiaoguize=target.parent().find(".c_caiji_prefix").val();
			var yuming=target.parent().find(".c_daanyuming").val();
			var bianma=target.parent().find(".c_bianma").val();
			var tiwenshijian=target.parent().find(".c_tiwenshijian").val();
			var huidashijian=target.parent().find(".c_huidashijian").val();
			var category1=target.parent().find(".c_category1").val();
			var category2=target.parent().find(".c_category2").val();
			var category3=target.parent().find(".c_category3").val();
			var cid=target.parent().find(".c_cid").val();
			var ckabox=target.parent().find(".c_ckabox").val();
			var imgckabox=target.parent().find(".c_imgckabox").val();
			var guize=target.parent().find(".c_guize").val();
			var daandesc=target.parent().find(".c_daandesc").val();
			var content=target.parent().find(".c_content").val();
			var caiji_best=target.parent().find(".c_caiji_best").val();
			var caiji_hdusername=target.parent().find(".c_caiji_hdusername").val();
			var caiji_hdusertx=target.parent().find(".c_caiji_hdusertx").val();
			var atitle=target.parent().find(".c_caiji_atitle").val();
			var caijitype=target.parent().find(".c_caijitype").val();
			 var cj = new CaijiGet(target.val(),_val*3600,caijiwangzhi,liebiaoguize,yuming,bianma,target.parent().parent().find(".c_jindu"),tiwenshijian,huidashijian,category1,category2,category3,cid,ckabox,imgckabox,guize,daandesc,content,caiji_best,caiji_hdusername,caiji_hdusertx,atitle,caijitype);
			 cj.gocaiji();
		 })
 }
//采集列表页面
function getquestionlist(id,tepurl,bianma,caiji_prefix,target,yuming,_self,atitle){


	if(cancaiji==false){
		  target.parent().parent().find(".c_state").html("采集终止..");
		return false;
	}


	 var autoint=0;
	 var myurl=g_site_url+"index.php?admin_autocaiji/ajaxpostpage{$setting['seo_suffix']}";

	var urlarr=new Array();
	if(atitle==1){
		atitle='true';
	}else{
		atitle='false';
	}

	$.ajax({
        type: "post",
         url: myurl,
         data:{'ckbox':atitle,'caiji_url':tepurl,'bianma':bianma,'caiji_prefix':caiji_prefix},
         dataType: "text",
         success: function (data) {
        	 if(data==null||data=='undefined'||data=='null'){
        		 target.html("没有采集到数据，检查[采集列表前面规则]是否正确");
        		 return false;
        	 }

        		var dataObj =eval("("+data+")");

    			$.each(dataObj,function(idx,item){
    				   var num=autoint+1;
    				   target.html("(0/"+num+")");
    				  target.parent().parent().find(".c_state").html("采集中...");
    				   urlarr.push(item);
    				   autoint++;
    				});

    			//递归采集
    			ajaxlist(id,urlarr,_self,target);
         },
         error: function (XMLHttpRequest, textStatus, errorThrown) {

       }
 });




}

//结束定时采集------

function ajaxlist(id,arrindexs,_self,target){
	if(cancaiji==false){
		 target.parent().parent().find(".c_state").html("采集终止..");
		return false;
	}
	  if(_self.index<arrindexs.length)
			{
			   var item=arrindexs[_self.index];
				  var title=item.title;

				  var tiwentime =_self.tiwenshijian;//提问时间
				  var huidatime =_self.huidashijian;//回答时间
					 var randclass='';

					 var value =_self.cid;
					 var value1 =_self.category1;
					 var value2 =_self.category2;
					 var value3 =_self.category3;

					 var uvalue ='1';// obj1.options[index].value;
					 var ckabox=_self.ckabox;//过滤回答超链接
					 var imgckabox=_self.imgckabox;//过滤图片

					 var utext ='admin';

					 var bianma =_self.bianma; //编码

					 var guize=_self.guize;//其它回答

					 var daanyuming=_self.yuming;//域名

					 var daandesc=_self.daandesc;//描述
					 var content=_self.content;//过滤内容

					 var daanbest=_self.caiji_best;//最佳答案

					 var caiji_hdusername=_self.caiji_hdusername;//用户名

					 var caiji_hdusertx=_self.caiji_hdusertx;//采集头像

					 var caiji_beginnum=1;

					 var caiji_endnum=1;


					 var dananurl=item.href;
					 if(dananurl.indexOf("http")<0)

					 {
						 dananurl=daanyuming+dananurl;

					 }


						  var myurl='';
						if(_self.caijitype=='1'){
							myurl=g_site_url+"index.php?admin_autocaiji/ajaxcaijiwz{$setting['seo_suffix']}";
						}else{
							myurl=g_site_url+"index.php?admin_autocaiji/ajaxcaiji{$setting['seo_suffix']}";
						}


				  $.ajax({
				    type: "post",
				    url: myurl,
				   async:false,
				    dataType:"text",
				     data:{'randclass':randclass,'huidatime':huidatime,'tiwentime':tiwentime,'caiji_hdusertx':caiji_hdusertx,'caiji_hdusername':caiji_hdusername,'title':title,'cid3':value3,'cid2':value2,'cid1':value1,'cid':value,'uid':uvalue,'username':utext,'daanurl':dananurl,'guize':guize,'bianma':bianma,'daandesc':daandesc,'daanbest':daanbest,'caiji_beginnum':caiji_beginnum,'caiji_endnum':caiji_endnum,'daanyuming':daanyuming,'imgckabox':imgckabox,'ckabox':ckabox,'content':content},

				     success: function (data) {

                  console.log(data);

				  	 _self.index=_self.index+1;

				  	 target.html("("+ _self.index+"/"+arrindexs.length+")");
				  	 target.parent().parent().find(".c_state").html("采集中....采集入库"+_self.index+"条");
				  	  setTimeout(function(){
				  		ajaxlist(id,arrindexs,_self,target);
				  	  },200);

				      },
				      error: function (XMLHttpRequest, textStatus, errorThrown) {
				           //  alert(errorThrown);

				     }
				    });
			}else{
				 target.parent().parent().find(".c_state").html("采集完成<i class='fa fa-check'></i>");
			}

}

 </script>
<!--{template footer}-->

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


    });
</script>
<script src="{SITE_URL}static/css/bianping/js/common.js"></script>