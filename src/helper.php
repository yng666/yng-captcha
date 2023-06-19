<?php
use Yng\Captcha\Facade\Captcha;
use Yng\Facade\Route;
use Yng\Response;

/**
 * @param string $config
 * @return \Yng\Response
 */
function captcha($config = null): Response
{
    return Captcha::create($config);
}

/**
 * @param $config
 * @return string
 */
function captcha_src($config = null): string
{
    return Route::buildUrl('/captcha' . ($config ? "/{$config}" : ''));
}

/**
 * 图片验证码
 * @param $id
 * @return string
 */
function captcha_img($id = '', $domid = ''): string
{
    $src = captcha_src($id);
  
    $domid = empty($domid) ? $domid : "id='" . $domid . "'";

    return "<img src='{$src}' alt='captcha' " . $domid . " onclick='this.src=\"{$src}?\"+Math.random();' />";
}

/**
 * 检测验证码
 * @param string $value
 * @return bool
 */
function captcha_check($value)
{
    return Captcha::check($value);
}
