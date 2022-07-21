<?php
/**
 *
 * @copyright Copyright (c) 2020 cleverstone
 *
 */

use yii\helpers\Html;
use app\builder\assets\MainAsset;

/* @var $this \yii\web\View */
/* @var $content string */
MainAsset::register($this);
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="author" content="cleverstone">
        <meta name="robots" content="noindex, nofollow">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0,user-scalable=0">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Yii::$app->params['admin_title'] . ($this->title ? ' | ' . Html::encode($this->title) : '') ?></title>
        <?php $this->head() ?>
    </head>
    <body ng-app="_EasyApp">
    <?php $this->beginBody() ?>
    <div class="ym-app">
        <!--Brand-->
        <script>
            /*console.log("%c@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@\n" +
                "@``````````.@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@``````````@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@\n" +
                "@```````````@@```@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@``````````@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@\n" +
                "@```````````@@```@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@``````````@@#``.@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@\n" +
                "@```.......:@@```@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@```@@@@@@@@@#``.@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@\n" +
                "@```@@@@@@@@@@```@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@```@@@@@@@@@#``.@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@\n" +
                "@```@@@@@@@@@@```@#````````@:``#@@:``#@````````#@```@@@@```@@@@@@@@.`````@@````````@@````````@@````````#@\n" +
                "@```@@@@@@@@@@```@#````````#'``,@@```@@````````#@```;`,@``````````@``````@@````````@@````````@@````````#@\n" +
                "@```@@@@@@@@@@```@#````````#@```@@```@@````````#@`````,@``````````@``````@@````````@@````````@@````````#@\n" +
                "@```@@@@@@@@@@```@#``.@@```#@```@'``,@@```@@```#@`````,@``````````@:.```.@@```..```@@```..```@@```@@```#@\n" +
                "@```@@@@@@@@@@```@#````````#@,``;.``+@@````````#@````;@@.......```@@#``.@@@```@@```@@```@@```@@````````#@\n" +
                "@```@@@@@@@@@@```@#````````#@#``.```@@@````````#@```@@@@@@@@@@@```@@#``.@@@```@@```@@```@@```@@````````#@\n" +
                "@```@@@@@@@@@@```@#````````#@@``````@@@````````#@```@@@@@@@@@@@```@@#``.@@@```@@```@@```@@```@@````````#@\n" +
                "@```.......:@@```@#``.@@@@@@@@.````;@@@```@@@@@@@```@@@@.......```@@#``.@@@```@@```@@```@@```@@```@@@@@@@\n" +
                "@```````````@@```@#````````@@@;````@@@@````````#@```@@@@``````````@@#````@@````````@@```@@```@@````````#@\n" +
                "@```````````@@```@#````````#@@@````@@@@````````#@```@@@@``````````@@#````@@````````@@```@@```@@````````#@\n" +
                "@``````````.@@```@#````````#@@@```,@@@@````````#@```@@@@``````````@@#````@@````````@@```@@```@@````````#@\n" +
                "@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@", "color:#337ab7;font-size:12px;");*/

        </script>

        <!--content-->
        <main class="container-fluid ym-content-fluid" ng-cloak>
            <?= $content ?>
        </main>

    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>