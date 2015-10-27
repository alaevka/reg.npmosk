<?php
use yii\helpers\Url;
use kartik\grid\GridView;


$this->title = 'Реестр аттестатов СОЮЗа "МОСОБЛСТРОЙКОМПЛЕКС"';
?>

<div>
  <!-- Nav tabs -->
  	<ul class="nav nav-tabs nav-tabs-google" role="tablist">
    	<li role="presentation"><a href="<?= Url::to(['site/members']); ?>">Реестр членов</a></li>
    	<li role="presentation" class="active"><a href="<?= Url::to(['site/attestates']); ?>">Реестр аттестатов</a></li>
    	<li role="presentation"><a href="<?= Url::to(['site/debtors']); ?>">Реестр должников</a></li>
    	<li class="pull-right logobar"><a href="<?= Url::to(['/']); ?>"><b>СОЮЗ "МОСОБЛСТРОЙКОМПЛЕКС"</b></a></li>
  	</ul>
  <!-- Tab panes -->
  <div class="tab-content">
    	<div role="tabpanel" class="tab-pane active" id="members">
			<?php
				echo GridView::widget([
				    'dataProvider' => $dataProvider,
				    //'filterModel' => $searchModel,
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
				        	'attribute' => 'Att_Number',
				        	'filterInputOptions' => ['style' => 'width: 120px;', 'class' => 'form-control'],
				        	'contentOptions' => ['style' => 'text-align: center;']
				        ],
				        [
				        	'label' => 'Фамилия, Имя, Отчество аттестуемого',
				        	'value' => function ($model, $key, $index, $widget) {
				        		return $model->specialist->LastName.' '.$model->specialist->FirstName.' '.$model->specialist->MiddleName;
				        	},
				        	'attribute' => 'specialist'
				        ],
				        [
				        	'label' => 'Полное наименование организации и её правовая форма',
				        	'value' => function ($model, $key, $index, $widget) {
				        		return $model->specialist->c->C_FName;
				        	},
				        	'attribute' => 'company'
				        ],
				        [
				        	'label' => 'ИНН организации',
				        	'value' => function ($model, $key, $index, $widget) {
				        		return $model->specialist->c->C_INN;
				        	},
				        	'attribute' => 'company_inn'
				        ],
				        [
				        	'label' => 'Учебный центр, который проводил тестирование',
				        	'value' => function ($model, $key, $index, $widget) {
				        		return $model->institution->Inst_SName;
				        	},
				        	'attribute' => 'Inst_SName'
				        ],
				        [
				        	'attribute' => 'Att_Date',
				        ],
				        [
				        	'label' => 'Номера тестов',
				        	'value' => function ($model, $key, $index, $widget) {
				        		return $model->test->Test_Number;
				        	},
				        	'attribute' => 'Test_Number'
				        ],
				        [
				        	'label' => 'Дата протокола',
				        	'value' => function ($model, $key, $index, $widget) {
				        		return $model->protocol->Protocol_Date;
				        	},
				        	'attribute' => 'Protocol_Date'
				        ],
				        [
				        	'label' => 'Номер протокола',
				        	'value' => function ($model, $key, $index, $widget) {
				        		return $model->protocol->Prot_Number;
				        	},
				        	'attribute' => 'Prot_Number'
				        ],
				        [
				        	'attribute' => 'Att_DateExp'
				        ]
				        
				    ],
				]);
					
			?>
		</div>
	</div>
</div>