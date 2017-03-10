<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchMeteostation */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Метеостанции';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meteostation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать метеостанцию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'type',
            'meteoId',
            'meteoDriver',

             [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete} {link}',
            'buttons' => [
                'update' => function ($url,$model) {
                    return Html::a(
                    '<span class="glyphicon glyphicon-screenshot"></span>', 
                    $url);
                },
                'view'=>function($url,$model) {
                    return Html::a(
                    '<span class="glyphicon glyphicon-eye-open"></span>', 
                    $url);
                },
                'delete' => function ($url,$model) {
                    return Html::a(
                      '<span class="glyphicon glyphicon-trash"></span>',    
                      $url,
                      [
                          'title'=>'Удалить',
                          'aria-label'=>'Удалить',
                          'data-confirm'=>"Вы уверены, что хотите удалить этот элемент?",
                          'data-method'=>"post", 
                          'data-pjax'=>"0"
                      ]
                    );
                                   }, 
             ],
            ],
        ],
    ]); ?>
</div>
