<?php

/**
 * This is the model class for table "cata_telefono_persona".
 *
 * The followings are the available columns in table 'cata_telefono_persona':
 * @property integer $id
 * @property integer $id_telefono
 * @property integer $id_persona
 * @property string $estatus
 * @property integer $registrado_por
 * @property string $fecha_registro
 * @property integer $modificado_por
 * @property string $fecha_modificado
 * @property integer $eliminado
 *
 * The followings are the available model relations:
 * @property Telefono $idTelefono
 * @property DataPersona $idPersona
 */
class TelefonoPersona extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return TelefonoPersona the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'cata_telefono_persona';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_telefono, id_persona, registrado_por, fecha_registro, modificado_por, fecha_modificado', 'required'),
            array('id_telefono, id_persona, registrado_por, modificado_por, eliminado', 'numerical', 'integerOnly' => true),
            array('estatus', 'length', 'max' => 15),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, id_telefono, id_persona, estatus, registrado_por, fecha_registro, modificado_por, fecha_modificado, eliminado', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idTelefono' => array(self::BELONGS_TO, 'Telefono', 'id_telefono'),
            'idPersona' => array(self::BELONGS_TO, 'DataPersona', 'id_persona'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'id_telefono' => 'Id Telefono',
            'id_persona' => 'Id Persona',
            'estatus' => 'Estatus',
            'registrado_por' => 'Registrado Por',
            'fecha_registro' => 'Fecha Registro',
            'modificado_por' => 'Modificado Por',
            'fecha_modificado' => 'Fecha Modificado',
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
        $criteria->compare('id_telefono', $this->id_telefono);
        $criteria->compare('id_persona', $this->id_persona);
        $criteria->compare('estatus', $this->estatus, true);
        $criteria->compare('registrado_por', $this->registrado_por);
        $criteria->compare('fecha_registro', $this->fecha_registro, true);
        $criteria->compare('modificado_por', $this->modificado_por);
        $criteria->compare('fecha_modificado', $this->fecha_modificado, true);
        $criteria->compare('eliminado', $this->eliminado);
        $criteria->compare('estatus', 'ACTIVO');
        $criteria->compare('eliminado', 0);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

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

    public function obtenerListaTelefono() {
        $criteria = new CDbCriteria();
        $criteria->compare('estatus', 'ACTIVO');
        $criteria->compare('eliminado', 0);
        return $this->findAll($criteria);
    }

    public function getById($id) {
        $criteria = new CDbCriteria;
        $criteria->condition = "estatus='ACTIVO' AND eliminado=0 AND id=" . $id;
        return $criteria;
    }

    public function getByIdPersona($id_persona) {
        $criteria = new CDbCriteria;
        $criteria->condition = "estatus='ACTIVO' AND eliminado=0 AND id_persona=" . $id_persona;
        return $criteria;
    }

    public function getByIdTelefono($id_telefono) {
        $criteria = new CDbCriteria;
        $criteria->condition = "estatus='ACTIVO' AND eliminado=0 AND id_telefono=" . $id_telefono;
        return $criteria;
    }

}