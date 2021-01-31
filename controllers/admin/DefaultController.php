<?php

namespace panix\mod\marketplace\controllers\admin;

use Composer\Console\Application;
use panix\engine\CMS;
use simplehtmldom\HtmlWeb;
use Symfony\Component\Console\Input\ArrayInput;
use Yii;
use panix\engine\controllers\AdminController;
use panix\mod\marketplace\models\marketplace;
use panix\mod\marketplace\models\marketplaceSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

class DefaultController extends AdminController
{

    public function actionIndex()
    {
        $this->pageName = Yii::t('marketplace/default', 'MODULE_NAME');

        $this->view->params['breadcrumbs'][] = $this->pageName;

        return $this->render('index', [

        ]);
    }

    public function actionTest()
    {
        $composer = Json::decode(file_get_contents(Yii::getAlias('@app') . DIRECTORY_SEPARATOR . 'composer.json'), true);

        /*$repo["repositories"] = [
            [
                "type" => "vcs",
                "url" => "https://bitbucket.org/xxxx/xxxxx.git"
            ]
        ];*/


        {
            $composer["repositories"][] = [

                "type" => "package",
                "package" => [
                    "name" => "smarty/smartytest",
                    "version" => "3.1.7",
                    "dist" => [
                        "type" => "zip",
                        "url" => "https://www.smarty.net/files/Smarty-3.1.7.zip"
                    ]
                ]

            ];




// get DOM from URL or file
            $doc = new HtmlWeb();
            $html = $doc->load('https://yandex.ru/search/ads?&rid=213&text=купить+дом');

// find all links
            foreach($html->find('a') as $e)
                echo $e->href . '<br>' . PHP_EOL;



// Composer\Factory::getHomeDir() method
// needs COMPOSER_HOME environment variable set
////putenv('COMPOSER_HOME=' . __DIR__ . '/vendor/bin/composer');

// call `composer install` command programmatically
            $input = new ArrayInput(array('command' => 'require --prefer-dist smarty/smartytest'));
$application = new Application();
$application->setAutoExit(false); // prevent `$application->run` method from exitting the script
$application->run();

echo "Done.";



            // $test = ArrayHelper::merge($composer, $repo);
//phpinfo();die;
           // file_put_contents(Yii::getAlias('@app').DIRECTORY_SEPARATOR.'composer-test.json',Json::encode($composer));
           // $exec2= exec('composer require smarty/smartytest');
           // $exec= exec('composer --version');
           // $sexec= shell_exec('php -d composer require --prefer-dist smarty/smartytest');
           // $sexec= shell_exec('composer require whichbrowser/parser');




           // echo $exec2;
           // echo $exec;
           // echo $sexec;
            echo system('composer require --prefer-dist "smarty/smartytest" -vv --profile --no-progress --ansi --no-interaction');
die;
            CMS::dump($composer);
        }
    }
}