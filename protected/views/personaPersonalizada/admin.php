<?php
/* @var $this PersonaPersonalizadaController */
/* @var $model PersonaPersonalizada */

$this->breadcrumbs=array(
	'Persona Personalizadas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PersonaPersonalizada', 'url'=>array('index')),
	array('label'=>'Create PersonaPersonalizada', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#persona-personalizada-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Persona Personalizadas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'persona-personalizada-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		'apellido_paterno',
		'apellido_materno',
		'genero',
		'fecha_nacimiento',
		/*
		'estatus',
		'registrado_por',
		'fecha_registro',
		'modificado_por',
		'fecha_modificado',
		'eliminado',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
