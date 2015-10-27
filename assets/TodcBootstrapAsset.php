<?php

namespace app\assets;

use yii\web\AssetBundle;

class TodcBootstrapAsset extends AssetBundle
{
    public $sourcePath = '@vendor/todc/todc-bootstrap/dist';
    public $css = [
        'css/bootstrap.css', 'css/todc-bootstrap.css'
    ];
    public $js = ['js/bootstrap.min.js'];
    
}
