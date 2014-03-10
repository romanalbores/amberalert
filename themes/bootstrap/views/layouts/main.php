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
                        'items' => array(
                            array('label' => 'Homeee', 'url' => array('/site/index')),
                            array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
                            array('label' => 'Contact', 'url' => array('/site/contact')),
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