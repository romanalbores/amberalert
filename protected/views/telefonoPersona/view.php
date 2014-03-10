<?php
$this->breadcrumbs=array(
	'Telefono Personas'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List TelefonoPersona','url'=>array('index')),
array('label'=>'Create TelefonoPersona','url'=>array('create')),
array('label'=>'Update TelefonoPersona','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete TelefonoPersona','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TelefonoPersona','url'=>array('admin')),
);
?>

<h1>View TelefonoPersona #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'id_telefono',
		'id_persona',
		'estatus',
		'registrado_por',
		'fecha_registro',
		'modificado_por',
		'fecha_modificado',
		'eliminado',
),
)); ?>
