<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "procedimientos".
 *
 * @property int $id_procedimientos
 * @property int $id_paciente
 * @property string $detalle_procedim
 * @property int $id_medico
 * @property float $costo_procedim
 * @property float $porcentaje_comi
 * @property string $fecha_procedim
 *
 * @property Honorarios[] $honorarios
 * @property DatosMedicos $medico
 * @property DatosPacientes $paciente
 */
class Procedimientos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'procedimientos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_paciente', 'detalle_procedim', 'id_medico', 'costo_procedim', 'porcentaje_comi', 'fecha_procedim'], 'required'],
            [['id_paciente', 'id_medico'], 'integer'],
            [['costo_procedim', 'porcentaje_comi'], 'number'],
            [['fecha_procedim'], 'safe'],
            [['detalle_procedim'], 'string', 'max' => 100],
            [['id_medico'], 'exist', 'skipOnError' => true, 'targetClass' => DatosMedicos::className(), 'targetAttribute' => ['id_medico' => 'id_medico']],
            [['id_paciente'], 'exist', 'skipOnError' => true, 'targetClass' => DatosPacientes::className(), 'targetAttribute' => ['id_paciente' => 'id_paciente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_procedimientos' => 'Id Procedimientos',
            'id_paciente' => 'Id Paciente',
            'detalle_procedim' => 'Detalle Procedim',
            'id_medico' => 'Id Medico',
            'costo_procedim' => 'Costo Procedim',
            'porcentaje_comi' => 'Porcentaje Comi',
            'fecha_procedim' => 'Fecha Procedim',
        ];
    }

    /**
     * Gets query for [[Honorarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHonorarios()
    {
        return $this->hasMany(Honorarios::className(), ['id_procedimientos' => 'id_procedimientos']);
    }

    /**
     * Gets query for [[Medico]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMedico()
    {
        return $this->hasOne(DatosMedicos::className(), ['id_medico' => 'id_medico']);
    }

    /**
     * Gets query for [[Paciente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaciente()
    {
        return $this->hasOne(DatosPacientes::className(), ['id_paciente' => 'id_paciente']);
    }
}
