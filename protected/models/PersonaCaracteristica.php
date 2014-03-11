<?php

/**
 * This is the model class for table "data_persona_caracteristica".
 *
 * The followings are the available columns in table 'data_persona_caracteristica':
 * @property integer $id
 * @property integer $id_persona
 * @property integer $id_tipo_naturaleza
 * @property integer $id_incidencia
 * @property string $raza
 * @property string $edad
 * @property string $idioma_primario
 * @property string $estatura
 * @property string $peso
 * @property string $cabello
 * @property string $ojos
 * @property string $complexion
 * @property string $caracteristicas_peculiares
 * @property integer $herida
 * @property string $descripcion_herida
 * @property string $estatus
 * @property integer $registrado_por
 * @property string $fecha_registro
 * @property integer $modificado_por
 * @property string $fecha_modificado
 * @property integer $eliminado
 *
 * The followings are the available model relations:
 * @property ObjetoIdentificacion $objetoIdentificacion
 * @property Persona $idPersona
 * @property AlrtIncidencia $idIncidencia
 * @property CataTipoNaturaleza $idTipoNaturaleza
 * @property PersonaCaracteristicaVehiculo[] $personaCaracteristicaVehiculos
 * @property PersonaEnfermedad[] $personaEnfermedads
 * @property PersonaVestimenta[] $personaVestimentas
 */
class PersonaCaracteristica extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PersonaCaracteristica the static model class
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
		return 'data_persona_caracteristica';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_persona, id_incidencia, registrado_por, fecha_registro, modificado_por, fecha_modificado', 'required'),
			array('id_persona, id_tipo_naturaleza, id_incidencia, herida, registrado_por, modificado_por, eliminado', 'numerical', 'integerOnly'=>true),
			array('raza, edad, idioma_primario, estatura, peso, cabello, ojos', 'length', 'max'=>100),
			array('complexion', 'length', 'max'=>500),
			array('estatus', 'length', 'max'=>15),
			array('caracteristicas_peculiares, descripcion_herida', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_persona, id_tipo_naturaleza, id_incidencia, raza, edad, idioma_primario, estatura, peso, cabello, ojos, complexion, caracteristicas_peculiares, herida, descripcion_herida, estatus, registrado_por, fecha_registro, modificado_por, fecha_modificado, eliminado', 'safe', 'on'=>'search'),
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
			'objetoIdentificacion' => array(self::HAS_ONE, 'ObjetoIdentificacion', 'id'),
			'idPersona' => array(self::BELONGS_TO, 'Persona', 'id_persona'),
			'idIncidencia' => array(self::BELONGS_TO, 'AlrtIncidencia', 'id_incidencia'),
			'idTipoNaturaleza' => array(self::BELONGS_TO, 'CataTipoNaturaleza', 'id_tipo_naturaleza'),
			'personaCaracteristicaVehiculos' => array(self::HAS_MANY, 'PersonaCaracteristicaVehiculo', 'id_persona_caracteristica'),
			'personaEnfermedads' => array(self::HAS_MANY, 'PersonaEnfermedad', 'id_persona_caracteristica'),
			'personaVestimentas' => array(self::HAS_MANY, 'PersonaVestimenta', 'id_persona_caracteristica'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_persona' => 'Id Persona',
			'id_tipo_naturaleza' => 'Id Tipo Naturaleza',
			'id_incidencia' => 'Id Incidencia',
			'raza' => 'Raza',
			'edad' => 'Edad',
			'idioma_primario' => 'Idioma Primario',
			'estatura' => 'Estatura',
			'peso' => 'Peso',
			'cabello' => 'Cabello',
			'ojos' => 'Ojos',
			'complexion' => 'Complexion',
			'caracteristicas_peculiares' => 'Caracteristicas Peculiares',
			'herida' => 'Herida',
			'descripcion_herida' => 'Descripcion Herida',
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
		$criteria->compare('id_persona',$this->id_persona);
		$criteria->compare('id_tipo_naturaleza',$this->id_tipo_naturaleza);
		$criteria->compare('id_incidencia',$this->id_incidencia);
		$criteria->compare('raza',$this->raza,true);
		$criteria->compare('edad',$this->edad,true);
		$criteria->compare('idioma_primario',$this->idioma_primario,true);
		$criteria->compare('estatura',$this->estatura,true);
		$criteria->compare('peso',$this->peso,true);
		$criteria->compare('cabello',$this->cabello,true);
		$criteria->compare('ojos',$this->ojos,true);
		$criteria->compare('complexion',$this->complexion,true);
		$criteria->compare('caracteristicas_peculiares',$this->caracteristicas_peculiares,true);
		$criteria->compare('herida',$this->herida);
		$criteria->compare('descripcion_herida',$this->descripcion_herida,true);
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
}