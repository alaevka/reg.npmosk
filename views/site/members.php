<?php
use yii\helpers\Url;
use kartik\grid\GridView;


$this->title = 'Реестр членов СОЮЗа "МОСОБЛСТРОЙКОМПЛЕКС"';
?>

<div>
  <!-- Nav tabs -->
  	<ul class="nav nav-tabs nav-tabs-google" role="tablist">
    	<li role="presentation" class="active"><a href="<?= Url::to(['site/members']); ?>">Реестр членов</a></li>
    	<li role="presentation"><a href="<?= Url::to(['site/attestates']); ?>">Реестр аттестатов</a></li>
    	<li role="presentation"><a href="<?= Url::to(['site/debtors']); ?>">Реестр должников</a></li>
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
				        	'attribute' => 'C_ID',
				        	'filterInputOptions' => ['style' => 'width: 40px;', 'class' => 'form-control'],
				        	'contentOptions' => ['style' => 'text-align: center;']
				        ],
				        [
				        	'attribute' => 'LicensesName',
				        	'filterInputOptions' => ['style' => 'width: 200px;', 'class' => 'form-control'],
				        	'contentOptions' => ['style' => 'width: 210px;']
				        ],
				        [
				        	'attribute' => 'C_FName',
				        	'filterInputOptions' => ['style' => 'width: 96%;', 'class' => 'form-control'],
				        ],
				        [
				        	'attribute' => 'C_INN',
				        	'filterInputOptions' => ['style' => 'width: 100px;', 'class' => 'form-control'],
				        	'contentOptions' => ['style' => 'text-align: center;']
				        ],
				        [
				        	'attribute' => 'C_OGRN',
				        	'filterInputOptions' => ['style' => 'width: 100px;', 'class' => 'form-control'],
				        	'contentOptions' => ['style' => 'text-align: center;']
				        ],
				        [
				        	'label' => 'Адрес',
				        	'filterInputOptions' => ['style' => 'width: 96%;', 'class' => 'form-control'],
				        	'attribute' => 'C_LA_PIndex',
				        	'value' => function ($model, $key, $index, $widget) {
				        		if(!empty($model->C_LA_PIndex)) {
				        			$index = $model->C_LA_PIndex.', ';
				        		} else {
				        			$index = '';
				        		}

				        		if(!empty($model->C_LA_Region)) {
				        			$region = $model->C_LA_Region.', ';
				        		} else {
				        			$region = '';
				        		}

				        		if(!empty($model->C_LA_District)) {
				        			$district = $model->C_LA_District.', ';
				        		} else {
				        			$district = '';
				        		}

				        		if(!empty($model->C_LA_District)) {
				        			$district = $model->C_LA_District.', ';
				        		} else {
				        			$district = '';
				        		}

				        		if(!empty($model->C_LA_City)) {
				        			$city = $model->C_LA_City.', ';
				        		} else {
				        			$city = '';
				        		}

				        		if(!empty($model->C_LA_Adress)) {
				        			$address = $model->C_LA_Adress.', ';
				        		} else {
				        			$address = '';
				        		}

				        		return $index.$region.$district.$city.$address;


				        	},
				        ],
				        [
				        	'attribute' => 'C_Status',
				        	'filter' => ['Член НП' => 'Член НП', 'Исключён' => 'Исключён'],
				        	'filterInputOptions' => ['style' => 'width: 120px;', 'class' => 'form-control'],
				        	'contentOptions' => ['style' => 'text-align: center;']
				        ],
				    ],
				]);
					
			?>
		</div>
	</div>
</div>