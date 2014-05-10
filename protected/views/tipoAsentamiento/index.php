<?php
$this->breadcrumbs=array(
	'Tipo de Asentamiento',
);

$this->menu=array(
array('label'=>'Registrar','url'=>array('create')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>

<h1>Tipo de Asentamiento</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
