<!-- Page heading -->
    <?php $this->widget('application.components.widgets.PageHeader',array('pageTitle'=>$pageTitle));?>
<!-- Page heading ends -->
<div class="matter">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <div class="widget">
            <div class="widget-foot" >
                <form id="form1">
                    <div class="uni pull-right">
                        <select id="custom_status" name="custom_status" class="form-control">
                            <option value="-1">筛选客户状态</option>
                            <?php foreach($custom_status as $k => $v):?>
                                <option value="<?php echo $k;?>" <?php echo $status == $k ? 'selected':'';?> ><?php echo $v;?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>      
                  <div class="uni pull-right">
                    <select id="domain_id" name="domain_id" class="form-control">
                    <?php if ($domains !== null):?>
                        <?php foreach($domains as $domain):?>
                        <option value="<?php echo $domain->id; ?>" <?php echo $domain_id == $domain->id ? 'selected' :'';  ?> ><?php echo $domain->domain; ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </select>
                  </div>
                  <div class="clearfix"></div> 
                </form>
            </div>  
            <div class="widget-head">
              <div class="pull-left">数据</div>
              <div class="widget-icons pull-right">
                <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                <a href="#" class="wclose"><i class="icon-remove"></i></a>
              </div>  
              <div class="clearfix"></div>
            </div>
            <div class="widget-content medias">

              <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      
                      <th>qq</th>
                      <th>昵称</th>
                      <th>城市</th>
                      <th>时间</th>
                      <th>网络</th>
                      <th>访问次数</th>
                      <th width="150px;">客户状态</th>
                      <th>操作</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if ($lists !== null): ?>
                      <?php foreach($lists as $list): ?>
                        <tr>

                          <td><?php echo $list['qq']; ?></td>
                          <td><?php echo $list['nick']; ?></td>
                          <td><?php echo $list['city']; ?></td>
                          <td><?php echo date('Y-m-d H:i:s',$list['ctime']); ?></td>
                          <td><?php echo $list['isp']; ?></td>
                          <td><?php echo $list['clicks']; ?></td>
                          <td>
                              <select class="c_status form-control" id="<?php echo $list['id']; ?>" name="c_status">
                                  <?php foreach($custom_status as $k => $v):?>
                                  <option value="<?php echo $k; ?>" <?php echo $k == $list['c_status']?'selected':'';?> ><?php echo $v; ?></option>
                                  <?php endforeach; ?>
                              </select>
                              
                              <!--<button class="btn btn-xs btn-default"><i class="icon-pencil"></i> </button>-->
                              <!--<button class="btn btn-xs btn-danger"><i class="icon-remove"></i> </button>-->

                          </td>
                          <td>
                              <a href="tencent://message/?uin=<?php echo $list['qq'];?>"><img src="http://wpa.qq.com/pa?p=2:<?php echo $list['qq'];?>:4"></a>
                              <button class="btn btn-xs btn-success button_sendmail">发送邮件 </button>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                  <?php else: ?>      
                      当前没有任何数据
                  <?php endif; ?>

                  </tbody>
                </table>

                
                    <?php $this->widget('application.components.widgets.Pages', array('pages' => $pages)); ?>
                    

                  <div class="clearfix"></div> 

                </div>

            </div>
          </div>  

        </div>
      </div>
    </div>
</div>
<script>
    
    $(function(){
        var $form1 = $("#form1");
        var $domain_id = $("#domain_id");
        var $custom_status = $("#custom_status");
        $domain_id.change(function(){
            $form1.trigger('submit');
        });
        $custom_status.change(function(){
            $form1.trigger('submit');
        });
        
        //更改客户状态
        var $c_status = $(".c_status");
        $c_status.change(function(){
            var id = $(this).attr('id');
            var c_status = $(this).val();
            $.post("<?php echo $this->createUrl('Data/ChangeStatus');?>", {id:id, c_status:c_status}, function(data){
                if (data['status'] == 1) {
                    alert(data['message']);
                } else if (data['status'] == 0) {
                    alert(data['message']);
                } else {
                    alert('网络繁忙，请稍后重试！');
                }
            },'json');
        });
        
        //发送邮件
        $sendmail = $('.sendmail'),
        $button_sendmail = $('.button_sendmail'),
        $queding = $sendmail.find('.queding'),
        $qq = $sendmail.find('input[name=qq]'),
        $title = $sendmail.find('input[name=title]'),
        $content = $sendmail.find('[name=content]'),
        $sendName = $sendmail.find('[name=sendName]')
        
        $button_sendmail.click(function(){
           $queding.removeAttr('disabled');
           var qq = $(this).parents('tr').find('td').eq(0).html();
           var nick = $(this).parents('tr').find('td').eq(1).html();
           $sendmail.find('.modal-header').html('给&nbsp;'+nick+'&nbsp;发送邮件');
           $qq.val(qq + '@qq.com');
           $title.val('');
           $content.val('');
           $sendmail.modal('show');          
        });
        
        $queding.click(function(){
            if ($.trim($title.val()) == '') {
                alert('邮件标题不能为空！');
                $title.focus();
                return false;
            }
            
            if ( $.trim($content.val()) == '') {
                alert('邮件内容不能为空！');
                $content.focus();
                return false;
            }
            $(this).attr('disabled','disabled');
            $.post("<?php echo $this->createUrl('Data/Send');?>", {qq:$qq.val(), title:$title.val(), content:$content.val(),sendName:$sendName.val()}, function(data){
                if (data['status'] == 1) {
                    alert(data['message']);
                    $sendmail.modal('hide');
                } else if (data['status'] == 0) {
                    alert(data['message']);
                    $queding.removeAttr('disabled');
                } else {
                    alert('网络繁忙，请稍后重试！');
                    $queding.removeAttr('disabled');
                }
            },'json');
            
        });
        
    })
    
</script>

<div class="modal fade sendmail" tabindex="-2" role="dialog2" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form class="form-horizontal" role="form" >
                <div class="modal-header">
                    
                </div>
                
                <div class="form-group" style="padding-top:10px;">
                    <label for="input-invite-code" class="pad-r-2 col-sm-4 control-label text-muted">Email：</label>
                    <div class="col-sm-8 pad-l-2">
                        <input type="text" class="form-control input-sm" name="qq" readonly>
                    </div>
                </div>
                
                <div class="form-group" style="padding-top:10px;">
                    <label for="input-invite-code" class="pad-r-2 col-sm-4 control-label text-muted">发件人邮箱：</label>
                    <div class="col-sm-8 pad-l-2">
                        <input type="text" class="form-control input-sm" id="sendName" name="sendName" placeholder="发件人邮箱">
                    </div>
                </div>
                
                <div class="form-group" style="padding-top:10px;">
                    <label for="input-invite-code" class="pad-r-2 col-sm-4 control-label text-muted">邮件主题：</label>
                    <div class="col-sm-8 pad-l-2">
                        <input type="text" class="form-control input-sm" id="title" name="title" placeholder="邮件主题">
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-invite-code" class="pad-r-2 col-sm-4 control-label text-muted">邮件内容：</label>
                    <div class="col-sm-8 pad-l-2">
                        <textarea class="form-control input-sm" name="content" placeholder="邮件内容"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm queding">确定</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>
                </div>
            </form>
        </div>
    </div>
</div>
