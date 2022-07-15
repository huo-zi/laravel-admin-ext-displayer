<?php

namespace Huozi\Admin\Displayers;

use EasyWeChat\Kernel\Support\Arr;
use Encore\Admin\Grid\Displayers\AbstractDisplayer;

class Multiline extends AbstractDisplayer
{

    public function display($columns = null)
    {
        $columns = func_num_args() > 1 ? func_get_args() : Arr::wrap($columns);
        return implode('<br/>', array_map(function ($column) {
            return data_get($this->row, $column);
        }, $columns));
    }
}
