<?php
/* @var $this RelacionVictimaSospechosoController */
/* @var $model RelacionVictimaSospechoso */

$this->breadcrumbs=array(
	'Relacion Victima Sospechosos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List RelacionVictimaSospechoso', 'url'=>array('index')),
	array('label'=>'Create RelacionVictimaSospechoso', 'url'=>array('create')),
	array('label'=>'Update RelacionVictimaSospechoso', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete RelacionVictimaSospechoso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RelacionVictimaSospechoso', 'url'=>array('admin')),
);
?>

<h1>View RelacionVictimaSospechoso #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_persona_victima',
		'id_incidencia',
		'id_persona_sospechoso',
		'id_tipo_relacion',
		'fecha_avistamiento',
		'presuncion_patria_protestad',
		'disputa_patria_protestad',
		'intento_previo_sustraccion',
		'fecha_intento',
		'descripcion',
		'estatus',
		'registrado_por',
		'fecha_registro',
		'modificado_por',
		'fecha_modificado',
		'eliminado',
	),
)); ?>
