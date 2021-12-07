<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rule".
 *
 * @property string $gejala_id
 * @property string $penyakit_id
 *
 * @property Gejala $gejala
 * @property Penyakit $penyakit
 */
class Rule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gejala_id', 'penyakit_id'], 'required'],
            [['gejala_id', 'penyakit_id'], 'string', 'max' => 5],
            [['gejala_id', 'penyakit_id'], 'unique', 'targetAttribute' => ['gejala_id', 'penyakit_id']],
            [['gejala_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gejala::className(), 'targetAttribute' => ['gejala_id' => 'id_gejala']],
            [['penyakit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Penyakit::className(), 'targetAttribute' => ['penyakit_id' => 'id_penyakit']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'gejala_id' => 'Gejala ID',
            'penyakit_id' => 'Penyakit ID',
        ];
    }

    /**
     * Gets query for [[Gejala]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGejala()
    {
        return $this->hasOne(Gejala::className(), ['id_gejala' => 'gejala_id']);
    }

    /**
     * Gets query for [[Penyakit]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenyakit()
    {
        return $this->hasOne(Penyakit::className(), ['id_penyakit' => 'penyakit_id']);
    }
}
