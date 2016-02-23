<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>接口测试</title>

    <!-- Bootstrap -->
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
  	<div class="container">
  		<h1 class="text-center" style="padding:50px 0;"><?php echo $data['title'];?></h1>
  		<div class="col-xs-3">
			<?php $this->beginWidget('application.components.widgets.TestLink');?>
			<?php $this->endWidget();?>
  		</div>
  		<div class="col-xs-8 col-xs-offset-1">
  			<div class="row">
		  		<form class="form-horizontal" role="form" method="<?php echo $data['method'];?>" action="<?php echo $this->createUrl($data['url']);?>">
		  		<?php foreach($data['field'] as $k=>$v):?>	
		  			<?php if ($v[0] == 1):?>
					  <div class="form-group">
					    <label for="<?php echo $k;?>" class="col-sm-2 control-label"><?php echo $v[1];?></label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control"  name="<?php echo $k;?>" id="<?php echo $k;?>" placeholder="<?php $v;?>" value="<?php echo $v[2];?>">
					    </div>
					  </div>
				  <?php endif;?>
				<?php endforeach;?>  
				  
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success">提交</button>
				    </div>
				  </div>
				</form>
			</div>
			<div class="row">
				<h2 class="text-center">返回结果</h2>
				<p>json</p>
				<div class="highlight">
					<pre>
						111111111111111;
					</pre>
				</div>
				<p>数组</p>
				<div class="highlight">
					<pre>
						111111111111111;
						22222222222222；
					</pre>
				</div>
			</div>
  		</div>
  	</div>

  </body>
</html>