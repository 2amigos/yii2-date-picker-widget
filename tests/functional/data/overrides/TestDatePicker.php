<?php
namespace tests\data\overrides;

use dosamigos\datepicker\DatePicker;
use dosamigos\datepicker\DatePickerAsset;
use yii\helpers\Json;
use yii\web\View;

class TestDatePicker extends DatePicker
{
    /**
     * Registers required script for the plugin to work as a DateTimePicker
     */
    public function registerClientScript()
    {

        $view = $this->getView();

        if ($this->language !== null) {
            $this->clientOptions['language'] = $this->language;
            DatePickerAsset::register($view)->js[] = 'js/locales/bootstrap-datepicker.' . $this->language . '.js';
        } else {
            DatePickerAsset::register($view);
        }

        $id = $this->options['id'];
        $selector = ";jQuery('#$id')";

        if ($this->addon || $this->inline) {
            $selector .= ".parent()";
        }

        $options = !empty($this->clientOptions) ? Json::encode($this->clientOptions) : '';

        if ($this->inline) {
            $this->clientEvents['changeDate'] = "function (e){ jQuery('#$id').val(e.format());}";
        }

        $js[] = "$selector.datepicker($options);";

        if (!empty($this->clientEvents)) {
            foreach ($this->clientEvents as $event => $handler) {
                $js[] = "$selector.on('$event', $handler);";
            }
        }
        $view->registerJs(implode("\n", $js), View::POS_READY, 'test-datepicker-js');
    }
}
