
<div class="row">
<div class="col-md-24 text-center" style="font-size:13px;color:#41C074;margin-bottom:30px;">
此回答需要付费{$answer['reward']}元查看
</div>

</div>

<div class="row text-center">
<input type="hidden" value="{$answer['id']}" id="txt_answerid" />

<button class="btn-dashang btn btn-success">付费偷看</button>
<img src="" class="dasahngqrcode" />
</div>
<script>
$('[data-toggle="tooltip"]').tooltip('hide');


$(".btn-dashang").click(function(){
	

	
		
	
		    var _answerid=$("#txt_answerid").val();
		  
		   
		    
		   $.ajax({
		        //提交数据的类型 POST GET
		        type:"POST",
		        //提交的网址
		        url:"{SITE_URL}/?question/postanswerreward",
		        //提交的数据
		        data:{answerid:_answerid},
		        //返回数据的格式
		        datatype: "text",//"xml", "html", "script", "json", "jsonp", "text".

		        //成功返回之后调用的函数
		        success:function(data){
		          
		        	data=$.trim(data);
		        	if(data==-2){
		        		alert('游客先登录!');
		        	}
		        	if(data==-1){
		        		alert('此问题不需要付费!');
		        	}
		        	if(data==2){
		        		alert('此问题您已经付费过了!');
		        	}
		        	if(data==0){
		        		alert('账户余额不足，先充值!');
		        	}
		        	if(data==1){
		        		window.location.reload();
		        	}
		        }   ,
		       
		        //调用出错执行的函数
		        error: function(){
		            //请求出错处理
		        }
		    });
	
})
</script>