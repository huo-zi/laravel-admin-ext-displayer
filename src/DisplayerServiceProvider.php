<?php

namespace Huozi\Admin;

use Encore\Admin\Grid;
use Encore\Admin\Grid\Column;
use Huozi\Admin\Displayers\Ellipsis;
use Huozi\Admin\Displayers\Increase;
use Huozi\Admin\Displayers\Multiline;
use Huozi\Admin\Displayers\ProgressRefresh;
use Huozi\Admin\Displayers\Unit;
use Illuminate\Support\ServiceProvider;

class DisplayerServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(DisplayerExtension $extension)
    {
        if (! DisplayerExtension::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'laravel-admin-displayer');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/huo-zi/laravel-admin-displayer')],
                'laravel-admin-displayer'
            );
        }

        Grid::init(function (Grid $grid) {
            Column::extend('ellipsis', Ellipsis::class);
            Column::extend('increase', Increase::class);
            Column::extend('increase', Multiline::class);
            Column::extend('progressRefresh', ProgressRefresh::class);
            Column::extend('unit', Unit::class);
        });
    }
}