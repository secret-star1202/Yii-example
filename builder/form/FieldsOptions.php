<?php
// +----------------------------------------------------------------------
// | yii-manager version 1.0.0
// +----------------------------------------------------------------------
// | ���ڣ�2020/10/9
// +----------------------------------------------------------------------
// | ���ߣ�cleverstone <yang_hui_lei@163.com>
// +----------------------------------------------------------------------
namespace app\builder\form;

use yii\helpers\Html;
use app\builder\common\BaseOptions;
use app\builder\contract\InvalidInstanceException;

/**
 * ���ֶ�����ѡ��
 * @author cleverstone <yang_hui_lei@163.com>
 * @since 1.0
 */
class FieldsOptions extends BaseOptions
{
    // �ı�
    const CONTROL_TEXT = 'text';
    // ����
    const CONTROL_NUMBER = 'number';
    // ����
    const CONTROL_PASSWORD = 'password';
    // ��ѡ
    const CONTROL_CHECKBOX = 'checkbox';
    // ��ѡ
    const CONTROL_RADIO = 'radio';
    // ���ڣ���ʽ��Y-m-d H:i:s
    const CONTROL_DATETIME = 'datetime';
    // ���ڣ���ʽ��Y-m-d
    const CONTROL_DATE = 'date';
    // �꣬��ʽ��Y
    const CONTROL_YEAR = 'year';
    // �£���ʽ��m
    const CONTROL_MONTH = 'month';
    // ʱ����ʽ��H:i:s
    const CONTROL_TIME = 'time';
    // ����ѡ��
    const CONTROL_SELECT = 'select';
    // ����
    const CONTROL_HIDDEN = 'hidden';
    // �ļ�
    const CONTROL_FILE = 'file';
    // �ı���
    const CONTROL_TEXTAREA = 'textarea';
    // ���ı�
    const CONTROL_RICHTEXT = 'richtext';
    // �Զ���
    const CONTROL_CUSTOM = 'custom';

    /**
     * �ؼ����ͣ�Ĭ��`text`
     * @var string
     */
    public $control = self::CONTROL_TEXT;

    /**
     * ��ǩ��
     * @var string
     */
    public $label = '';

    /**
     * ��ʾ��
     * @var string
     */
    public $placeholder = '';

    /**
     * Ĭ��ֵ�����ֵ��`����`����
     * @var string
     */
    public $default = '';

    /**
     * �Ƿ������
     * @var bool
     */
    public $required = true;

    /**
     * ע����
     * @var string
     */
    public $comment = '';

    /**
     * �Ƿ������䣬�������ڿؼ�
     * @var int
     */
    public $range = 0;

    /**
     * ѡ�����`radio`��`checkbox`��`select`�ؼ�
     * @var array
     */
    public $options;

    /**
     * �����������ı���
     * @var string
     */
    public $rows = '5';

    /**
     * �ļ������������ļ��ϴ�
     * @var int
     */
    public $number = 1;

    /**
     * bootstrap���֣�Ĭ��`12`
     * @var string
     */
    public $layouts = '12';

    /**
     * �ؼ���ʽ
     * @var string|array
     */
    public $style = '';

    /**
     * �ؼ�����
     * @var string|array
     */
    public $attribute = '';

    /**
     * �Զ�����
     * @var CustomControl|null
     */
    public $widget;

    /**
     * ��ʼ��
     * @author cleverstone <yang_hui_lei@163.com>
     * @since 1.0
     */
    public function init()
    {
        if (!empty($this->style) && is_array($this->style)) {
            $this->style = Html::cssStyleFromArray($this->style) ?: '';
        }

        if (!empty($this->attribute) && is_array($this->attribute)) {
            $this->attribute = Html::renderTagAttributes($this->attribute);
        }

        if (
            $this->control == self::CONTROL_CUSTOM
            && (
                empty($this->widget) ||
                !($this->widget instanceof CustomControl)
            )
        ) {
            throw new InvalidInstanceException('The widget option must be implements of `CustomControl`. ');
        }
    }
}