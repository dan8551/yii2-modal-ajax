<?php
/**
 * Yii2 Bootstrap4 Modal Ajax
 * @link      https://github.com/maileryio/yii2-modal-ajax
 * @package   yii2-modal-ajax
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2019, Mailery (https://mailery.io/)
 */

namespace mailery\widgets\modal;

use yii\helpers\Url;

class AjaxModal extends \yii\bootstrap4\Modal
{
    /**
     * @var array|string
     */
    public $url;

    /**
     * {@inheritdoc}
     */
    protected function initOptions()
    {
        parent::initOptions();

        if ($this->clientEvents !== false) {
            if (!isset($this->clientEvents['show.bs.modal'])) {
                $this->clientEvents['show.bs.modal'] = new \yii\web\JsExpression(
<<< JS
    function (event) {
        var button = $(event.relatedTarget);
        var modal = $('#{$this->options['id']}');

        if (!modal.data('bs.modal').isShown) {
            modal.modal('show');
        }

        modal.find('.modal-body').load(button.data('ajax-url'));
    }
JS
                );
            }
        }

        if ($this->toggleButton !== false) {
            if (!empty($this->url)) {
                $this->toggleButton['data-ajax-url'] = Url::to($this->url);
            }
        }
    }
}
