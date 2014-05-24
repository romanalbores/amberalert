<?php
$this->breadcrumbs=array(
	'Configuracion Postes',
);

$this->menu=array(
array('label'=>'Create ConfiguracionPoste','url'=>array('create')),
array('label'=>'Manage ConfiguracionPoste','url'=>array('admin')),
);
?>

<h1>Configuracion Postes</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
