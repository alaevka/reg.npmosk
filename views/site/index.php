<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Реестр членов СОЮЗа "МОСОБЛСТРОЙКОМПЛЕКС"';
?>
<div class="background">
	<div class="content-main-page">
		СОЮЗ "МОСОБЛСТРОЙКОМПЛЕКС"<br>
		<ul class="nav nav-tabs nav-tabs-google" role="tablist" style="width: 100%;">
	    	<li role="presentation" style="width: 33%;"><a href="<?= Url::to(['site/members']); ?>">Реестр членов</a></li>
	    	<li role="presentation" style="width: 33%;"><a href="<?= Url::to(['site/attestates']); ?>">Реестр аттестатов</a></li>
	    	<li role="presentation" style="width: 33%;"><a href="<?= Url::to(['site/debtors']); ?>">Реестр должников</a></li>
	  	</ul>
	</div>
</div>