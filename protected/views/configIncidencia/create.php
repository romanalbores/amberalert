<?php
$this->breadcrumbs=array(
	'Configuracion Postes'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ConfiguracionPoste','url'=>array('index')),
array('label'=>'Manage ConfiguracionPoste','url'=>array('admin')),
);
?>

<h1>Create ConfiguracionPoste</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>