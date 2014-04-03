<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\datepicker;

use yii\web\AssetBundle;

/**
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\yii2\widgets
 */
class DateRangePickerAsset extends AssetBundle
{
    public $sourcePath = '@vendor/2amigos/yii2-date-picker-widget/assets';

    public $css = [
        'css/daterangepicker.css'
    ];

    public $depends = [
        'dosamigos\datepicker\DatePickerAsset'
    ];

} 