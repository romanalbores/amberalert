<?php
$this->breadcrumbs=array(
	'Caso Particulars',
);

$this->menu=array(
array('label'=>'Create CasoParticular','url'=>array('create')),
array('label'=>'Manage CasoParticular','url'=>array('admin')),
);
?>

<h1>Caso Particulars</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
