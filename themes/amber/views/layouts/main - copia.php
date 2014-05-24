<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="description" content="Creative Web Typography Styles - Having fun with text styles and effects" />
        <meta name="keywords" content="css3, typography, styles, letters, creative, effects, transitions, animations" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/../favicon.ico"> 
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/demo.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
		<link href='<?php echo Yii::app()->theme->baseUrl; ?> http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300|Sancreek|Raleway:100' rel='stylesheet' type='text/css' />
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?> /js/modernizr.custom.79639.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/normalize1.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?> /css/demo1.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/component1.css" />
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/modernizr.custom1.js"></script>		
		<!--[if lte IE 8]><style>.support-note .note-ie{display:block;}</style><![endif]-->
    </head>
    <body>
        <div class="container">
		
			<!-- Codrops top bar -->
            <div class="codrops-top">
			<IMG SRC="<?php echo Yii::app()->theme->baseUrl; ?>/css/logo-amber.png" >
			
                <a href="">
                    <strong>&laquo; ALERTA AMBER: </strong>Sistema de Notificaciones de Alertas
                </a>
                
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
			<section class="main">
				
				<section class="color-5">
				<nav class="cl-effect-12">
				
			<?php
				$this->breadcrumbs=array('Incidencias',);

				$this->menu=array(array('label'=>'Create Incidencia','url'=>array('create')),array('label'=>'Manage Incidencia','url'=>array('admin')),);
?>
		<!-- 
				<a href='$this->widget('bootstrap.widgets.TbListView',array('dataProvider'=>$dataProvider,'itemView'=>'_view',))' 
		-->
			<?php
			$this->widget('bootstrap.widgets.TbListView',array('dataProvider'=>$dataProvider,'itemView'=>'_view',));
				echo "<a href='#' > Registrar Incidencia </a>";
			?>  
					<a href="#">Config. Alertas</a>
					<a href="#">Catalogos</a>
					<a href="#">Organizacion</a>
					<a href="#"> Login</a>
				</nav>
				
	
				<h2 class="cs-text">
					
					<span class="cs-text-cut">ALERTA</span>
					<span class="cs-text-mid">a m b e r</span> 
					<span class="cs-text-cut">ALERTA</span>
					
				</h2>
				
			</section>
			 <center>
			<div class="mainwrap">
            <div class="content">
                
                <?php echo $content; ?>
				<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div>
            </div> </center>
  

       </div>
               
               
            </div>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.lettering.js"></script>
		<script>
			$(document).ready(function() {
				$(".cs-text-cut").lettering('words');
			});
		
		</script>
		
    </body>
</html>