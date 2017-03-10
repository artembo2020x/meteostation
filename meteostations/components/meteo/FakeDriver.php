<?php 
namespace app\components\meteo;
class FakeDriver implements IMeteoDriver {
    public function getData(){
        return new MeteoData(time(),"30","760","80%","20","sw");
    }
}