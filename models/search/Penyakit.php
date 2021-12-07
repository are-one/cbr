<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Penyakit as PenyakitModel;

/**
 * Penyakit represents the model behind the search form of `app\models\Penyakit`.
 */
class Penyakit extends PenyakitModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_penyakit', 'nama_penyakit', 'jenis_penyakit', 'penyebab', 'solusi_penyakit'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PenyakitModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'id_penyakit', $this->id_penyakit])
            ->andFilterWhere(['like', 'nama_penyakit', $this->nama_penyakit])
            ->andFilterWhere(['like', 'jenis_penyakit', $this->jenis_penyakit])
            ->andFilterWhere(['like', 'penyebab', $this->penyebab])
            ->andFilterWhere(['like', 'solusi_penyakit', $this->solusi_penyakit]);

        return $dataProvider;
    }
}
