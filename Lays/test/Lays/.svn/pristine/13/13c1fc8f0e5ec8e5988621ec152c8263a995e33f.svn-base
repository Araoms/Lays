<div class="user-header-info">
   <i class="ui-icon-set icon_setting"></i>
    <ul class="ui-row">
        <li class="ui-col ui-col-25">
            <div class="ui-avatar-lg">
                <span style="background-image:url({$user['avatar']})"></span>
            </div>
        </li>
        <li class="ui-col ui-col-75">
              <p>
       
                  <span class="ui-txt-highlight user-name">
                  {$user['username']}
                   {if $user['author_has_vertify']!=false}<i class="fa fa-vimeo {if $user['author_has_vertify'][0]=='0'}v_person {else}v_company {/if}  " data-toggle="tooltip" data-placement="right" title="" {if $user['author_has_vertify'][0]=='0'}data-original-title="个人认证" {else}data-original-title="企业认证" {/if} ></i>{/if}
                  </span>
              </p>

                <ul class="ui-user-tiled">
                    <li><div>{$user['answers']}</div><i>回答</i></li>
                    <li><div>{$user['questions']}</div><i>提问</i></li>
                    <li><div>{$user['followers']}</div><i>粉丝</i></li>
                 
                    <li><div>{$user['credit2']}</div><i>财富</i></li>
                      
                </ul>

        </li>
     
        </ul>
        

   
<script type="text/javascript">
$(".icon_setting").click(function(){
	 window.location.href="{url user/default/set}";
})


</script>
    

</div>