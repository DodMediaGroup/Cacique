<?php

/**
 * This is the model class for table "convocatorias".
 *
 * The followings are the available columns in table 'convocatorias':
 * @property integer $id
 * @property string $titulo
 * @property string $descripcion
 * @property string $fecha
 * @property string $fecha_fin
 * @property string $contenido
 * @property string $imagen
 * @property string $post__url
 * @property integer $estado
 */
class Convocatorias extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'convocatorias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, post__url', 'required'),
			array('estado', 'numerical', 'integerOnly'=>true),
			array('titulo, post__url', 'length', 'max'=>255),
			array('descripcion', 'length', 'max'=>100),
			array('imagen', 'length', 'max'=>65),
			array('fecha, fecha_fin, contenido', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, titulo, descripcion, fecha, fecha_fin, contenido, imagen, post__url, estado', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'titulo' => 'Titulo',
			'descripcion' => 'Descripcion',
			'fecha' => 'Fecha',
			'fecha_fin' => 'Fecha Fin',
			'contenido' => 'Contenido',
			'imagen' => 'Imagen',
			'post__url' => 'Post Url',
			'estado' => 'Estado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('contenido',$this->contenido,true);
		$criteria->compare('imagen',$this->imagen,true);
		$criteria->compare('post__url',$this->post__url,true);
		$criteria->compare('estado',$this->estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Convocatorias the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
