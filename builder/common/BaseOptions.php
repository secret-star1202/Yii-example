<?php
// +----------------------------------------------------------------------
// | yii-manager version 1.0.0
// +----------------------------------------------------------------------
// | ���ڣ�2020/10/9
// +----------------------------------------------------------------------
// | ���ߣ�cleverstone <yang_hui_lei@163.com>
// +----------------------------------------------------------------------

namespace app\builder\common;

use yii\base\BaseObject;

/**
 * ����ѡ��̳���
 * @author cleverstone <yang_hui_lei@163.com>
 * @since 1.0
 */
abstract class BaseOptions extends BaseObject
{
    /**
     * �������
     * @return array
     * @throws \ReflectionException
     * @author cleverstone <yang_hui_lei@163.com>
     * @since 1.0
     */
    public function toArray()
    {
        $class = new \ReflectionClass($this);

        $attributes = [];
        foreach ($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
            if (!$property->isStatic()) {
                $attributes[$property->getName()] = $property->getValue($this);
            }
        }

        return $attributes;
    }
}