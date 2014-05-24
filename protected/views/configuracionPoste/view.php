<?php
$this->breadcrumbs=array(
	'Configuracion Postes'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List ConfiguracionPoste','url'=>array('index')),
array('label'=>'Create ConfiguracionPoste','url'=>array('create')),
array('label'=>'Update ConfiguracionPoste','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete ConfiguracionPoste','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ConfiguracionPoste','url'=>array('admin')),
);
?>

<h1>View ConfiguracionPoste #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'id_incidencia',
		'id_configuracion',
		'id_poste_direccion',
		'estatus',
		'registrado_por',
		'fecha_registro',
		'modificado_por',
		'fecha_modificado',
		'eliminado',
),
)); ?>
