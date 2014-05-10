<?php
/* @var $this PosteController */
/* @var $model Poste */

$this->breadcrumbs=array(
	'Postes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Poste', 'url'=>array('index')),
	array('label'=>'Create Poste', 'url'=>array('create')),
	array('label'=>'Update Poste', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Poste', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Poste', 'url'=>array('admin')),
);
?>

<h1>View Poste #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_tipo_poste',
		'nombre',
		'nombre_corto',
		'codigo',
		'descripcion',
		'estatus',
		'registrado_por',
		'fecha_registro',
		'modificado_por',
		'fecha_modificado',
		'eliminado',
	),
)); ?>
