  <div class="navbar navbar-fixed-top bs-docs-nav" role="banner">
  
    <div class="conjtainer">
      <!-- Menu button for smallar screens -->
      <div class="navbar-header">
		  <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
			<span>Menu</span>
		  </button>
		  <!-- Site name for smallar screens -->
		  <a href="index.html" class="navbar-brand hidden-lg">MacBeth</a>
		</div>
      
      

      <!-- Navigation starts -->
      <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">         

        <ul class="nav navbar-nav">  

          <!-- Upload to server link. Class "dropdown-big" creates big dropdown -->
          <li class="dropdown dropdown-big">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-success"><i class="icon-cloud-upload"></i></span> QQ访客管理系统</a>
          </li>
        </ul>

       
       
        <!-- Links -->
        <ul class="nav navbar-nav pull-right">
          <li class="dropdown pull-right">            
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="icon-user"></i> <?php echo Yii::app()->session['data']['uname'];?> <b class="caret"></b>              
            </a>
            
            <!-- Dropdown menu -->
            <ul class="dropdown-menu">
              <!--<li><a href="#"><i class="icon-user"></i> Profile</a></li>-->
              <!--<li><a href="#"><i class="icon-cogs"></i> Settings</a></li>-->
                <li><a href="<?php echo Yii::app()->createUrl('account/loginout'); ?>"><i class="icon-off"></i> 登出</a></li>
            </ul>
          </li>
          
        </ul>
      </nav>

    </div>
  </div>

   <header>
    <div class="container">
      抓取已经恢复  2014-12-23
    </div>
  </header>
