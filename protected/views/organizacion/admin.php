<?php
$this->breadcrumbs=array(
	'Organizaciones'=>array('index'),
	'Administrar',
);

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Nuevo','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('organizacion-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Administrar Organizaciones</h1>


</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'organizacion-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'nombre',
		'nombre_corto',
		'codigo',
		'descripcion',		
		/*'estatus',
		'registrado_por',
		'fecha_registro',
		'modificado_por',
		'fecha_modificado',
		'eliminado',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
