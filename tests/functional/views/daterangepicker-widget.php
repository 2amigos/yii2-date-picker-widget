<?php
use tests\overrides\TestDateRangePicker;

/* @var $this yii\web\View */
/* @var $model tests\models\Post */
?>

<?= TestDateRangePicker::widget([
    'model' => $model,
    'attribute' => 'date_from',
    'attributeTo' => 'date_to'
]) ?>
