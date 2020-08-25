<?php
/**
 * Created by PhpStorm.
 * Author: suzhiF
 * Date: 2020/8/25 0025
 */

namespace Fa\Weather;


class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Weather::class, function () {
            return new Weather(config('service.weather.key'));
        });
        $this->app->alias(Weather::class, 'weather');

    }

    public function provider()
    {
        return [Weather::class,'weather'];
    }

}