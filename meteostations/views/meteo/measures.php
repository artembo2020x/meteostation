<?php
use yii\helpers\Html;
use yii\helpers\BaseUrl;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use app\models\Meteostation;
$this->title="Измерения станций";
$this->params['breadcrumbs'][]=$this->title;
  ActiveForm::begin(['action'=>BaseUrl::toRoute('meteo/measures'),'method'=>'post']);
    echo "<label>Выберите станцию:</label> ";
    echo Html::dropDownList('station',$meteoData->getAttribute('meteoId'),$drops);
    echo " ";
    echo Html::submitButton('Выбрать',array('class'=>'btn btn-primary'));
  ActiveForm::end();
  echo "<br/>";
  $model=$meteoData->getMeteoData();
  echo DetailView::widget([
        'model' =>$model,
        'attributes' => [
            [
                'label'=>'Дата и время',
                'value'=>date("d M Y H:i",$model->timestamp),
            ],
            [
            'label'=>'Температура',    
            'value'=>$model->temperature,
            ],
            [
            'label'=>'Давление',    
            'value'=>$model->pressure,
            ],
            [
            'label'=>'Скорость ветра',    
            'value'=>$model->windSpeed,
            ],
            [
            'label'=>'Направление ветра',    
            'value'=>$model->windDirection,
            ],
            [
            'label'=>'Влажность',    
            'value'=>$model->humidity
            ]
        ],
  ]);