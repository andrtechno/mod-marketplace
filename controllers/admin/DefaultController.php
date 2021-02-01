<?php

namespace panix\mod\marketplace\controllers\admin;

use Composer\Composer;
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

        CMS::dump(Yii::$app->extensions);
        die;


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








// Composer\Factory::getHomeDir() method
// needs COMPOSER_HOME environment variable set
////putenv('COMPOSER_HOME=' . __DIR__ . '/vendor/bin/composer');

// call `composer install` command programmatically
          //  $input = new ArrayInput(array('command' => 'require --prefer-dist smarty/smartytest'));
//$application = new Application();
//$application->setAutoExit(false); // prevent `$application->run` method from exitting the script
//$application->run();



           // use Composer\Command\UpdateCommand;

            putenv('COMPOSER_HOME=' . Yii::getAlias('@vendor') . '/bin/composer');
// change out of the webroot so that the vendors file is not created in
// a place that will be visible to the intahwebz
          //  chdir('../');

//Create the commands
            $input = new ArrayInput(array('command' => 'require','packages' => ['simplehtmldom/simplehtmldom']));
            $input->setInteractive(false);

//Create the application and run it with the commands
            $application = new Application();




            $application->setAutoExit(false);
            $s=$application->run($input);



           // $c=$composer->getConfig();

echo "Done.";
            //echo getenv('COMPOSER_HOME',true);
           // $s=shell_exec('cd code && composer create-project laravel/laravel my-project');
           // $s=shell_exec('ls');
            //$s2=exec('php D:\OpenServer\userdata\composer\composer.phar require simplehtmldom/simplehtmldom');
            $s2=shell_exec('php D:\OpenServer\userdata\composer\composer.phar require simplehtmldom/simplehtmldom');
            // $s2=exec('cd ../../../ && php -v');
            //var_dump($s);
            var_dump($s2);
            // $test = ArrayHelper::merge($composer, $repo);
die;
           // file_put_contents(Yii::getAlias('@app').DIRECTORY_SEPARATOR.'composer-test.json',Json::encode($composer));
           // $exec2= exec('composer require smarty/smartytest');
           // $exec= exec('composer --version');
           // $sexec= shell_exec('php -d composer require --prefer-dist smarty/smartytest');
           // $sexec= shell_exec('composer require whichbrowser/parser');




           // echo $exec2;
           // echo $exec;
           // echo $sexec;
            //echo system('composer require --prefer-dist "smarty/smartytest" -vv --profile --no-progress --ansi --no-interaction');
die;
            CMS::dump($composer);
        }
    }
}