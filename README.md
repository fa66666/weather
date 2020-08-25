<h1 align="center"> fa/weather </h1>

<p align="center">基于 的 PHP 天气信息组件</p>


## 安装

```shell
$ composer require fa/weather -vvv
```
## 配置
在使用本扩展之前，你需要去 注册账号，然后创建应用，获取应用的 API Key。

## 使用

```php
use Overtrue\Weather\Weather;
$key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx';
$weather = new Weather($key);
```
## 获取实时天气
```$xslt
$response = $weather->getWeather('深圳');
```
示例：
```php
{
 "status": "1",
 "count": "1",
 "info": "OK",
 "infocode": "10000",
 "lives": [
     {
         "province": "广东",
         "city": "深圳市",
         "adcode": "440300",
         "weather": "中雨",
         "temperature": "27",
         "winddirection": "西南",
         "windpower": "5",
         "humidity": "94",
         "reporttime": "2018-08-21 16:00:00"
     }
 ]
}
```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com//a/weather/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com//a/weather/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT