<?php
$this->breadcrumbs=array(
	'Tipo Casos'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List TipoCaso','url'=>array('index')),
array('label'=>'Create TipoCaso','url'=>array('create')),
array('label'=>'Update TipoCaso','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete TipoCaso','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TipoCaso','url'=>array('admin')),
);
?>

<h1>View TipoCaso #<?php echo $model->id; ?></h1>

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
