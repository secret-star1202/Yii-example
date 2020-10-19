<?php
// +----------------------------------------------------------------------
// | yii-manager version 1.0.0
// +----------------------------------------------------------------------
// | 日期：2020/8/13
// +----------------------------------------------------------------------
// | 作者：cleverstone <yang_hui_lei@163.com>
// +----------------------------------------------------------------------

namespace app\builder\common;

use yii\db\ActiveRecord;
use app\behaviors\DatetimeBehavior;

/**
 * 模型继承类
 * @property-read string $error 错误信息
 * @author cleverstone <yang_hui_lei@163.com>
 * @since 1.0
 */
class CommonActiveRecord extends ActiveRecord
{
    /**
     * 附加公共行为
     * @return array
     * @author cleverstone <yang_hui_lei@163.com>
     * @since 1.0
     */
    public function behaviors()
    {
        return [
            // 日期处理器
            'timestampBehavior' => [
                'class' => DatetimeBehavior::className(),
                'attributes' => [
                    CommonActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    CommonActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * 获取当前模型映射的ActiveQuery对象
     * @param $select
     * @return \yii\db\ActiveQuery
     * @author cleverstone
     * @since 1.0
     */
    public static function query($select)
    {
        return self::find()->select($select);
    }

    /**
     * 获取验证错误信息[字符串格式]
     * @return mixed|string
     * @author cleverstone
     * @since 1.0
     */
    public function getError()
    {
        $firstErrors = $this->firstErrors;
        return reset($firstErrors) ?: '';
    }
}