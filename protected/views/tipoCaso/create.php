<?php
$this->breadcrumbs=array(
	'Tipo Casos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List TipoCaso','url'=>array('index')),
array('label'=>'Manage TipoCaso','url'=>array('admin')),
);
?>

<h1>Create TipoCaso</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>