<?php

namespace Yng\Captcha\Facade;

use Yng\Facade;

/**
 * 验证码门面
 * Class Captcha
 * @package Yng\Captcha\Facade
 * @mixin \Yng\Captcha\Captcha
 */
class Captcha extends Facade
{
    protected static function getFacadeClass()
    {
        return \Yng\Captcha\Captcha::class;
    }
}
