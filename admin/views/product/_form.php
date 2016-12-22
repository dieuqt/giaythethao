<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\product */
/* @var $form yii\widgets\ActiveForm */
?>
<!-- <?php

//if($_FILES['fileField']['tmp_name'] != "") {
        //$newname = "$pid.jpg";
        //move_uploaded_file( $_FILES['fileField']['tmp_name'], "../../../images/$newname");
    //}
?> -->
<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_added')->textInput() ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stock_status_id')->textInput() ?>
    <div class="form-group">
    <label for="fileField" class="col-sm-2 control-label">Hình Ảnh</label>
    <div class="col-sm-10">
      <input type="file" name="fileField" id="fileField" />
    </div>
  </div>
<br>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
