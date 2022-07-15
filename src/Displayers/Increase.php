<?php

namespace Huozi\Admin\Displayers;

use Encore\Admin\Grid\Displayers\AbstractDisplayer;

class Increase extends AbstractDisplayer
{

    public function display($addition = '', $unit = '')
    {
        $current = $this->getValue();
        $addition = $addition instanceof \Closure ? call_user_func_array($addition->bindTo($this->row), [$this->row]) : data_get($this->row, $addition);
        $additionUnit = $unit == '%' ? '%' : '';
        return sprintf(
            '%s<span style="color:%s !important">(%s)</span>',
            $current,
            $addition >= 0 ? '#00a65a' : 'red',
            $addition >= 0 ? ('+' . $addition . $additionUnit) : ($addition . $additionUnit)
        );
    }
}
