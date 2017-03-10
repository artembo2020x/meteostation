<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Meteostation;
class MeteoController extends Controller
{
    /** получение всех измерений с выбраной станции
     * @station - номер станции
     * @meteoData - экземпляр выбранной метеостанции
     * @drops - выпадающий список станций 
     */
    public function actionMeasures()
    {
        $station=isset(Yii::$app->request->post()['station'])?Yii::$app->request->post()['station']:null;
        $ma=Meteostation::find()->all();
        $drops=array();
        $currm=$ma[0];
        foreach($ma as $m) {
            $drops[$m->getAttribute('meteoId')]=$m->getAttribute('name')."(".$m->getAttribute("meteoDriver").")";
            if(!isset($station) || $m->getAttribute('meteoId')==$station) { $currm=$m; } 
        }
        return $this->render('measures',['meteoData'=>$currm,'drops'=>$drops]);  
    }
}