<?php
$this->breadcrumbs=array(
	'Caso Particulars'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List CasoParticular','url'=>array('index')),
array('label'=>'Manage CasoParticular','url'=>array('admin')),
);
?>

<h1>Create CasoParticular</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>