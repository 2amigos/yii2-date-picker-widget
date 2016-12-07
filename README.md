Bootstrap DatePicker Widget for Yii2
====================================

[![Latest Version](https://img.shields.io/github/tag/2amigos/yii2-date-picker-widget.svg?style=flat-square&label=release)](https://github.com/2amigos/yii2-date-picker-widget/tags)
[![Software License](https://img.shields.io/badge/license-BSD-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/2amigos/yii2-date-picker-widget/master.svg?style=flat-square)](https://travis-ci.org/2amigos/yii2-date-picker-widget)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/2amigos/yii2-date-picker-widget.svg?style=flat-square)](https://scrutinizer-ci.com/g/2amigos/yii2-date-picker-widget/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/2amigos/yii2-date-picker-widget.svg?style=flat-square)](https://scrutinizer-ci.com/g/2amigos/yii2-date-picker-widget)
[![Total Downloads](https://img.shields.io/packagist/dt/2amigos/yii2-date-picker-widget.svg?style=flat-square)](https://packagist.org/packages/2amigos/yii2-date-picker-widget)


Renders a [Bootstrap DatePicker plugin](http://bootstrapformhelpers.com/datepicker/).

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ composer require 2amigos/yii2-date-picker-widget:~1.0
```
or add

```json
"2amigos/yii2-date-picker-widget" : "~1.0"
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

```php
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

```php
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

```php
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

```php  
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

Testing
-------

To test the extension, is better to clone this repository on your computer. After, go to the extensions folder and do
the following (assuming you have `composer` installed on your computer): 

```bash 
$ composer install --no-interaction --prefer-source --dev
```
Once all required libraries are installed then do: 

```bash 
$ vendor/bin/phpunit
```

I would recommend to have `phpunit` globally installed together with `xdebug` so you can have code coverage analysis too.

Further Information
-------------------
Please, check the [Bootstrap DatePicker site](http://bootstrap-datepicker.readthedocs.io/en/latest/) documentation for further information about its configuration options. 

Contributing
------------

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

Credits
-------

- [Antonio Ramirez](https://github.com/tonydspaniard)
- [All Contributors](../../contributors)

License
-------

The BSD License (BSD). Please see [License File](LICENSE.md) for more information.


> [![2amigOS!](http://www.gravatar.com/avatar/55363394d72945ff7ed312556ec041e0.png)](http://www.2amigos.us)  
<i>Web development has never been so fun!</i>  
[www.2amigos.us](http://www.2amigos.us)
