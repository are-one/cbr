<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penyakit".
 *
 * @property string $id_penyakit
 * @property string|null $nama_penyakit
 * @property string|null $jenis_penyakit
 * @property string|null $penyebab
 * @property string|null $solusi_penyakit
 *
 * @property Gejala[] $gejalas
 * @property Rule[] $rules
 */
class Penyakit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penyakit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_penyakit'], 'required'],
            [['penyebab', 'solusi_penyakit'], 'string'],
            [['id_penyakit'], 'string', 'max' => 5],
            [['nama_penyakit', 'jenis_penyakit'], 'string', 'max' => 45],
            [['id_penyakit'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_penyakit' => 'Id Penyakit',
            'nama_penyakit' => 'Nama Penyakit',
            'jenis_penyakit' => 'Jenis Penyakit',
            'penyebab' => 'Penyebab',
            'solusi_penyakit' => 'Solusi Penyakit',
        ];
    }

    /**
     * Gets query for [[Gejalas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGejalas()
    {
        return $this->hasMany(Gejala::className(), ['id_gejala' => 'gejala_id'])->viaTable('rule', ['penyakit_id' => 'id_penyakit']);
    }

    /**
     * Gets query for [[Rules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRules()
    {
        return $this->hasMany(Rule::className(), ['penyakit_id' => 'id_penyakit']);
    }
}
