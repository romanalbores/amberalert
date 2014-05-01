<?php

/**
 * This is the model class for table "data_poste_direccion".
 *
 * The followings are the available columns in table 'data_poste_direccion':
 * @property integer $id
 * @property integer $id_poste
 * @property integer $id_direccion
 * @property integer $id_zona
 * @property string $dir_ip
 * @property string $latitud
 * @property string $longitud
 * @property string $altitud
 * @property string $estatus
 * @property integer $registrado_por
 * @property string $fecha_registro
 * @property integer $modificado_por
 * @property string $fecha_modificado
 * @property integer $eliminado
 *
 * The followings are the available model relations:
 * @property CataZona $idZona
 * @property CataDireccion $idDireccion
 * @property Poste $idPoste
 */
class PosteDireccion extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return PosteDireccion the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'data_poste_direccion';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_poste, id_direccion, id_zona, registrado_por, fecha_registro, modificado_por, fecha_modificado', 'required'),
            array('id_poste, id_direccion, id_zona, registrado_por, modificado_por, eliminado', 'numerical', 'integerOnly' => true),
            array('dir_ip', 'length', 'max' => 30),
            array('latitud, longitud, altitud', 'length', 'max' => 40),
            array('estatus', 'length', 'max' => 15),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, id_poste, id_direccion, id_zona, dir_ip, latitud, longitud, altitud, estatus, registrado_por, fecha_registro, modificado_por, fecha_modificado, eliminado', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idZona' => array(self::BELONGS_TO, 'CataZona', 'id_zona'),
            'idDireccion' => array(self::BELONGS_TO, 'CataDireccion', 'id_direccion'),
            'idPoste' => array(self::BELONGS_TO, 'Poste', 'id_poste'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'id_poste' => 'Id Poste',
            'id_direccion' => 'Id Direccion',
            'id_zona' => 'Id Zona',
            'dir_ip' => 'Dir Ip',
            'latitud' => 'Latitud',
            'longitud' => 'Longitud',
            'altitud' => 'Altitud',
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
        $criteria->compare('id_poste', $this->id_poste);
        $criteria->compare('id_direccion', $this->id_direccion);
        $criteria->compare('id_zona', $this->id_zona);
        $criteria->compare('dir_ip', $this->dir_ip, true);
        $criteria->compare('latitud', $this->latitud, true);
        $criteria->compare('longitud', $this->longitud, true);
        $criteria->compare('altitud', $this->altitud, true);
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

        public function obtenerListaPosteDireccion() {
        $criteria = new CDbCriteria();
        $criteria->compare('estatus', 'ACTIVO');
        $criteria->compare('eliminado', 0);
        return $this->findAll($criteria);
    }

    public function getById($id) {
        $criteria = new CDbCriteria;
        $criteria->condition = "estatus='ACTIVO' AND eliminado=0 AND id=" . $id;
        return $this->findAll($criteria);
    }
    
     public function getByIdPosteDireccion($id_poste, $id_direccion) {
        $criteria = new CDbCriteria;
        $criteria->condition = "estatus='ACTIVO' AND eliminado=0 AND id_poste=" . $id_poste." AND id_direccion= ".$id_direccion;
        return $this->findAll($criteria);
    }
    
    public function getByIdPoste($id_poste) {
        $criteria = new CDbCriteria;
        $criteria->condition = "estatus='ACTIVO' AND eliminado=0 AND id_poste=" . $id_poste;
        return $this->find($criteria);
    }
    
    public function getByIdDireccion($id_direccion) {
        $criteria = new CDbCriteria;
        $criteria->condition = "estatus='ACTIVO' AND eliminado=0 AND id_direccion=" . $id_direccion;
        return $this->find($criteria);
    }
    
    public function getByIdZona($id_zona) {
        $criteria = new CDbCriteria;
        $criteria->condition = "estatus='ACTIVO' AND eliminado=0 AND id_zona=" . $id_zona;
        return $this->findAll($criteria);
    }

    public function getByIP($dir_ip) {
        $criteria = new CDbCriteria;
        $criteria->condition = "estatus='ACTIVO' AND eliminado=0 AND dir_ip = " . $dir_ip;
        return $this->findAll($criteria);
    }
    
}