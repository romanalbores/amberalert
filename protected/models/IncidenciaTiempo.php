<?php

/**
 * This is the model class for table "alrt_incidencia_tiempo".
 *
 * The followings are the available columns in table 'alrt_incidencia_tiempo':
 * @property integer $id
 * @property integer $id_incidencia
 * @property string $consideracion_lugar
 * @property string $circunstancia_sospechosa
 * @property string $accion_localizacion
 * @property string $antecedente_incidencia
 * @property string $lugar_posible_encuentro
 * @property string $descripcion_nota
 * @property string $estatus
 * @property integer $registrado_por
 * @property string $fecha_registro
 * @property integer $modificado_por
 * @property string $fecha_modificado
 * @property integer $eliminado
 *
 * The followings are the available model relations:
 * @property Incidencia $idIncidencia
 */
class IncidenciaTiempo extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return IncidenciaTiempo the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'alrt_incidencia_tiempo';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_incidencia, registrado_por, fecha_registro, modificado_por, fecha_modificado', 'required'),
            array('id_incidencia, registrado_por, modificado_por, eliminado', 'numerical', 'integerOnly' => true),
            array('circunstancia_sospechosa', 'length', 'max' => 1000),
            array('estatus', 'length', 'max' => 15),
            array('consideracion_lugar, accion_localizacion, antecedente_incidencia, lugar_posible_encuentro, descripcion_nota', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, id_incidencia, consideracion_lugar, circunstancia_sospechosa, accion_localizacion, antecedente_incidencia, lugar_posible_encuentro, descripcion_nota, estatus, registrado_por, fecha_registro, modificado_por, fecha_modificado, eliminado', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idIncidencia' => array(self::BELONGS_TO, 'Incidencia', 'id_incidencia'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'id_incidencia' => 'Id Incidencia',
            'consideracion_lugar' => 'Consideracion Lugar',
            'circunstancia_sospechosa' => 'Circunstancia Sospechosa',
            'accion_localizacion' => 'Accion Localizacion',
            'antecedente_incidencia' => 'Antecedente Incidencia',
            'lugar_posible_encuentro' => 'Lugar Posible Encuentro',
            'descripcion_nota' => 'Descripcion Nota',
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
        $criteria->compare('id_incidencia', $this->id_incidencia);
        $criteria->compare('consideracion_lugar', $this->consideracion_lugar, true);
        $criteria->compare('circunstancia_sospechosa', $this->circunstancia_sospechosa, true);
        $criteria->compare('accion_localizacion', $this->accion_localizacion, true);
        $criteria->compare('antecedente_incidencia', $this->antecedente_incidencia, true);
        $criteria->compare('lugar_posible_encuentro', $this->lugar_posible_encuentro, true);
        $criteria->compare('descripcion_nota', $this->descripcion_nota, true);
        $criteria->compare('estatus', $this->estatus, true);
        $criteria->compare('registrado_por', $this->registrado_por);
        $criteria->compare('fecha_registro', $this->fecha_registro, true);
        $criteria->compare('modificado_por', $this->modificado_por);
        $criteria->compare('fecha_modificado', $this->fecha_modificado, true);
        $criteria->compare('eliminado', $this->eliminado);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
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
    
//      public function behaviors() {
//        return array(
//            'CTimestampBehavior' => array(
//                'class' => 'zii.behaviors.CTimestampBehavior',
//                'createAttribute' => 'registrado_por',
//                'updateAttribute' => 'modificado_por',
//                'setUpdateOnCreate' => true,
//            ),
//            'BlameableBehavior' => array(
//                'class' => 'application.components.behaviors.BlameableBehavior',
//                'createdByColumn' => 'fecha_registro',
//                'updatedByColumn' => 'fecha_modificado',
//            ),
//        );
//    }

}
