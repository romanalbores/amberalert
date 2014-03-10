<?php
$this->breadcrumbs=array(
	'Tipo Relacion Victimas',
);

$this->menu=array(
array('label'=>'Create TipoRelacionVictima','url'=>array('create')),
array('label'=>'Manage TipoRelacionVictima','url'=>array('admin')),
);
?>

<h1>Tipo Relacion Victimas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
