<?php
$this->breadcrumbs=array(
	'Tipo Alertas'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List TipoAlerta','url'=>array('index')),
array('label'=>'Create TipoAlerta','url'=>array('create')),
array('label'=>'Update TipoAlerta','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete TipoAlerta','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TipoAlerta','url'=>array('admin')),
);
?>

<h1>View TipoAlerta #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
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
