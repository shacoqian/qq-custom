<!-- Page heading -->
    <?php $this->widget('application.components.widgets.PageHeader',array('pageTitle'=>$pageTitle));?>
<!-- Page heading ends -->
<div class="matter">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <div class="widget">
            <div class="widget-head">
              <div class="pull-left">网站列表</div>
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
                     
                      <th>网站域名</th>
                      <th>状态</th>
                      <th>添加时间</th>
                      <th>到期时间</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($sites as $site): ?>
                    <tr>
                      
                      <td><?php echo $site->domain; ?></td>
                      <td><?php echo $site->status == 1 ? '启用' :'停用'; ?></td>
                      <td><?php echo date('Y-m-d H:i:s', $site->ctime); ?></td>
                      <td><?php echo $site->endtime; ?></td>

                    </tr>
                  <?php endforeach; ?>  

                        

                  </tbody>
                </table>
            </div>
          </div>  

        </div>
      </div>
    </div>
</div>