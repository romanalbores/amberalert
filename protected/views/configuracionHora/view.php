<?php
$this->breadcrumbs=array(
	'Configuracion Horas'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List ConfiguracionHora','url'=>array('index')),
array('label'=>'Create ConfiguracionHora','url'=>array('create')),
array('label'=>'Update ConfiguracionHora','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete ConfiguracionHora','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ConfiguracionHora','url'=>array('admin')),
);
?>

<h1>View ConfiguracionHora #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'id_configuracion_dia',
		'hora_inicio',
		'hora_fin',
		'estatus',
		'fecha_registro',
		'registrado_por',
		'modificado_por',
		'fecha_modificado',
		'eliminado',
),
)); ?>
