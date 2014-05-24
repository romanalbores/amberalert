<?php
$this->breadcrumbs=array(
	'Configuracion Dhs',
);

$this->menu=array(
array('label'=>'Create ConfiguracionDH','url'=>array('create')),
array('label'=>'Manage ConfiguracionDH','url'=>array('admin')),
);
?>

<h1>Configuracion Dhs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
