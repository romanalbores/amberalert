<?php
$this->breadcrumbs=array(
	'Tipo Postes'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List TipoPoste','url'=>array('index')),
array('label'=>'Manage TipoPoste','url'=>array('admin')),
);
?>

<h1>Create TipoPoste</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>