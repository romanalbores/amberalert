<?php

/**
 * This is the model class for table "data_persona".
 *
 * The followings are the available columns in table 'data_persona':
 * @property integer $id
 * @property string $nombre
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $genero
 * @property string $fecha_nacimiento
 * @property string $estatus
 * @property integer $registrado_por
 * @property string $fecha_registro
 * @property integer $modificado_por
 * @property string $fecha_modificado
 * @property integer $eliminado
 *
 * The followings are the available model relations:
 * @property Empleado[] $empleados
 * @property ImagenPersona[] $imagenPersonas
 * @property PersonaCaracteristica[] $personaCaracteristicas
 * @property PersonaUsuario[] $personaUsuarios
 * @property RelacionVictimaSospechoso[] $relacionVictimaSospechosos
 */
class Persona extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Persona the static model class
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
		return 'data_persona';
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
			array('registrado_por, modificado_por, eliminado', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>200),
			array('apellido_paterno, genero, estatus', 'length', 'max'=>15),
			array('apellido_materno', 'length', 'max'=>100),
			array('fecha_nacimiento', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, apellido_paterno, apellido_materno, genero, fecha_nacimiento, estatus, registrado_por, fecha_registro, modificado_por, fecha_modificado, eliminado', 'safe', 'on'=>'search'),
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
			'empleados' => array(self::HAS_MANY, 'Empleado', 'id_persona'),
			'imagenPersonas' => array(self::HAS_MANY, 'ImagenPersona', 'id_persona'),
			'personaCaracteristicas' => array(self::HAS_MANY, 'PersonaCaracteristica', 'id_persona'),
			'personaUsuarios' => array(self::HAS_MANY, 'PersonaUsuario', 'id_persona'),
			'relacionVictimaSospechosos' => array(self::HAS_MANY, 'RelacionVictimaSospechoso', 'id_persona_victima'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'apellido_paterno' => 'Apellido Paterno',
			'apellido_materno' => 'Apellido Materno',
			'genero' => 'Genero',
			'fecha_nacimiento' => 'Fecha Nacimiento',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido_paterno',$this->apellido_paterno,true);
		$criteria->compare('apellido_materno',$this->apellido_materno,true);
		$criteria->compare('genero',$this->genero,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
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