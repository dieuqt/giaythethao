<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stock_status".
 *
 * @property integer $stock_status_id
 * @property string $stock_name
 *
 * @property Product[] $products
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stock_name'], 'required'],
            [['stock_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stock_status_id' => 'Stock Status ID',
            'stock_name' => 'Stock Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['stock_status_id' => 'stock_status_id']);
    }
}
