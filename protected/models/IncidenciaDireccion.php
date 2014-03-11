<?php

/**
 * This is the model class for table "alrt_incidencia_direccion".
 *
 * The followings are the available columns in table 'alrt_incidencia_direccion':
 * @property integer $id
 * @property integer $id_direccion
 * @property integer $id_incidencia
 * @property string $calles_aledanias
 * @property string $intersecciones
 * @property string $referencia_kilometro
 * @property string $referencias
 * @property string $estatus
 * @property integer $registrado_por
 * @property string $fecha_registro
 * @property integer $modificado_por
 * @property string $fecha_modificado
 * @property integer $eliminado
 *
 * The followings are the available model relations:
 * @property CataDireccion $idDireccion
 * @property Incidencia $idIncidencia
 */
class IncidenciaDireccion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IncidenciaDireccion the static model class
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
		return 'alrt_incidencia_direccion';
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
			array('id_direccion, id_incidencia, registrado_por, modificado_por, eliminado', 'numerical', 'integerOnly'=>true),
			array('calles_aledanias, intersecciones, referencia_kilometro, referencias', 'length', 'max'=>1000),
			array('estatus', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_direccion, id_incidencia, calles_aledanias, intersecciones, referencia_kilometro, referencias, estatus, registrado_por, fecha_registro, modificado_por, fecha_modificado, eliminado', 'safe', 'on'=>'search'),
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
			'idDireccion' => array(self::BELONGS_TO, 'CataDireccion', 'id_direccion'),
			'idIncidencia' => array(self::BELONGS_TO, 'Incidencia', 'id_incidencia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_direccion' => 'Id Direccion',
			'id_incidencia' => 'Id Incidencia',
			'calles_aledanias' => 'Calles Aledanias',
			'intersecciones' => 'Intersecciones',
			'referencia_kilometro' => 'Referencia Kilometro',
			'referencias' => 'Referencias',
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
		$criteria->compare('id_direccion',$this->id_direccion);
		$criteria->compare('id_incidencia',$this->id_incidencia);
		$criteria->compare('calles_aledanias',$this->calles_aledanias,true);
		$criteria->compare('intersecciones',$this->intersecciones,true);
		$criteria->compare('referencia_kilometro',$this->referencia_kilometro,true);
		$criteria->compare('referencias',$this->referencias,true);
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