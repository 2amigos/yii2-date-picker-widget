<?php
/**
 * @copyright Copyright (c) 2013-2015 2amigOS! Consulting Group LLC
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
    public $sourcePath = '@vendor/bower/bootstrap-datepicker/dist';

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset'
    ];

    public function init() {
        $this->css[] = YII_DEBUG ? 'css/bootstrap-datepicker3.css' : 'css/bootstrap-datepicker3.min.css';
        $this->js[] = YII_DEBUG ? 'js/bootstrap-datepicker.js' : 'js/bootstrap-datepicker.min.js';
    }
}
