<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $product_id
 * @property string $name
 * @property integer $quantity
 * @property string $image
 * @property string $price
 * @property string $date_added
 * @property string $category
 * @property integer $stock_status_id
 *
 * @property StockStatus $stockStatus
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'quantity', 'image', 'price', 'category', 'stock_status_id'], 'required'],
            [['quantity', 'stock_status_id'], 'integer'],
            [['date_added'], 'safe'],
            [['name', 'image'], 'string', 'max' => 255],
            [['price', 'category'], 'string', 'max' => 16],
            [['stock_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stock::className(), 'targetAttribute' => ['stock_status_id' => 'stock_status_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'name' => 'Name',
            'quantity' => 'Quantity',
            'image' => 'Image',
            'price' => 'Price',
            'date_added' => 'Date Added',
            'category' => 'Category',
            'stock_status_id' => 'Stock Status ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStockStatus()
    {
        return $this->hasOne(Stock::className(), ['stock_status_id' => 'stock_status_id']);
    }
}
