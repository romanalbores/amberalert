
<!DOCTYPE html>
<html lang="en">
    <head>
	 
    <meta charset="utf-8">
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="description" content="Creative Web Typography Styles - Having fun with text styles and effects" />
        <meta name="keywords" content="css3, typography, styles, letters, creative, effects, transitions, animations" />
        <meta name="author" content="Codrops" />
		
<link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/inspector-stylesheet.css" />
        <link rel="shortcut icon" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/../favicon.ico"> 
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/demo.css" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
		<link href='<?php echo Yii::app()->theme->baseUrl; ?> http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300|Sancreek|Raleway:100' rel='stylesheet' type='text/css' />
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.backstretch.min.js"></script>
         <script type="text/javascript">
	$.backstretch("<?php echo Yii::app()->theme->baseUrl; ?>/bg/fondo.png");
</script>
	  </head>
  <body>


<div class="container">
						 	<!--'brand' => '<img src="'.Yii::app()->theme->baseUrl . '/bg/1l.png  ">', -->
			<!-- Codrops top bar -->
            <div class="codrops-top">
				
					 <nav class="cl-effect-12">	
					 
                <?php
             $this->widget(
                    'bootstrap.widgets.TbNavbar', array(
					
				 'brand' => 'Amber Alert',
                'collapse' => true,
                'fixed' => true,
                'items' => array(
                    array(
                        'class' => 'bootstrap.widgets.TbMenu',
                        'activateParents'=>false,
                        'items' => array(
                            array('label' => 'Registrar Incidencia', 'url' => array('/Incidencia/Create'), 'visible' => !Yii::app()->user->isGuest),
                            array(
                                'label' => 'Configuración de Alertas',
                                'url' => array('/site/index'),
                                'linkOptions' => array('id' => 'menuAlerta'),
                                'itemOptions' => array('id' => 'itemAlerta'),
                                'items' => array(
                                    array('label' => 'Incidencia', 'url' => array('/Incidencia')),
                                    array('label' => 'Configuración de Alertas', 'url' => array('/Configuracion')),
                                    array('label' => 'Personas Registradas', 'url' => array('/Persona')),
                                ), 'visible' => !Yii::app()->user->isGuest),
                            array(
                                'label' => 'Catálogos',
                                'url' => array('/site/index'),
                                'linkOptions' => array('id' => 'menuCatalogos'),
                                'itemOptions' => array('id' => 'itemCatalogos'),
                                'items' => array(
                                    array(
                                        'label' => 'Dirección',
                                        'url' => array('/site/index'),
                                        'linkOptions' => array('id' => 'menuDireccion'),
                                        'itemOptions' => array('id' => 'itemDireccion'),
                                        'items' => array(
                                            array('label' => 'País', 'url' => array('/Pais')),
                                            array('label' => 'Estados', 'url' => array('/Estado')),
                                            array('label' => 'Municipios', 'url' => array('/Municipio')),
                                            array('label' => 'Localidades', 'url' => array('/Localidad')),                                            
                                            array('label' => 'Asentamientos', 'url' => array('/Asentamiento')),
                                            array('label' => 'Direcciones', 'url' => array('/Direccion')),
                                            array('label' => 'Tipo Asentamiento', 'url' => array('/TipoAsentamiento')),
                                        )),
                                    array(
                                        'label' => 'Sistema',
                                        'url' => array('/site/index'),
                                        'linkOptions' => array('id' => 'menuSistema'),
                                        'itemOptions' => array('id' => 'itemSistema'),
                                        'items' => array(
                                            array('label' => 'Tipo de Caso Particular', 'url' => array('/CasoParticular')),
                                            array('label' => 'Tipo de Naturaleza', 'url' => array('/TipoNaturaleza')),
                                            array('label' => 'Tipo de Relación Victima', 'url' => array('/TipoRelacionVictima')),                                            
                                            array('label' => 'Tipo Vehiculo', 'url' => array('/TipoVehiculo')),
                                            array('label' => 'Tipo de Poste', 'url' => array('/TipoPoste')),
                                        )),
                                    array('label' => 'Días de la Semana', 'url' => array('/Dia')),
                                    array('label' => 'Ubicación de Postes', 'url' => array('/Poste')),
                                ), 'visible' => !Yii::app()->user->isGuest),
                            array(
                                'label' => 'Organización',
                                'url' => array('/site/index'),
                                'linkOptions' => array('id' => 'menuOrganizacion'),
                                'itemOptions' => array('id' => 'itemOrganizacion'),
                                'items' => array(
                                    array('label' => 'Organización', 'url' => array('/Organizacion')),
                                    array('label' => 'Oficina', 'url' => array('/Oficina')),
                                    array('label' => 'Departamento', 'url' => array('/Departamento')),
                                    array('label' => 'Regiones', 'url' => array('/Region')),
                                    array('label' => 'Zonas', 'url' => array('/Zona')),
                                    array('label' => 'Roles de Empleado', 'url' => array('/Rol')),
                                    array('label' => 'Empleados', 'url' => array('/Empleado')),
                                ), 'visible' => !Yii::app()->user->isGuest),
                            array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                        
						)
                    )
                )
                    )
            );
            ?>
            
			 </div> 				
	      	
					
			  
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
			<section class="main">
				
				<section class="color-5">
				  		
				            
				</nav>
				
	
				
				
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