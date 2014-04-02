Bootstrap DatePicker Widget for Yii2
====================================

Renders a [Bootstrap DatePicker plugin](http://bootstrap-datepicker.readthedocs.org/en/release/).

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require "2amigos/yii2-date-picker-widget" "*"
```
or add

```json
"2amigos/yii2-date-picker-widget" : "*"
```

to the require section of your application's `composer.json` file.

Usage
-----
The widget comes in two flavors: 

- DatePicker
- DateRangePicker

**DatePicker**

This widget renders a Bootstrap DatePicker input control. Best suitable for model with date string attribute.

***Example of use with a form***  
There are two ways of using it, with an `ActiveForm` instance or as a widget setting up its `model` and `attribute`.

```
<?php
use dosamigos\datepicker\DatePicker;

// as a widget
?>

<?= DatePicker::widget([
	'model' => $model,
	'attribute' => 'date',
	'template' => '{addon}{input}',
		'clientOptions' => [
			'autoclose' => true,
			'format' => 'dd-M-yyyy'
		]
]);?>

<?php 
// with an ActiveForm instance 
?>
<?= $form->field($model, 'date')->widget(
	DatePicker::className(), [
		// inline too, not bad
 		'inline' => true, 
 		// modify template for custom rendering
		'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
		'clientOptions' => [
			'autoclose' => true,
			'format' => 'dd-M-yyyy'
		]
]);?>
```  
***Example of use without a model***

```  
<?php
use dosamigos\datepicker\DatePicker;
?>
<?= DatePicker::widget([
	'name' => 'Test',
	'value' => '02-16-2012',
	'template' => '{addon}{input}',
		'clientOptions' => [
			'autoclose' => true,
			'format' => 'dd-M-yyyy'
		]
]);?>
```
**DateRangePicker**  

This widget renders a Bootstrap DateRangePicker Input control. 

***Example of use with a form***  
The following example works with a model that has two attributes named `date_from` and `date_to`.

```
<?php
use dosamigos\datepicker\DateRangePicker;
?>
<?= $form->field($tour, 'date_from')->widget(DateRangePicker::className(), [
	'attributeTo' => 'date_to', 
	'form' => $form, // best for correct client validation
	'language' => 'es',
	'size' => 'lg',
	'clientOptions' => [
		'autoclose' => true,
		'format' => 'dd-M-yyyy'
	]
]);?>
```  
***Example of use without a model***

```  
<?php
use dosamigos\datepicker\DateRangePicker;
?>
<?= DateRangePicker::widget([
	'name' => 'date_from',
	'value' => '02-16-2012',
	'nameTo' => 'name_to',
	'valueTo' => '02-20-2012'
]);?>
```

Further Information
-------------------
Please, check the [Bootstrap DatePicker site](http://bootstrap-datepicker.readthedocs.org/en/release/) documentation for further information about its configuration options. 


> [![2amigOS!](http://www.gravatar.com/avatar/55363394d72945ff7ed312556ec041e0.png)](http://www.2amigos.us)  
<i>Web development has never been so fun!</i>  
[www.2amigos.us](http://www.2amigos.us)