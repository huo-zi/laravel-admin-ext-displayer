<?php

namespace Huozi\Admin\Displayers;

use Encore\Admin\Grid\Displayers\AbstractDisplayer;

class Ellipsis extends AbstractDisplayer
{

    public function display($width = null)
    {
        return sprintf('<div style="width:%s;overflow:hidden;white-space:nowrap;text-overflow:ellipsis" title="%s">%s</div>', $width, $this->value, $this->value);
    }
}
