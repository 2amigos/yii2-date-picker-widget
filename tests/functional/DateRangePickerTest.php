<?php

namespace tests;


use dosamigos\datepicker\DateRangePicker;
use tests\data\models\Post;
use tests\data\overrides\TestDateRangePicker;
use yii\bootstrap\ActiveForm;
use yii\web\JsExpression;
use yii\web\View;

class DateRangePickerTest extends TestCase
{

    public function testRenderWithModel()
    {
        $model = new Post();
        $out = DateRangePicker::widget([
            'form' => new ActiveForm(),
            'model' => $model,
            'attribute' => 'date_from',
            'attributeTo' => 'date_to'
        ]);
        $expected = '<div class="input-group input-daterange"><div class="datepicker-range form-control field-post-date_from">
<input type="text" id="post-date_from" class="form-control form-control datepicker-from" name="Post[date_from]"><p class="help-block help-block-error"></p>
</div><span class="input-group-addon">to</span><div class="datepicker-range form-control field-post-date_to">
<input type="text" id="post-date_to" class="form-control form-control datepicker-to" name="Post[date_to]"><p class="help-block help-block-error"></p>
</div></div>';

        $this->assertEqualsWithoutLE($expected, $out);
    }

    public function testRenderWithNameAndValue()
    {
        $out = DateRangePicker::widget([
            'name' => 'name_from',
            'value' => '02-16-2015',
            'nameTo' => 'name_to',
            'valueTo' => '02-18-2015'
        ]);
        $expected = '<div class="input-group input-daterange"><input type="text" id="w1" class="form-control" name="name_from" value="02-16-2015"><span class="input-group-addon">to</span><input type="text" class="form-control" name="name_to" value="02-18-2015"></div>';

        $this->assertEqualsWithoutLE($expected, $out);
    }


    public function testRenderWithSize()
    {
        $out = DateRangePicker::widget([
            'name' => 'name_from',
            'value' => '02-16-2015',
            'nameTo' => 'name_to',
            'valueTo' => '02-18-2015',
            'size' => 'lg'
        ]);
        $expected = '<div class="input-group-lg input-group input-daterange"><input type="text" id="w2" class="input-lg form-control" name="name_from" value="02-16-2015"><span class="input-group-addon">to</span><input type="text" class="input-lg form-control" name="name_to" value="02-18-2015"></div>';

        $this->assertEqualsWithoutLE($expected, $out);
    }

    public function testWrongConfig() {
        $this->setExpectedException('yii\base\InvalidConfigException');
        $out = DateRangePicker::begin([]);
    }


    public function testDateRangePickerRegisterPluginScriptMethod()
    {
        $class = new \ReflectionClass('tests\\data\\overrides\\TestDateRangePicker');
        $method = $class->getMethod('registerClientScript');
        $method->setAccessible(true);

        $model = new Post();
        $model->create_time = 1425807308;

        $widget = TestDateRangePicker::begin(
            [
                'form' => new ActiveForm(),
                'model' => $model,
                'attribute' => 'date_from',
                'attributeTo' => 'date_to',
                'language' => 'es',
                'clientEvents' => [
                    'changeDate' => new JsExpression('function(ev){console.log(ev);}')
                ]
            ]
        );
        $class->getProperty('language')->setValue($widget, 'es');
        $view = $this->getView();
        $widget->setView($view);
        $method->invoke($widget);

        $test = <<<JS
;jQuery('#post-date_from').parent().parent().closest('.field-post-date_from').removeClass('field-post-date_from');
;jQuery('#post-date_from').parent().parent().datepicker({"language":"es"});
;jQuery('#post-date_from').parent().parent().on('changeDate', function(ev){console.log(ev);});
JS;
        $this->assertEquals($test, $view->js[View::POS_READY]['test-daterangepicker-js']);
    }
}
