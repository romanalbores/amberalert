<?php
/* @var $this PersonaPersonalizadaController */
/* @var $model PersonaPersonalizada */

$this->breadcrumbs=array(
	'Persona Personalizadas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PersonaPersonalizada', 'url'=>array('index')),
	array('label'=>'Manage PersonaPersonalizada', 'url'=>array('admin')),
);
?>

<h1>Create PersonaPersonalizada</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>