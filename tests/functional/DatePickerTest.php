<?php

namespace tests;


use dosamigos\datepicker\DatePicker;
use tests\models\Post;
use tests\overrides\TestDatePicker;
use yii\web\JsExpression;
use yii\web\View;
use Yii;

class DatePickerTest extends TestCase
{

    public function testRenderWithModel()
    {
        $model = new Post();
        $model->create_time = 1425807308;
        $out = DatePicker::widget([
            'model' => $model,
            'attribute' => 'create_time'
        ]);
        $expected = '<div class="input-group date"><input type="text" id="post-create_time" class="form-control" name="Post[create_time]" value="1425807308"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span></div>';

        $this->assertEqualsWithoutLE($expected, $out);
    }

    public function testRenderWithNameAndValue()
    {
        $out = DatePicker::widget([
            'id' => 'test',
            'name' => 'test-editor-name',
            'value' => '02-16-2012'
        ]);
        $expected = '<div class="input-group date"><input type="text" id="test" class="form-control" name="test-editor-name" value="02-16-2012"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span></div>';

        $this->assertEqualsWithoutLE($expected, $out);
    }

    public function testRenderInline()
    {
        $out = DatePicker::widget([
            'id' => 'test',
            'name' => 'test-editor-name',
            'value' => 'test-editor-value',
            'inline' => true
        ]);
        $expected = '<input type="text" id="test" class="text-center form-control" name="test-editor-name" value="test-editor-value" readonly="readonly"><div></div>';

        $this->assertEqualsWithoutLE($expected, $out);
    }

    public function testRenderWithSize()
    {
        $out = DatePicker::widget([
            'id' => 'test',
            'name' => 'test-editor-name',
            'value' => 'test-editor-value',
            'size' => 'lg'
        ]);
        $expected = '<div class="input-group-lg input-group date"><input type="text" id="test" class="input-lg form-control" name="test-editor-name" value="test-editor-value"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span></div>';

        $this->assertEqualsWithoutLE($expected, $out);
    }


    public function testDatePickerRegisterPluginScriptMethod()
    {
        $class = new \ReflectionClass('tests\\overrides\\TestDatePicker');
        $method = $class->getMethod('registerClientScript');
        $method->setAccessible(true);

        $model = new Post();
        $model->create_time = 1425807308;

        $widget = TestDatePicker::begin(
            [
                'model' => $model,
                'attribute' => 'create_time',
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
;jQuery('#post-create_time').parent().datepicker({"language":"es"});
;jQuery('#post-create_time').parent().on('changeDate', function(ev){console.log(ev);});
JS;
        $this->assertEquals($test, $view->js[View::POS_READY]['test-datepicker-js']);
    }

    public function testWidget()
    {
        $model = new Post();
        $view = Yii::$app->getView();
        $content = $view->render('//datepicker-widget', ['model' => $model]);
        $actual = $view->render('//layouts/main', ['content' => $content]);
        $expected = file_get_contents(__DIR__ . '/data/test-datepicker-widget.bin');
        $this->assertEquals($expected, $actual);
    }
}
