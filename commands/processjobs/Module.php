<?php
/**
 * @link http://www.cleverstone.cn/
 * @copyright Copyright (c) 2020 黑与白
 * @license http://yii-manager.cleverstone.cn/license/
 */

namespace app\commands\processjobs;

/**
 * This is a module for `processjobs`
 * @author cleverstone
 * @since 1.0
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\commands\processjobs\jobs';

    /**
     * @var string the default route of this module. Defaults to `default`.
     * The route may consist of child module ID, controller ID, and/or action ID.
     * For example, `help`, `post/create`, `admin/post/create`.
     * If action ID is not given, it will take the default value as specified in
     * [[Controller::defaultAction]].
     */
    public $defaultRoute = 'index';
}