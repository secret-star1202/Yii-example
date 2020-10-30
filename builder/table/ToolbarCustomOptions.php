<?php
/**
 * @link http://www.cleverstone.cn/
 * @copyright Copyright (c) 2020 黑与白
 * @license http://yii-manager.cleverstone.cn/license/
 */

namespace app\builder\table;

use Yii;
use yii\helpers\Url;
use app\builder\common\BaseOptions;

/**
 * 工具栏自定义项选项
 *
 * @author cleverstone <yang_hui_lei@163.com>
 * @since 1.0
 */
class ToolbarCustomOptions extends BaseOptions
{
    /**
     * 位置
     *
     * - left 左边
     * - right 右边
     * @var string
     * @since 1.0
     */
    public $pos = 'left';

    /**
     * 标题
     *
     * @var string
     * @since 1.0
     */
    public $title = '自定义';

    /**
     * Icon
     *
     * @var string
     * @since 1.0
     */
    public $icon = 'glyphicon glyphicon-send';

    /**
     * 选项
     *
     * - page  页面
     * - modal 模态框
     * - ajax  XMLHttpRequest
     * @var string
     * @since 1.0
     */
    public $option = 'page';

    /**
     * 路由
     *
     * @var string
     * @since 1.0
     */
    public $route = '';

    /**
     * 参数
     *
     * @var array
     * @since 1.0
     */
    public $params = [];

    /**
     * 访问动作, ajax有效
     *
     * @var string
     * @since 1.0
     */
    public $method = 'get';

    /**
     * 当前type为modal时有效，指定modal的宽，默认800px
     *
     * @var string
     * @since 1.0
     */
    public $width = '800px';

    /**
     * 当前type为modal时有效，指定modal的高，默认520px
     *
     * @var string
     * @since 1.0
     */
    public $height = '520px';

    /**
     * 初始化选项
     *
     * @author cleverstone <yang_hui_lei@163.com>
     * @since 1.0
     */
    public function init()
    {
        if (!empty($this->route)) {
            $this->route = Url::toRoute('/' . ltrim($this->route, '/'));
        } else {
            $this->route = Url::toRoute('/' . Yii::$app->controller->route);
        }

        $this->method = strtolower($this->method);
    }
}