<?php
/**
 * @copyright Copyright (c) 2013-2015 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\datepicker;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

/**
 * DatePicker renders a DatePicker input.
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\datepicker
 */
class DatePicker extends InputWidget
{
    use DatePickerTrait;

    /**
     * @var string the addon markup if you wish to display the input as a component. If you don't wish to render as a
     * component then set it to null or false.
     */
    public $addon = '<i class="glyphicon glyphicon-calendar"></i>';
    /**
     * @var string the template to render the input.
     */
    public $template = '{input}{addon}';
    /**
     * @var bool whether to render the input as an inline calendar
     */
    public $inline = false;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if ($this->inline) {
            $this->options['readonly'] = 'readonly';
            Html::addCssClass($this->options, 'text-center');
        }
        if ($this->size) {
            Html::addCssClass($this->options, 'input-' . $this->size);
            Html::addCssClass($this->containerOptions, 'input-group-' . $this->size);
        }
        Html::addCssClass($this->options, 'form-control');
        Html::addCssClass($this->containerOptions, 'input-group date');
    }

    /**
     * @inheritdoc
     */
    public function run()
    {

        $input = $this->hasModel()
            ? Html::activeTextInput($this->model, $this->attribute, $this->options)
            : Html::textInput($this->name, $this->value, $this->options);

        if ($this->inline) {
            $input .= '<div></div>';
        }
        if ($this->addon && !$this->inline) {
            $addon = Html::tag('span', $this->addon, ['class' => 'input-group-addon']);
            $input = strtr($this->template, ['{input}' => $input, '{addon}' => $addon]);
            $input = Html::tag('div', $input, $this->containerOptions);
        }
        if ($this->inline) {
            $input = strtr($this->template, ['{input}' => $input, '{addon}' => '']);
        }
        echo $input;

        $this->registerClientScript();
    }

    /**
     * Registers required script for the plugin to work as DatePicker
     */
    public function registerClientScript()
    {
        $js = [];
        $view = $this->getView();

        // @codeCoverageIgnoreStart
        if ($this->language !== null) {
            $this->clientOptions['language'] = $this->language;
            DatePickerLanguageAsset::register($view)->js[] = 'bootstrap-datepicker.' . $this->language . '.min.js';
        } else {
            DatePickerAsset::register($view);
        }
        // @codeCoverageIgnoreEnd

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
        $view->registerJs(implode("\n", $js));
    }

}
