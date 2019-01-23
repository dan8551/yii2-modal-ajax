<?php
/**
 * Yii2 Bootstrap4 Modal Ajax
 * @link      https://github.com/maileryio/yii2-modal-ajax
 * @package   yii2-modal-ajax
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2019, Mailery (https://mailery.io/)
 */

namespace mailery\widgets\modal\tests\unit;

use mailery\widgets\modal\AjaxModal;
use Yii;

class AjaxModalTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Combo
     */
    protected $object;

    protected function setUp()
    {
        $this->object = Yii::createObject([
            'class' => AjaxModal::class,
        ]);
    }

    protected function tearDown()
    {
    }

    public function testConstruct()
    {
        $this->assertInstanceOf(AjaxModal::class, $this->object);
    }
}
