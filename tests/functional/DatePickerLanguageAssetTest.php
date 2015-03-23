<?php

namespace tests;


use dosamigos\datepicker\DatePickerLanguageAsset;
use yii\web\AssetBundle;

class DatePickerLanguageAssetTest extends TestCase
{
    public function testRegister()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        DatePickerLanguageAsset::register($view)->js[] = 'bootstrap-datepicker.es.min.js';
        $this->assertEquals(5, count($view->assetBundles));
        $this->assertTrue($view->assetBundles['dosamigos\\datepicker\\DatePickerLanguageAsset'] instanceof AssetBundle);
        $content = $view->render('//layouts/rawlayout.php');
        $this->assertContains('jquery.js', $content);
        $this->assertContains('bootstrap-datepicker.es.min.js', $content);

    }
}
