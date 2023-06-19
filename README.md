# yng-captcha

YngPHP 验证码类库, 支持随机数字+字母、汉字、数学算术运算; 支持自定义验证码位数、调整验证码图片大小、背景色等,

## 安装
> composer require yng/yng-captcha


## 使用

### 1.在控制器中输出验证码

在控制器的操作方法中使用

```php
public function captcha($id = '')
{
	return captcha($id);
}
```
然后注册对应的路由来输出验证码


### 2.模板里输出验证码

首先要在你应用的路由定义文件中，注册一个验证码路由规则。

```php
\Yng\Facade\Route::get('captcha/[:id]', "\\Yng\\Captcha\\CaptchaController@index");
```

然后就可以在模板文件中使用
```php
<div>{{captcha_img()}}</div>
```
或者
```php
<div><img src="{{captcha_src()}}" alt="captcha" /></div>
```
> 上面两种的最终效果是一样的


### 3.控制器里验证

使用TP的内置验证功能即可
```php
$this->validate($data,[
    'captcha|验证码'=>'require|captcha'
]);
```
或者手动验证
```php
if(!captcha_check($captcha)){
 //验证失败
};
```