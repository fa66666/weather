<?php
/**
 * Created by PhpStorm.
 * Author: suzhiF
 * Date: 2020/8/25 0025
 */

namespace Fa\Weather\tests;

use Fa\Weather\Exceptions\InvalidArgumentException;
use Fa\Weather\Weather;
use PHPUnit\Framework\TestCase;

class WeatherTest extends TestCase
{
    public function getWeather()
    {

    }

    public function testGetHttpClient()
    {

    }

    public function testSetGuzzleOptions()
    {

    }

    /**
     * 检查 type 参数
     * @throws InvalidArgumentException
     * @throws \Fa\Weather\Exceptions\HttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * Author:suzhiF
     * Date: 2020/8/25 0025
     */
    public function testGetWeatherWithInvalidType()
    {
        $w = new Weather('mock-key');

        // 断言会抛出此异常类
        $this->expectException(InvalidArgumentException::class);

        // 断言异常消息为 "Invalid type value(bean/all): foo"
        $this->expectExceptionMessage('Invalid type value(bean/all) : foo');

        $w->getWeather('深圳', 'foo');

        $this->fail('Failed to assert getWeather throw expect');
    }

    /**
     *  检查 $format 参数
     * @throws InvalidArgumentException
     * @throws \Fa\Weather\Exceptions\HttpException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * Author:suzhiF
     * Date: 2020/8/25 0025
     */
    public function testGetWeatherWithInvalidFromat()
    {
        $w = new Weather('mock-key');
        // 断言会抛出此异常类
        $this->expectException(InvalidArgumentException::class);

        // 断言异常消息为 "Invalid type value(bean/all): foo"
        $this->expectExceptionMessage('Invalid type value(bean/all) : foo');

        // 因为支持格式为 xml/json，所以传入 array 会抛出异常
        $w->getWeather('深圳', 'base', 'array');

        // 如果没有抛出异常，就会运行到这行，标记当前测试没有成功
        $this->fail('Failed to assert getWeather throw expect');
    }

}