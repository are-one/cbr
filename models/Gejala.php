<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gejala".
 *
 * @property string $id_gejala
 * @property string|null $nama_gejala
 *
 * @property Penyakit[] $penyakits
 * @property Rule[] $rules
 */
class Gejala extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gejala';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_gejala'], 'required'],
            [['id_gejala'], 'string', 'max' => 5],
            [['nama_gejala'], 'string', 'max' => 45],
            [['id_gejala'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_gejala' => 'Id Gejala',
            'nama_gejala' => 'Nama Gejala',
        ];
    }

    /**
     * Gets query for [[Penyakits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenyakits()
    {
        return $this->hasMany(Penyakit::className(), ['id_penyakit' => 'penyakit_id'])->viaTable('rule', ['gejala_id' => 'id_gejala']);
    }

    /**
     * Gets query for [[Rules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRules()
    {
        return $this->hasMany(Rule::className(), ['gejala_id' => 'id_gejala']);
    }
}
