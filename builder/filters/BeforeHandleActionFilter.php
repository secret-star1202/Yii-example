<?php

namespace app\builder\filters;

use Yii;
use yii\base\Behavior;
use yii\web\Application;
use yii\web\ForbiddenHttpException;

/**
 * 动作拦截器
 * @author cleverstone
 * @since 1.0
 */
class BeforeHandleActionFilter extends Behavior
{
    /**
     * inherit
     * @return array
     * @author cleverstone <yang_hui_lei@163.com>
     * @since 1.0
     */
    public function events()
    {
        return [
            Application::EVENT_BEFORE_ACTION => 'beforeHandleAction',
        ];
    }

    /**
     * Before send listener
     * @param yii\base\ActionEvent $event
     * @author cleverstone <yang_hui_lei@163.com>
     * @since 1.0
     */
    public function beforeHandleAction($event)
    {
        $mid = $event->action->controller->module->id;
        $bindMap = defined('BIND_MODULE') ? BIND_MODULE : null;
        if (empty($bindMap)) {
            return;
        }

        $event->isValid = true;

        $bindMap = (array) $bindMap;
        if (!in_array($mid, $bindMap, true)) {
            $event->isValid = false;
            throw new ForbiddenHttpException('Forbidden');
        }
    }
}