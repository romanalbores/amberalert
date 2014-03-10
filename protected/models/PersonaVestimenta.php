<?php

/**
 * This is the model class for table "data_persona_vestimenta".
 *
 * The followings are the available columns in table 'data_persona_vestimenta':
 * @property integer $id
 * @property integer $id_persona_caracteristica
 * @property string $gorra
 * @property string $abrigo
 * @property string $camisa
 * @property string $pantalones
 * @property string $calzado
 * @property string $calcetines
 * @property string $caracteristicas_peculiares
 * @property string $estatus
 * @property integer $registrado_por
 * @property string $fecha_registro
 * @property integer $modificado_por
 * @property string $fecha_modificado
 * @property integer $eliminado
 *
 * The followings are the available model relations:
 * @property PersonaCaracteristica $idPersonaCaracteristica
 */
class PersonaVestimenta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PersonaVestimenta the static model class
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
		return 'data_persona_vestimenta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('registrado_por, fecha_registro, modificado_por, fecha_modificado', 'required'),
			array('id_persona_caracteristica, registrado_por, modificado_por, eliminado', 'numerical', 'integerOnly'=>true),
			array('gorra, abrigo, camisa, pantalones, calzado, calcetines', 'length', 'max'=>100),
			array('estatus', 'length', 'max'=>15),
			array('caracteristicas_peculiares', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_persona_caracteristica, gorra, abrigo, camisa, pantalones, calzado, calcetines, caracteristicas_peculiares, estatus, registrado_por, fecha_registro, modificado_por, fecha_modificado, eliminado', 'safe', 'on'=>'search'),
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
			'idPersonaCaracteristica' => array(self::BELONGS_TO, 'PersonaCaracteristica', 'id_persona_caracteristica'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_persona_caracteristica' => 'Id Persona Caracteristica',
			'gorra' => 'Gorra',
			'abrigo' => 'Abrigo',
			'camisa' => 'Camisa',
			'pantalones' => 'Pantalones',
			'calzado' => 'Calzado',
			'calcetines' => 'Calcetines',
			'caracteristicas_peculiares' => 'Caracteristicas Peculiares',
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
		$criteria->compare('id_persona_caracteristica',$this->id_persona_caracteristica);
		$criteria->compare('gorra',$this->gorra,true);
		$criteria->compare('abrigo',$this->abrigo,true);
		$criteria->compare('camisa',$this->camisa,true);
		$criteria->compare('pantalones',$this->pantalones,true);
		$criteria->compare('calzado',$this->calzado,true);
		$criteria->compare('calcetines',$this->calcetines,true);
		$criteria->compare('caracteristicas_peculiares',$this->caracteristicas_peculiares,true);
		$criteria->compare('estatus',$this->estatus,true);
		$criteria->compare('registrado_por',$this->registrado_por);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('modificado_por',$this->modificado_por);
		$criteria->compare('fecha_modificado',$this->fecha_modificado,true);
		$criteria->compare('eliminado',$this->eliminado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}