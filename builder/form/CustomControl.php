<?php
// +----------------------------------------------------------------------
// | yii-manager version 1.0.0
// +----------------------------------------------------------------------
// | ���ڣ�2020/10/11
// +----------------------------------------------------------------------
// | ���ߣ�cleverstone <yang_hui_lei@163.com>
// +----------------------------------------------------------------------

namespace app\builder\form;

/**
 * ���Զ�����ӿ�
 * @author cleverstone <yang_hui_lei@163.com>
 * @since 1.0
 */
interface CustomControl
{
    /**
     * ��Ⱦ�Զ�����
     * @return string
     * @author cleverstone <yang_hui_lei@163.com>
     * @since 1.0
     */
    public function render();

    /**
     * �������ڳ�ʼ���Զ�����ֵ��Js������
     * @return string
     * @author cleverstone <yang_hui_lei@163.com>
     * @since 1.0
     */
    public function initValuesJsFunction();

    /**
     * ������������Զ�����ֵ��Js������
     * @return string
     * @author cleverstone <yang_hui_lei@163.com>
     * @since 1.0
     */
    public function clearValuesJsFunction();

    /**
     * �������ڻ�ȡ�Զ�����ֵ��Js������Js��������ֵ������һ��Js `Object`��
     * @return string
     * @author cleverstone <yang_hui_lei@163.com>
     * @since 1.0
     */
    public function getValuesJsFunction();
}