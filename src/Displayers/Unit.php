<?php

namespace Huozi\Admin\Displayers;

use Encore\Admin\Grid\Displayers\AbstractDisplayer;

class Unit extends AbstractDisplayer
{

    public function display($unit = '', $left = true)
    {
        $value = $this->getValue();
        return $left ? ($unit . $value) : ($value . $unit);
    }
}
