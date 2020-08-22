<?php
// +----------------------------------------------------------------------
// | yii-manager version 1.0.0
// +----------------------------------------------------------------------
// | 日期：2020/8/22
// +----------------------------------------------------------------------
// | 作者：cleverstone <yang_hui_lei@163.com>
// +----------------------------------------------------------------------

namespace app\builder\database\config;

use app\builder\common\Group;

/**
 * 邮箱配置
 * @author cleverstone <yang_hui_lei@163.com>
 * @since 1.0
 */
class EmailGroup extends Group
{
    /**
     * {@inheritDoc}
     */
    public $name = '邮箱配置';

    /**
     * {@inheritDoc}
     */
    public $code = 'EMAIL_GROUP';

    /**
     * {@inheritDoc}
     */
    public $desc = '邮箱配置';

    /**
     * {@inheritDoc}
     */
    public $formTips = '邮箱配置';

    /**
     * {@inheritDoc}
     * @return array
     * @author cleverstone <yang_hui_lei@163.com>
     * @since 1.0
     */
    public function define()
    {
        return [
            $this->normalizeItem('SMTP_SERVER', 'smtp.qq.com', 'SMTP服务器', 'SMTP服务器', 'SMTP服务器, 如:smtp.qq.com/smtp.163.com'),
            $this->normalizeItem('SMTP_PORT', '465', 'SMTP端口', 'SMTP端口', 'SMTP端口,不加密默认25/SSL默认465/TLS默认587'),
            $this->normalizeItem('SMTP_USER', '', 'SMTP用户名', 'SMTP用户名', 'SMTP用户名'),
            $this->normalizeItem('SMTP_PASSWORD', '', 'SMTP密码', 'SMTP密码', 'SMTP密码'),
            $this->normalizeItem('SMTP_SECRET_WAY', '', '加密方式', '加密方式,None:无 SSL:对应默认端口465 TLS:对应默认端口587', ''),
            $this->normalizeItem('SMTP_SIGN', '', '签名', '发送人签名, 默认使用用户名', '发送人签名, 默认使用用户名'),
        ];
    }
}