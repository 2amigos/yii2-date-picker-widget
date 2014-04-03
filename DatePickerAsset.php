<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\datepicker;

use yii\web\AssetBundle;

/**
 * DatePickerAsset
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\datepicker
 */
class DatePickerAsset extends AssetBundle
{
    public $sourcePath = '@vendor/2amigos/yii2-date-picker-widget/assets';

    public $css = [
        'css/datepicker.css'
    ];

    public $js = [
        'js/bootstrap-datepicker.js'
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset'
    ];
} 