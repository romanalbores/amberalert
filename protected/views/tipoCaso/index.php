<?php
$this->breadcrumbs=array(
	'Tipo Casos',
);

$this->menu=array(
array('label'=>'Create TipoCaso','url'=>array('create')),
array('label'=>'Manage TipoCaso','url'=>array('admin')),
);
?>

<h1>Tipo Casos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
