<?php

namespace tests\overrides;

use dosamigos\datepicker\DatePickerLanguageAsset;

class TestDatePickerLanguageAsset extends DatePickerLanguageAsset
{
    public $depends = [
        'tests\overrides\TestDateRangePickerAsset'
    ];
}
