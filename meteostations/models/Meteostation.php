<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;
use app\components;
class Meteostation extends ActiveRecord {
    public static function tableName()
    {
        return 'meteostation';
    }
    public function rules()
    {
        return [
            [['name', 'type', 'meteoDriver','meteoId'], 'safe'],
        ];
    }
    public function getPrimaryKey($asArray=false) {
        return 'meteoId';
    }
    public function getPrimaryKeyValue($sign=false) {
        
        if($sign || $this->getPrimaryKey()!='id') return $this->getAttribute($this->getPrimaryKey());
        else return '';
    }
    public static function getDrivers() {
        return ['fake'=>'fake','openWeatherMap'=>'openWeatherMap'];
    }
    
    public function attributeLabels() {
        return [
            'name'=>'Название',
            'meteoId'=>'Номер',
            'type'=>'Тип',
            'meteoDriver'=>'Драйвер'
            ]; 
    }
    private function setMeteoDriver($name) {
        $this->attributes=['meteoDriver'=>$name];
        return $this->save();
    }
    public function getMeteoData($id) {
        $classname="\\app\\components\\meteo\\".ucfirst($this->getAttribute('meteoDriver'))."Driver";
        $dr=new $classname($this->getAttribute('meteoId'));
        return $dr->getData();
    }
}