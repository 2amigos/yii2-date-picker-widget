<?php

use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model tests\models\Post */
?>

<?= DatePicker::widget([
    'model' => $model,
    'attribute' => 'create_time',
]) ?>
