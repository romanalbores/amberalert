<?php

/**
 * This is the model class for table "alrt_configuracion_dia_hora".
 *
 * The followings are the available columns in table 'alrt_configuracion_dia_hora':
 * @property integer $id
 * @property integer $configuracion_id
 * @property integer $id_dia
 * @property string $hora_fin
 * @property string $hora_inicio
 * @property string $estatus
 * @property integer $eliminado
 */
class ConfiguracionDH extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ConfiguracionDH the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'alrt_configuracion_dia_hora';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('configuracion_id, id_dia, hora_fin, hora_inicio', 'required'),
            array('configuracion_id, id_dia, eliminado', 'numerical', 'integerOnly' => true),
            array('estatus', 'length', 'max' => 15),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, configuracion_id, id_dia, hora_fin, hora_inicio, estatus, eliminado', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'configuracion_id' => 'Configuracion',
            'id_dia' => 'Id Dia',
            'hora_fin' => 'Hora Fin',
            'hora_inicio' => 'Hora Inicio',
            'estatus' => 'Estatus',
            'eliminado' => 'Eliminado',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('configuracion_id', $this->configuracion_id);
        $criteria->compare('id_dia', $this->id_dia);
        $criteria->compare('hora_fin', $this->hora_fin, true);
        $criteria->compare('hora_inicio', $this->hora_inicio, true);
        $criteria->compare('estatus', $this->estatus, true);
        $criteria->compare('eliminado', $this->eliminado);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
/*
    public function behaviors() {
        return array(
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'registrado_por',
                'updateAttribute' => 'modificado_por',
                'setUpdateOnCreate' => true,
            ),
            'BlameableBehavior' => array(
                'class' => 'application.components.behaviors.BlameableBehavior',
                'createdByColumn' => 'fecha_registro',
                'updatedByColumn' => 'fecha_modificado',
            ),
        );
    }
*/
    public function getByCode($code) {
        $criteria = new CDbCriteria;
        $criteria->condition = "estatus='ACTIVO' AND eliminado=0 AND codigo=" . $code . " AND id=" . $id;
        return $this->findAll($criteria);
    }

    public function getById($id) {
        $criteria = new CDbCriteria;
        $criteria->condition = "estatus='ACTIVO' AND eliminado=0 AND id=" . $id;
        return $this->findAll($criteria);
    }
    
    public function getByIdConfiguracion($id_configuracion) {
        $criteria = new CDbCriteria;
        $criteria->condition = "estatus='ACTIVO' AND eliminado=0 AND id_configuracion=" . $id_configuracion;
        return $this->findAll($criteria);
    }

    public function obtenerListaDiaHora() {
        $criteria = new CDbCriteria();
        $criteria->compare('estatus', 'ACTIVO');
        $criteria->compare('eliminado', 0);
        return $this->findAll($criteria);
    }

}