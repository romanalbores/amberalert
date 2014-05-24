<?php
$this->breadcrumbs=array(
	'Configuracion Dhs'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List ConfiguracionDH','url'=>array('index')),
array('label'=>'Create ConfiguracionDH','url'=>array('create')),
array('label'=>'Update ConfiguracionDH','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete ConfiguracionDH','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ConfiguracionDH','url'=>array('admin')),
);
?>

<h1>View ConfiguracionDH #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'configuracion_id',
		'id_dia',
		'hora_fin',
		'hora_inicio',
		'estatus',
		'eliminado',
),
)); ?>
