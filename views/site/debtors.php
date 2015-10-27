<?php
use yii\helpers\Url;
use kartik\grid\GridView;


$this->title = 'Реестр должников СОЮЗа "МОСОБЛСТРОЙКОМПЛЕКС"';
?>

<div>
  <!-- Nav tabs -->
  	<ul class="nav nav-tabs nav-tabs-google" role="tablist">
    	<li role="presentation"><a href="<?= Url::to(['site/members']); ?>">Реестр членов</a></li>
    	<li role="presentation"><a href="<?= Url::to(['site/attestates']); ?>">Реестр аттестатов</a></li>
    	<li role="presentation" class="active"><a href="<?= Url::to(['site/debtors']); ?>">Реестр должников</a></li>
    	<li class="pull-right logobar"><a href="<?= Url::to(['/']); ?>"><b>СОЮЗ "МОСОБЛСТРОЙКОМПЛЕКС"</b></a></li>
  	</ul>
  <!-- Tab panes -->
  <div class="tab-content">
    	<div role="tabpanel" class="tab-pane active" id="members">
          <?php
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'pjax'=>true,
                'hover'=>true,
                'responsive' =>false,
                'resizableColumns'=>false,
                'floatHeader'=>true,
                'floatHeaderOptions'=>['scrollingTop'=>'50'],
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],
                    // Simple columns defined by the data contained in $dataProvider.
                    // Data from the model's column will be used.
                    [
                      'attribute' => 'C_INN',
                      'filterInputOptions' => ['style' => 'width: 200px;', 'class' => 'form-control'],
                      'contentOptions' => ['style' => 'text-align: center; width: 210px;']
                    ],
                    [
                      'attribute' => 'C_SName',
                      'filterInputOptions' => ['class' => 'form-control', 'style' => 'width: 96%;',],
                      'contentOptions' => ['style' => 'text-align: left; width: 400px;']
                    ],
                    [
                      'attribute' => 'Periods',
                      'filterInputOptions' => ['class' => 'form-control', 'style' => 'width: 96%;'],
                    ],
                    
                ],
            ]);
              
          ?>
      </div>
  </div>
</div>