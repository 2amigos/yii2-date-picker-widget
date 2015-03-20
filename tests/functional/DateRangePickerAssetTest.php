<?php

namespace tests;

use tests\data\overrides\TestDateRangePickerAsset;
use yii\web\AssetBundle;

class DateRangePickerAssetTest extends TestCase
{
    public function testRegister()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        TestDateRangePickerAsset::register($view);
        $this->assertEquals(5, count($view->assetBundles));
        $this->assertArrayHasKey('yii\\web\\JqueryAsset', $view->assetBundles);
        $this->assertTrue($view->assetBundles['tests\\data\\overrides\\TestDateRangePickerAsset'] instanceof AssetBundle);
        $content = $view->renderFile('@tests/data/views/rawlayout.php');
        $this->assertContains('jquery.js', $content);
        $this->assertContains('bootstrap.js', $content);
        $this->assertContains('bootstrap-daterangepicker.css', $content);

    }
}
