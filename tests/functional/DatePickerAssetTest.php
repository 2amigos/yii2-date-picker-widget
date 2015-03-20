<?php

namespace tests;


use dosamigos\datepicker\DatePickerAsset;
use yii\web\AssetBundle;

class DatePickerAssetTest extends TestCase
{
    public function testRegister()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        DatePickerAsset::register($view);
        $this->assertEquals(4, count($view->assetBundles));
        $this->assertArrayHasKey('yii\\web\\JqueryAsset', $view->assetBundles);
        $this->assertTrue($view->assetBundles['dosamigos\\datepicker\\DatePickerAsset'] instanceof AssetBundle);
        $content = $view->render('//layouts/rawlayout.php');
        $this->assertContains('jquery.js', $content);
        $this->assertContains('bootstrap.js', $content);
        $this->assertContains('bootstrap-datepicker.js', $content);
        $this->assertContains('bootstrap-datepicker3.css', $content);

    }
}
