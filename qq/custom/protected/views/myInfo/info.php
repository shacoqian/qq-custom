<!-- Page heading -->
    <?php $this->widget('application.components.widgets.PageHeader',array('pageTitle'=>$pageTitle));?>
<!-- Page heading ends -->
<div class="matter">
    <div class="container">

      <div class="row">

        <div class="col-md-12">

          <div class="widget wred">
            <div class="widget-head">
              <div class="pull-left">修改密码</div>
              <div class="widget-icons pull-right">
                <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                <a href="#" class="wclose"><i class="icon-remove"></i></a>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="widget-content">
              <div class="padd">

                <!-- Profile form -->

                    <div class="form profile password">
                      <!-- Edit profile form (not working)-->
                      <form class="form-horizontal" onsubmit="return false;">
                          <!-- Name -->
                          <div class="form-group">
                            <label class="control-label col-lg-3" for="oldpassword">旧密码</label>
                            <div class="col-lg-6">
                              <input type="password" class="form-control" name="oldpassword" id="oldpassword">
                            </div>
                          </div>   
                          <!-- Username -->
                          <div class="form-group">
                            <label class="control-label col-lg-3" for="newpass1">新密码</label>
                            <div class="col-lg-6">
                              <input type="password" class="form-control" name="newpass1" id="newpass1">
                            </div>
                          </div>
                          <!-- Password -->
                          <div class="form-group">
                            <label class="control-label col-lg-3" for="newpass2">确认密码</label>
                            <div class="col-lg-6">
                              <input type="password" class="form-control" name="newpass2" id="newpass2">
                            </div>
                          </div>

                          <!-- Buttons -->
                          <div class="form-group">
                             <!-- Buttons -->
                                    <div class="col-lg-6 col-lg-offset-1">
                                           <button type="submit" class="btn btn-success">提交</button>
                                           <button type="reset" class="btn btn-default">重置</button>
                                   </div>
                          </div>
                      </form>
                    </div>

              </div>
            </div>
              <script>
                  $(function(){
                      var regpass = /^.{6,20}$/;
                      function check_pass($obj,message) {
                          if ($.trim($obj.val()) == '') {
                              alert(message+'不能为空！');
                              $obj.focus();
                              return false;
                          }
                          
                          if ( ! regpass.test($obj.val())) {
                              alert(message+'必须为6到20个字符！');
                              $obj.focus();
                              return false;
                          }
                          return true;
                      }
                      
                      var $passform = $(".password");
                      $passform.submit(function(){
                          var oldpassword = $(this).find('input[name=oldpassword]');
                          var newpass1 = $(this).find('input[name=newpass1]');
                          var newpass2 = $(this).find('input[name=newpass2]');
                          
                          if ( ! check_pass(oldpassword, '旧密码')) {
                              return false;
                          }
                          
                          if ( ! check_pass(newpass1, '新密码')) {
                              return false;
                          }
                          
                          if ( ! check_pass(newpass2, '确认密码')) {
                              return false;
                          }
                          
                          if (newpass1.val() != newpass2.val()) {
                              alert('两次密码不一样！');
                              newpass1.focus();
                              return false;
                          }
                          
                          $.post('<?php echo $this->createUrl('Myinfo/Editpass');?>',{oldpassword:oldpassword.val(), newpass1:newpass1.val(), newpass2:newpass2.val()},function(data){
                              if (data['status'] == 1) {
                                  alert(data['message']);
                                  newpass1.val('');
                                  newpass2.val('');
                              } else if (data['status'] == 0) {
                                  alert(data['message']);
                                  newpass1.val('');
                                  newpass2.val('');
                                  return false;
                              }
                          },'json');
                          
                      })
                  })
              </script>
          </div>  

        </div>

      </div>

    </div>
</div>