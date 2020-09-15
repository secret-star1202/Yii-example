<?php
// +----------------------------------------------------------------------
// | yii-manager version 1.0.0
// +----------------------------------------------------------------------
// | 日期：2020/8/13
// +----------------------------------------------------------------------
// | 作者：cleverstone <yang_hui_lei@163.com>
// +----------------------------------------------------------------------

namespace app\admin\controllers;

use app\models\AdminUser;
use app\builder\ViewBuilder;
use app\builder\common\CommonController;

/**
 * 首页
 * @author cleverstone <yang_hui_lei@163.com>
 * @since 1.0
 */
class IndexController extends CommonController
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
    public $undetectedActions = [
        'index',
    ];

    /**
     * Renders the index view for the module
     * @return string
     * @throws \yii\base\NotSupportedException
     * @throws \Throwable
     * @author cleverstone <yang_hui_lei@163.com>
     * @since 1.0
     */
    public function actionIndex()
    {
        return ViewBuilder::table()
            ->setTitle('首页')
            ->setColumns([
                'id' => table_column_helper('ID'),
                'username' => table_column_helper('用户名'),
                'email' => table_column_helper('邮箱'),
                'mobile' => table_column_helper('电话', [], function ($item) {
                    return '+' . $item['an'] . ' ' . $item['mobile'];
                }),
                'created_at' => table_column_helper('注册时间'),
                'updated_at' => table_column_helper('更新时间'),
            ])
            ->setQuery(function () {
                $query = AdminUser::find();
                return $query;
            })
            ->setOrderBy('id DESC')
            ->setPage()
            ->render($this);
    }
}
