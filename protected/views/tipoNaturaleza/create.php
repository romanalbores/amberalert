<?php
$this->breadcrumbs=array(
	'Tipo Naturalezas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List TipoNaturaleza','url'=>array('index')),
array('label'=>'Manage TipoNaturaleza','url'=>array('admin')),
);
?>

<h1>Create TipoNaturaleza</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>