<?php

namespace app\admin\controllers;

use app\builder\common\CommonController;

/**
 * 菜单
 * @author cleverstone
 * @since 1.0
 */
class MenuController extends CommonController
{
    /**
     * {@inheritdoc}
     */
    public $actionVerbs = [
        'index' => ['get'],
    ];

    /**
     * {@inheritdoc}
     */
    public $guestActions = [
        'index',
    ];

    /**
     * {@inheritdoc}
     */
    public $undetectedActions = [];

    /**
     * @author cleverstone
     * @since 1.0
     */
    public function actionIndex()
    {
        return '';
    }
}