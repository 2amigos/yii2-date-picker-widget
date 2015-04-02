<?php
/**
 * @copyright Copyright (c) 2013-2015 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\datepicker;

use yii\web\AssetBundle;

/**
 * DatePickerLanguageAsset
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\datepicker
 */
class DatePickerLanguageAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/bootstrap-datepicker/dist/locales';

    public $depends = [
        'dosamigos\datepicker\DateRangePickerAsset'
    ];
}
