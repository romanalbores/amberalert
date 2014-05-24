<?php
$this->breadcrumbs=array(
	'Configuracion Dhs'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ConfiguracionDH','url'=>array('index')),
array('label'=>'Manage ConfiguracionDH','url'=>array('admin')),
);
?>

<h1>Create ConfiguracionDH</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>