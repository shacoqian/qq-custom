<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>数据管理系统</title> 
  <meta name="keywords" content="数据管理系统" />
  <meta name="description" content="数据管理系统" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="">
  <!-- Stylesheets -->
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/font-awesome.css">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/style.css" rel="stylesheet">
  
  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/html5shim.js"></script>
  <![endif]-->

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/static/img/favicon/favicon.png">
</head>

<body>

<!-- Form area -->
<div class="admin-form">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <!-- Widget starts -->
            <div class="widget worange">
              <!-- Widget head -->
              <div class="widget-head">
                <i class="icon-lock"></i> 登录 
              </div>

              <div class="widget-content">
                <div class="padd">
                  <!-- Login form -->
                  <form class="form-horizontal" id="form" onsubmit="return false;">
                    <!-- Email -->
                    <div class="form-group">
                      <label class="control-label col-lg-3" for="inputEmail">邮箱</label>
                      <div class="col-lg-9">
                        <input type="text" name="uname" class="form-control" id="inputEmail" placeholder="Email">
                      </div>
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                      <label class="control-label col-lg-3" for="inputPassword">密码</label>
                      <div class="col-lg-9">
                        <input type="password" name="upass" class="form-control" id="inputPassword" placeholder="Password">
                      </div>
                    </div>

                    <div class="col-lg-9 col-lg-offset-2">
                            <button type="submit" class="btn btn-danger">登 录</button>
                            <button type="reset" class="btn btn-default">重 置</button>
                    </div>
                    <br />
                  </form>
				  
				</div>
                </div>
              
                <div class="widget-foot">
                  <!--Not Registred? <a href="#">Register here</a>-->
                </div>
            </div>  
      </div>
    </div>
  </div> 
</div>
	
		

<!-- JS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/bootstrap.js"></script>
<script>
$(function(){
    var $form = $("#form");
    $form.submit(function(){
        var $uname = $("input[name=uname]");
        if ($.trim($uname.val()) == '') {
            alert('用户名不能为空！');
            $uname.focus();
            return false;
        }
        var $upass = $("input[name=upass]");
        if ($.trim($upass.val()) == '') {
            alert('密码不能为空！');
            $upass.focus();
            return false;
        }
        var data = $form.serialize();
        $.post('<?php echo $this->createUrl('account/dologin');?>', data, function(data) {
            if (data['status'] == 1) {
                window.location.href='<?php echo Yii::app()->createUrl('index/index');?>';
            } else {
                alert(data['message']);
            }
        },'json')
    })
})
</script>
</body>
</html>