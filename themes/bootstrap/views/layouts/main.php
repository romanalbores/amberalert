<!DOCTYPE html>
<html lang="<?php echo Yii::app()->language; ?>">
    <head>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta charset="<?php echo Yii::app()->charset; ?>">        
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl ?>/css/reset_bootstrap.css" />
    </head>
    <body>
        <header>
            <?php
            //$this->widget('application.extensions.menu_bootstrap.menu',array("id_menu"=>3));
            $this->widget(
                    'bootstrap.widgets.TbNavbar', array(
                'brand' => 'Amber Alert',
                'collapse' => true,
                'fixed' => true,
                'items' => array(
                    array(
                        'class' => 'bootstrap.widgets.TbMenu',
                        'activateParents'=>false,
                        'items' => array(
                            array('label' => 'Registrar Incidencia', 'url' => array('/Incidencia/Create'), 'visible' => !Yii::app()->user->isGuest),
                            array(
                                'label' => 'Configuración de Alertas',
                                'url' => array('/site/index'),
                                'linkOptions' => array('id' => 'menuAlerta'),
                                'itemOptions' => array('id' => 'itemAlerta'),
                                'items' => array(
                                    array('label' => 'Incidencia', 'url' => array('/Incidencia')),
                                    array('label' => 'Configuracón de Alertas', 'url' => array('/Configuracion')),
                                    array('label' => 'Personas Registradas', 'url' => array('/Persona')),
                                ), 'visible' => !Yii::app()->user->isGuest),
                            array(
                                'label' => 'Catálogos',
                                'url' => array('/site/index'),
                                'linkOptions' => array('id' => 'menuCatalogos'),
                                'itemOptions' => array('id' => 'itemCatalogos'),
                                'items' => array(
                                    array(
                                        'label' => 'Dirección',
                                        'url' => array('/site/index'),
                                        'linkOptions' => array('id' => 'menuDireccion'),
                                        'itemOptions' => array('id' => 'itemDireccion'),
                                        'items' => array(
                                            array('label' => 'País', 'url' => array('/Pais')),
                                            array('label' => 'Estados', 'url' => array('/Estado')),
                                            array('label' => 'Municipios', 'url' => array('/Municipio')),
                                            array('label' => 'Localidades', 'url' => array('/Localidad')),
                                            array('label' => 'Direcciones', 'url' => array('/Direccion')),
                                        )),
                                    array(
                                        'label' => 'Sistema',
                                        'url' => array('/site/index'),
                                        'linkOptions' => array('id' => 'menuSistema'),
                                        'itemOptions' => array('id' => 'itemSistema'),
                                        'items' => array(
                                            array('label' => 'Tipo de Caso Particular', 'url' => array('/CasoParticular')),
                                            array('label' => 'Tipo de Naturaleza', 'url' => array('/TipoNaturaleza')),
                                            array('label' => 'Tipo de Relación', 'url' => array('/TipoRelacion')),
                                            array('label' => 'Tipo Vehiculo', 'url' => array('/TipoVehiculo')),
                                            array('label' => 'Tipo de Poste', 'url' => array('/TipoPoste')),
                                        )),
                                    array('label' => 'Días de la Semana', 'url' => array('/Dia')),
                                    array('label' => 'Ubicación de Postes', 'url' => array('/Poste')),
                                ), 'visible' => !Yii::app()->user->isGuest),
                            array(
                                'label' => 'Organización',
                                'url' => array('/site/index'),
                                'linkOptions' => array('id' => 'menuOrganizacion'),
                                'itemOptions' => array('id' => 'itemOrganizacion'),
                                'items' => array(
                                    array('label' => 'Organización', 'url' => array('/Organizacion')),
                                    array('label' => 'Oficina', 'url' => array('/Oficina')),
                                    array('label' => 'Departamento', 'url' => array('/Departamento')),
                                    array('label' => 'Regiones', 'url' => array('/Region')),
                                    array('label' => 'Zonas', 'url' => array('/Zona')),
                                    array('label' => 'Roles de Empleado', 'url' => array('/Rol')),
                                    array('label' => 'Empleados', 'url' => array('/Empleado')),
                                ), 'visible' => !Yii::app()->user->isGuest),
                            array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                        )
                    )
                )
                    )
            );
            ?>
        </header>
        <div class="container" id="main">
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?>
            <?php endif ?>
            <?php echo $content; ?>
            <hr>
            <footer>
                Copyright &copy; <?php echo date('Y'); ?> <?php echo CHtml::encode(Yii::app()->params['empresa']); ?> | <?php echo CHtml::encode((Yii::app()->name) . ' ' . Yii::app()->params['version']); ?> - All Rights Reserved.<br/>
                <?php echo Yii::powered(); ?>
            </footer>

        </div>
    </body>
</html>