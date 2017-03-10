<?php
namespace app\components\meteo;
class MeteoData {
    public $timestamp;//
    public $temperature;
    public $pressure;
    public $windSpeed;
    public $windDirection;
    public $humidity;
    public function __construct($time,$t,$p,$h,$speed,$dir) {
        $this->timestamp=$time;
        $this->temperature=$t;
        $this->pressure=$p;
        $this->humidity=$h;
        $this->windSpeed=$speed;
        $this->windDirection=$dir;
    }
}