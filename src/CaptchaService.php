<?php

namespace Yng\Captcha;

use Yng\Route;
use Yng\Service;
use Yng\Validate;

class CaptchaService extends Service
{
    public function boot()
    {
        Validate::maker(function ($validate) {
            $validate->extend('captcha', function ($value) {
                return captcha_check($value);
            }, ':attribute错误!');
        });

        $this->registerRoutes(function (Route $route) {
            $route->get('captcha/[:config]', "\\Yng\\Captcha\\CaptchaController@index");
        });
    }
}
