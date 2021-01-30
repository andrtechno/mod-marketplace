<?php

namespace panix\mod\marketplace\controllers\admin;

use panix\engine\CMS;
use Yii;
use panix\engine\controllers\AdminController;
use panix\mod\marketplace\models\marketplace;
use panix\mod\marketplace\models\marketplaceSearch;

class DefaultController extends AdminController
{

    public function actionIndex()
    {
        $this->pageName = Yii::t('marketplace/default', 'MODULE_NAME');

        $this->view->params['breadcrumbs'][] = $this->pageName;

        return $this->render('index', [

        ]);
    }

}
