<?php

namespace Huozi\Admin\Displayers;

use Encore\Admin\Admin;
use Encore\Admin\Grid\Displayers\AbstractDisplayer;
use Illuminate\Support\Str;

class ProgressRefresh extends AbstractDisplayer
{
    private $handle;

    public function display($handle = null, $seconds = 5)
    {
        $id = 'progress_' . $this->getKey();

        $this->handle = $handle;
        $this->handle AND $this->addScript($id, $seconds);
        return sprintf('<div id="%s">%s</div>', $id, $this->value);
    }

    protected function addScript($id, $seconds)
    {
        $url = $this->getLoadUrl();
        $script = <<<SCRIPT
        let {$id}_handle = function () {
            let bar = $('#{$id} .progress-bar');
            let now = $('#{$id} .col-sm-3');
            if (bar.length && parseInt(now.text()) < bar.attr('aria-valuemax')) {
                $.get('{$url}', function(data) {
                    now.text(data + '%');
                    bar.css('width', data + '%');
                });
            } else {
                clearInterval({$id}_timer);
            }
        }
        let {$id}_timer = setInterval({$id}_handle, {$seconds}000);
SCRIPT;
        Admin::script($script);
    }

    protected function getLoadUrl()
    {
        $renderable = str_replace('\\', '_', $this->handle);
        $key = $this->getKey();

        return route('admin.handle-renderable', compact('renderable', 'key'));
    }
}
