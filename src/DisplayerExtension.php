<?php

namespace Huozi\Admin;

use Encore\Admin\Extension;

class DisplayerExtension extends Extension
{
    public $name = 'laravel-admin-displayer';

    public $views = __DIR__.'/../resources/views';

    public $assets = __DIR__.'/../resources/assets';

}