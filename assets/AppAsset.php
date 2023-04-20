<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'client/dist/css/app.css',
        'client/dist/css/chunk-vendors.css'
    ];
    public $js = [
        'client/dist/js/app.js',
        'client/dist/js/chunk-vendors.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
