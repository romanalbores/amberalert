<?php
/* @var $this PersonaPersonalizadaController */
/* @var $model PersonaPersonalizada */

$this->breadcrumbs=array(
	'Persona Personalizadas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PersonaPersonalizada', 'url'=>array('index')),
	array('label'=>'Create PersonaPersonalizada', 'url'=>array('create')),
	array('label'=>'View PersonaPersonalizada', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PersonaPersonalizada', 'url'=>array('admin')),
);
?>

<h1>Update PersonaPersonalizada <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>