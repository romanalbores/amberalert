<?php
/* @var $this RelacionVictimaSospechosoController */
/* @var $model RelacionVictimaSospechoso */

$this->breadcrumbs=array(
	'Relacion Victima Sospechosos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RelacionVictimaSospechoso', 'url'=>array('index')),
	array('label'=>'Create RelacionVictimaSospechoso', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#relacion-victima-sospechoso-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Relacion Victima Sospechosos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<div id="foto_victima">
    <?php
    $this->renderPartial("_fotoVictima")
    ?>
</div>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'relacion-victima-sospechoso-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
                'id_persona_victima',
		'id_incidencia',
		'id_persona_sospechoso',
		'id_tipo_relacion',
		'fecha_avistamiento',
		/*
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
		*/
		array(
                    'template'=>'{visualizacion}{poste}',
                    'class'=>'CButtonColumn',
                    "buttons"=>array(
                        'visualizacion' => array(
                            'label'=>'imagen',                            
                            //'url'=>'Yii::app()->createUrl("relacionVictimaSospechoso/visualizacion?id=$data[id]" )', //url de la acción nueva
                            'options'=>array(
                                //'onclick'=>"alert('asd')",
                                
                            ),
                        ),
                        'poste' => array(
                            'label'=>'Poste',
                            'imageUrl'=>Yii::app()->request->baseUrl.'/images/icons/ver2.png', //ruta icono para el botón						
                            'url'=>'Yii::app()->createUrl("relacionVictimaSospechoso/ubicacionPoste?id=$data[id]" )', //url de la acción nueva
                        ),
                    ),
                    
                        
                    
		),
	),
)); ?>
