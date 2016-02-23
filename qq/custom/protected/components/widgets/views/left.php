    <style>
        .xuanzhong {
            background: none repeat scroll 0 0 #eee;
            border-bottom: 1px solid #ddd;
        }
    </style>
    <?php
        //获取控制器和action
        $controller = Yii::app()->controller->id;
        $action = Yii::app()->getController()->getAction()->id;
    ?>
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Navigation</a></div>
        
        <!--- Sidebar navigation -->
        <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
        <ul id="nav">
          <!-- Main menu with font awesome icon -->
          <li><a href="<?php echo Yii::app()->createUrl('Index/Index'); ?>" class="<?php echo $controller == 'index' ? 'open' : ''; ?>"><i class="icon-home"></i> 首页</a>
          </li>
          <li class="has_sub "><a href="javascript:;" id="site" class="<?php echo $controller == 'site' ? 'subdrop' : ''; ?>"><i class="icon-list-alt"></i> 我的网站 <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
            <ul>
                <li class="<?php echo $controller == 'site' && $action == 'Index' ? 'xuanzhong' :'';?>"><a href="<?php echo Yii::app()->createUrl('Site/Index') ?>">网站</a></li>
            </ul>
          </li>  
          <li class="has_sub"><a href="javascript:;" id="data" class="<?php echo Yii::app()->controller->id == 'data' ? 'subdrop' : ''; ?>"><i class="icon-table"></i> 统计信息  <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
            <ul>
              <li class="<?php echo $controller == 'data' && $action == 'Index' ? 'xuanzhong' :'';?>" ><a href="<?php echo Yii::app()->createUrl('Data/Index'); ?>">数据统计</a></li>
            </ul>
          </li> 
          <li class="has_sub"><a href="javascript:;" id="myInfo" class="<?php echo $controller == 'myInfo' ? 'subdrop' : ''; ?>"><i class="icon-file-alt"></i> 我的资料  <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
            <ul>
              <li class="<?php echo $controller == 'myInfo' && $action == 'Index' ? 'xuanzhong':'';?>"><a href="<?php echo Yii::app()->createUrl('MyInfo/Index'); ?>">个人信息设置</a></li>
            </ul>
          </li>                             
        </ul>
    </div>

    <script>
        $(function(){
            
            //默认展开
            var controller_id = $("#<?php echo $controller; ?>");
            if (controller_id.hasClass('subdrop')) {
                controller_id.next('ul').show();
            }
            
            $("#nav > li > a").on('click',function(e){
                if($(this).parent().hasClass("has_sub")) {
                  e.preventDefault();
                }   

                if(!$(this).hasClass("subdrop")) {
                  // hide any open menus and remove all other classes
                  $("#nav li ul").slideUp(350);
                  $("#nav li a").removeClass("subdrop");

                  // open our new menu and add the open class
                  $(this).next("ul").slideDown(350);
                  $(this).addClass("subdrop");
                }

                else if($(this).hasClass("subdrop")) {
                  $(this).removeClass("subdrop");
                  $(this).next("ul").slideUp(350);
                } 

            });
        })
    
    </script>