<?php
/**
 * Created by PhpStorm.
 * User: Arif Budiman
 * Email: arif.56.budiman@gmail.com
 */

namespace backend\assets;

use yii\web\AssetBundle;

class BackAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'public/bower_components/bootstrap/dist/css/bootstrap.min.css',
        'public/bower_components/font-awesome/css/font-awesome.min.css',
        'public/bower_components/Ionicons/css/ionicons.min.css',
        'public/dist/css/AdminLTE.min.css',
        'public/dist/css/skins/_all-skins.min.css',
    ];
    public $js = [
        'public/bower_components/bootstrap/dist/js/bootstrap.min.js',
        'public/dist/js/adminlte.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}