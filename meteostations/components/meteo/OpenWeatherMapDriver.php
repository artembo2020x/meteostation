<?php
namespace app\components\meteo;
class OpenWeatherMapDriver implements IMeteoDriver {
    public $root="http://samples.openweathermap.org";
    private $station_id;
    public function _construct($id) {
        $this->station_id=$id;
    }
    private function getTransfer($url) {
        $ch=curl_init($url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER,0);
        $transfer=curl_exec($ch);
        curl_close($ch);
        return $transfer;
    }
    public function getData() {
        $url=$this->root."/data/2.5/weather?id=".$this->station_id."&appid=b1b15e88fa797225412429c1c50c122a1";
        $res=$this->getTransfer($url);
        $res=json_decode($res,true);
        $t=$res['main']['temp'];
        $p=$res['main']['pressure'];
        $h=$res['main']['humidity'];
        $windSpeed=$res['wind']['speed'];
        return new MeteoData(time(),$t,$p,$h,$windSpeed,$windDirection);
    }
}