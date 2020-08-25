<?php
/**
 * Created by PhpStorm.
 * Author: suzhiF
 * Date: 2020/8/25 0025
 */

namespace Fa\Weather;


use Fa\Weather\Exceptions\HttpException;
use Fa\Weather\Exceptions\InvalidArgumentException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Weather
{
    protected $key;

    protected $guzzleOptions = [];

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function getHttpClient()
    {
        return new Client($this->guzzleOptions);
    }

    public function setGuzzleOptions(array $options)
    {
        $this->guzzleOptions = $options;
    }

    /**
     * @param string $city 城市名，比如：“深 圳” 或者（adcode：440300）；
     * @param string $type 返回内容类型： base : 返回实况天气 / all :返回预报天气；
     * @param string $format 输出的数据格式，默认为 json 格式，当output 设置为 “ xml ” 时，输出的为 XML 格式的数据
     * Author:suzhiF
     * Date: 2020/8/25 0025
     * @return string
     * @throws InvalidArgumentException
     * @throws HttpException
     * @throws GuzzleException
     */
    public function getWeather($city, $type = 'base', $format = 'json')
    {
        $url = 'https://restapi.amap.com/v3/weather/weatherInfo?parameters';

        if (!in_array(strtolower($format), ['xml', 'json'])) {
            throw new InvalidArgumentException('Invalid response format:' . $format);
        }
        if (!in_array(strtolower($type), ['base', 'all'])) {
            throw new InvalidArgumentException('Invalid response format:' . $type);
        }

        $query = array_filter([
            'key' => $this->key,
            'city' => $city,
            'output' => $format,
            'extensions' => $type
        ]);

        try {
            $response = $this->getHttpClient()->get($url, [
                'query' => $query
            ])->getBody()->getContents();
            return 'json' === $format ? json_encode($response) : $response;
        } catch (\Exception $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }
    }
}