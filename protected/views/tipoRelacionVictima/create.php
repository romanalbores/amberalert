<?php
$this->breadcrumbs=array(
	'Tipo Relacion Victimas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List TipoRelacionVictima','url'=>array('index')),
array('label'=>'Manage TipoRelacionVictima','url'=>array('admin')),
);
?>

<h1>Create TipoRelacionVictima</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>