<?php

/**
 * This is the model class for table "cata_localidad".
 *
 * The followings are the available columns in table 'cata_localidad':
 * @property integer $id
 * @property integer $id_municipio
 * @property string $nombre
 * @property string $nombre_corto
 * @property string $codigo
 * @property double $poblacion
 * @property string $descripcion
 * @property string $estatus
 * @property integer $registrado_por
 * @property string $fecha_registro
 * @property integer $modificado_por
 * @property string $fecha_modificado
 * @property integer $eliminado
 *
 * The followings are the available model relations:
 * @property Direccion[] $direccions
 * @property Municipio $idMunicipio
 */
class Localidad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Localidad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cata_localidad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_municipio, nombre, registrado_por, fecha_registro, modificado_por, fecha_modificado', 'required'),
			array('id_municipio, registrado_por, modificado_por, eliminado', 'numerical', 'integerOnly'=>true),
			array('poblacion', 'numerical'),
			array('nombre', 'length', 'max'=>500),
			array('nombre_corto', 'length', 'max'=>25),
			array('codigo', 'length', 'max'=>12),
			array('estatus', 'length', 'max'=>15),
			array('descripcion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_municipio, nombre, nombre_corto, codigo, poblacion, descripcion, estatus, registrado_por, fecha_registro, modificado_por, fecha_modificado, eliminado', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'direccions' => array(self::HAS_MANY, 'Direccion', 'id_localidad'),
			'idMunicipio' => array(self::BELONGS_TO, 'Municipio', 'id_municipio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_municipio' => 'Id Municipio',
			'nombre' => 'Nombre',
			'nombre_corto' => 'Nombre Corto',
			'codigo' => 'Codigo',
			'poblacion' => 'Poblacion',
			'descripcion' => 'Descripcion',
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
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_municipio',$this->id_municipio);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('nombre_corto',$this->nombre_corto,true);
		$criteria->compare('codigo',$this->codigo,true);
		$criteria->compare('poblacion',$this->poblacion);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('estatus',$this->estatus,true);
		$criteria->compare('registrado_por',$this->registrado_por);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('modificado_por',$this->modificado_por);
		$criteria->compare('fecha_modificado',$this->fecha_modificado,true);
		$criteria->compare('eliminado',$this->eliminado);
                $criteria->compare('estatus', 'ACTIVO');
                $criteria->compare('eliminado', 0);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
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
 
     public function obtenerListaLocalidad() {
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

     public function getByIdMunicipio($id_municipio) {
        $criteria = new CDbCriteria;
        $criteria->condition = "estatus='ACTIVO' AND eliminado=0 AND id_municipio=" . $id_municipio;
        return $criteria;
    }
    
}