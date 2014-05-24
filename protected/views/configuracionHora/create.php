<?php
$this->breadcrumbs=array(
	'Configuracion Horas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ConfiguracionHora','url'=>array('index')),
array('label'=>'Manage ConfiguracionHora','url'=>array('admin')),
);
?>

<h1>Create ConfiguracionHora</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>