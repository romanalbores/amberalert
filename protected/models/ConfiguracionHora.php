<?php

/**
 * This is the model class for table "alrt_configuracion_hora".
 *
 * The followings are the available columns in table 'alrt_configuracion_hora':
 * @property integer $id
 * @property integer $id_configuracion_dia
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property string $estatus
 * @property string $fecha_registro
 * @property integer $registrado_por
 * @property integer $modificado_por
 * @property string $fecha_modificado
 * @property integer $eliminado
 *
 * The followings are the available model relations:
 * @property ConfiguracionDia $idConfiguracionDia
 */
class ConfiguracionHora extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ConfiguracionHora the static model class
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
		return 'alrt_configuracion_hora';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_configuracion_dia, hora_inicio, hora_fin, fecha_registro, registrado_por, modificado_por, fecha_modificado', 'required'),
			array('id_configuracion_dia, registrado_por, modificado_por, eliminado', 'numerical', 'integerOnly'=>true),
			array('estatus', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_configuracion_dia, hora_inicio, hora_fin, estatus, fecha_registro, registrado_por, modificado_por, fecha_modificado, eliminado', 'safe', 'on'=>'search'),
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
			'idConfiguracionDia' => array(self::BELONGS_TO, 'ConfiguracionDia', 'id_configuracion_dia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_configuracion_dia' => 'Id Configuracion Dia',
			'hora_inicio' => 'Hora Inicio',
			'hora_fin' => 'Hora Fin',
			'estatus' => 'Estatus',
			'fecha_registro' => 'Fecha Registro',
			'registrado_por' => 'Registrado Por',
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
		$criteria->compare('id_configuracion_dia',$this->id_configuracion_dia);
		$criteria->compare('hora_inicio',$this->hora_inicio,true);
		$criteria->compare('hora_fin',$this->hora_fin,true);
		$criteria->compare('estatus',$this->estatus,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('registrado_por',$this->registrado_por);
		$criteria->compare('modificado_por',$this->modificado_por);
		$criteria->compare('fecha_modificado',$this->fecha_modificado,true);
		$criteria->compare('eliminado',$this->eliminado);
                $criteria->compare('estatus', 'ACTIVO');
                $criteria->compare('eliminado', 0);
 
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
            public function behaviors()
    {
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
    
        public function getById($id) {
        $criteria = new CDbCriteria;
        $criteria->condition = "estatus='ACTIVO' AND eliminado=0 AND id=" . $id;
        return $criteria;
    }

    public function getByIdDía($id_configuracion_dia) {
        $criteria = new CDbCriteria;
        $criteria->condition = "estatus='ACTIVO' AND eliminado=0 AND id_configuracion_dia=" . $id_configuracion_dia;
        return $criteria;
    }
    
     public function getByFecha($fechaIni,$fechaFin) {
        $criteria = new CDbCriteria;
        $criteria->condition = "estatus='ACTIVO' AND eliminado=0 AND fecha_dia BETWEEN (".$fechaIni." AND ".$fechaFin.")" ;
        return $criteria;
    }

    public function obtenerListaConfiguracionDiaHora() {
        $criteria = new CDbCriteria();
        $criteria->compare('estatus', 'ACTIVO');
        $criteria->compare('eliminado', 0);
        return $this->findAll($criteria);
    }
    
    
}