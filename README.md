# Yii2 Bootstrap4 Modal Ajax

**Yii2 Bootstrap4 Modal Ajax**

[![Latest Stable Version](https://poser.pugx.org/maileryio/yii2-modal-ajax/v/stable)](https://packagist.org/packages/maileryio/yii2-modal-ajax)
[![Total Downloads](https://poser.pugx.org/maileryio/yii2-modal-ajax/downloads)](https://packagist.org/packages/maileryio/yii2-modal-ajax)
[![Build Status](https://img.shields.io/travis/maileryio/yii2-modal-ajax.svg)](https://travis-ci.org/maileryio/yii2-modal-ajax)
[![Scrutinizer Code Coverage](https://img.shields.io/scrutinizer/coverage/g/maileryio/yii2-modal-ajax.svg)](https://scrutinizer-ci.com/g/maileryio/yii2-modal-ajax/)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/maileryio/yii2-modal-ajax.svg)](https://scrutinizer-ci.com/g/maileryio/yii2-modal-ajax/)

Render any content in Yii2 Bootstrap 4 Modal via AJAX inside

## Installation

The preferred way to install this yii2-extension is through [composer](http://getcomposer.org/download/).

Either run

```sh
php composer.phar require "maileryio/yii2-modal-ajax"
```

or add

```json
"maileryio/yii2-modal-ajax": "*"
```

to the require section of your composer.json.

## Usage

### Controller
Extend your basic logic with ajax render and save capabilities:
```php
public function actionCreate()
{
    $model = new Project();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->save()) {             
            return $this->redirect(['view', 'id' => $model->id]);             
        }
    }

    return $this->render('create', compact('model'));
}
```
to
```php
public function actionCreate()
{
    $model = new Project();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->save()) {             
            if (Yii::$app->request->isAjax) {
                return $this->asJson(['success' => true]);
            }
            return $this->redirect(['view', 'id' => $model->id]);             
        }
    }

    if (Yii::$app->request->isAjax) {
        return $this->renderAjax('create', compact('model'));
    } else {
        return $this->render('create', compact('model'));
    }
}
```

### View
```php
use mailery\widgets\modal\AjaxModal;

AjaxModal::begin([
    'title' => 'Create New Project',
    'url' => ['/project/default/create'],
    'toggleButton' => [
        'label' => 'Add New Project',
    ],
]);
    echo 'Loading...';
AjaxModal::end();
```

## License

This project is released under the terms of the BSD-3-Clause [license](LICENSE).
Read more [here](http://choosealicense.com/licenses/bsd-3-clause).

Copyright © 2019, Mailery (https://mailery.io/)
