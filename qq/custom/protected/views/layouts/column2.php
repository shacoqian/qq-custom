<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/bootstrap.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/common.css" media="print" />
	 <!--[if lt IE 9]>
	 <script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/html5.js"></script>
	 <![endif]–->

	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/login.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/reg.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<header>
    <div class="wrapper">
        <div class="head-logo"></div>
        <div class="head-title">物业登录</div>
    </div>
</header>
<div class="banner">
    <?php echo $content; ?>
</div>



<footer>

    <ul class="wrap footer-nav">
        <li><a target="_blank" href="http://shanghai.haowu.com/show/1/view.html">关于我们</a></li>
        <li><a target="_blank" href="http://shanghai.haowu.com/show/2/view.html">人才招聘</a></li>
        <li><a target="_blank" href="http://shanghai.haowu.com/show/3/view.html">服务声明</a></li>
        <li><a target="_blank" href="http://shanghai.haowu.com/show/4/view.html">友情链接</a></li>
        <li><a target="_blank" href="http://shanghai.haowu.com/help/login">常见问题</a></li>
        <li><a target="_blank" href="http://shanghai.haowu.com/show/6/view.html">网站地图</a></li>
        <li class="footer-nav-last"><a target="_blank" href="http://shanghai.haowu.com/show/7/view.html">联系我们</a></li>
    </ul>
    <p class="copyright">&copy;&nbsp;产品由好屋中国开发&nbsp;&nbsp;&nbsp;服务热线：400-180-8116</p>

</footer>


<div aria-hidden="true" aria-labelledby="mySmallModalLabel" role="dialog" tabindex="-1" class="modal fade bs-example-modal-mm" style="display: none;">
    <div class="modal-dialog modal-mm">
        <div class="modal-content">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body">

                <table>
                    <tr>
                        <th><img src="<?php echo Yii::app()->request->baseUrl; ?>/static/images/haowulogo-card.jpg"></th>
                        <td>
                            <p>请拨打客服电话：021-5323232</p>
                            <p>或发邮件至：product@haowu.com</p>
                            <p>进行密码重置操作</p>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js//bootstrap.js"></script>
</body>
</html>
