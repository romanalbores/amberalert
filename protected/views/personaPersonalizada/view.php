<?php
/* @var $this PersonaPersonalizadaController */
/* @var $model PersonaPersonalizada */

$this->breadcrumbs=array(
	'Persona Personalizadas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PersonaPersonalizada', 'url'=>array('index')),
	array('label'=>'Create PersonaPersonalizada', 'url'=>array('create')),
	array('label'=>'Update PersonaPersonalizada', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PersonaPersonalizada', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PersonaPersonalizada', 'url'=>array('admin')),
);
?>

<h1>View PersonaPersonalizada #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'apellido_paterno',
		'apellido_materno',
		'genero',
		'fecha_nacimiento',
		'estatus',
		'registrado_por',
		'fecha_registro',
		'modificado_por',
		'fecha_modificado',
		'eliminado',
	),
)); ?>
