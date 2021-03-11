<?php

namespace panix\mod\marketplace;

use panix\mod\marketplace\models\marketplace;
use Yii;
use yii\base\BootstrapInterface;
use panix\engine\WebModule;
use app\web\themes\dashboard\sidebar\BackendNav;

class Module extends WebModule implements BootstrapInterface
{

    public $icon = 'marketplace';

    /**
     * @var null
     */
    public $marketplaces = null;

    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {

    }

    public function getInfo()
    {
        return [
            'label' => Yii::t('marketplace/default', 'MODULE_NAME'),
            'author' => 'andrew.panix@gmail.com',
            'version' => '1.0',
            'icon' => $this->icon,
            'description' => Yii::t('marketplace/default', 'MODULE_DESC'),
            'url' => ['/admin/marketplace/default/index'],
        ];
    }

    public function getAdminSidebar()
    {
        return (new BackendNav())->findMenu('shop')['items'];
    }

    public function getAdminMenu()
    {
        return [
            [
                'label' => Yii::t('marketplace/default', 'MODULE_NAME'),
                'url' => ['/admin/marketplace/default/index'],
                'icon' => $this->icon,
                'visible' => YII_DEBUG
            ],
        ];
    }

}
