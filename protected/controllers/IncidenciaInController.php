<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class IncidenciaInController extends CController {
    
    public function actionIndex()
    {
        $model=CActiveRecord::model("Usuario")->findAll();
        $twitter ="@r0manux";
        $this->render("index",array("model"=>$model, "twitter"=>$twitter));      
     
        
        
        
    }
    
    
    
    
}

?>
