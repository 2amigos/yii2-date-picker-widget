<?php

namespace tests;


use tests\overrides\TestDatePickerLanguageAsset;
use yii\web\AssetBundle;

class DatePickerLanguageAssetTest extends TestCase
{
    public function testRegister()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        TestDatePickerLanguageAsset::register($view)->js[] = 'bootstrap-datepicker.es.min.js';
        $this->assertEquals(6, count($view->assetBundles));
        $this->assertTrue($view->assetBundles['tests\overrides\TestDatePickerLanguageAsset'] instanceof AssetBundle);
        $content = $view->render('//layouts/rawlayout.php');
        $this->assertContains('jquery.js', $content);
        $this->assertContains('bootstrap-datepicker.es.min.js', $content);

    }
}
