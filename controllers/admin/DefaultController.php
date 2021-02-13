<?php

namespace panix\mod\marketplace\controllers\admin;
use Composer\Command\UpdateCommand;
use Composer\Composer;
use Composer\Installer;
use Composer\IO\NullIO;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\StreamOutput;

use panix\engine\CMS;
use simplehtmldom\HtmlWeb;

use Yii;
use panix\engine\controllers\AdminController;
use panix\mod\marketplace\models\marketplace;
use panix\mod\marketplace\models\marketplaceSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\ForbiddenHttpException;

class DefaultController extends AdminController
{

    public function actionIndex()
    {
        $this->pageName = Yii::t('marketplace/default', 'MODULE_NAME');

        $this->view->params['breadcrumbs'][] = $this->pageName;
        $extensions = Yii::$app->extensions;


        //  CMS::dump($extensions);die;
        $install = [];
        foreach ($extensions as $ext) {
            if (isset($ext['type'])) {
                if ($ext['type'] == 'pixelion-theme') {
                    $install['theme'][] = $ext;
                } elseif ($ext['type'] == 'pixelion-widget') {
                    $install['widget'][] = $ext;
                } elseif ($ext['type'] == 'pixelion-component') {
                    $install['component'][] = $ext;
                } elseif ($ext['type'] == 'pixelion-module') {
                    $install['module'][] = $ext;
                }
            }
        }

        return $this->render('index', [
            'install' => $install
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

    public function actionComposer()
    {
        $phppath = getenv('PHPDIR');
        // $exec2= exec('composer require smarty/smartytest');
        //  $exec= exec('composer --version');
        // $cmd = $phppath."php -d composer require --prefer-dist panix/mod-google-shopping";
        // echo $cmd;die;
        //$exec1= shell_exec($cmd);
        // $sexec= shell_exec('composer require whichbrowser/parser');

        // echo $exec;
        //  echo '<pre>'.$exec1.'</pre>';
        // echo $exec;
        // echo $sexec;
        // $result = shell_exec(''.$phppath.'/php -d xdebug.remote_enable=0 -d xdebug.profiler_enable=0 -d xdebug.default_enable=0 D:\OpenServer\userdata\composer\composer.phar install');


        echo '<pre>' . $result . '</pre>';
        die;

    }

    public function actionExt()
    {

        CMS::dump(Yii::$app->extensions);
        die;

    }

    public function api()
    {
        $data['items'] = [];

        $itemsList = ['panix/mod-pages', 'panix/mod-navaposhta', 'panix/mod-shop'];
        foreach ($itemsList as $item) {
            $data['items'][] = [
                'name' => $item
            ];
        }


        return $data;
    }

    public function actionSendFile($token)
    {
        if ($token == '123') {
            Yii::$app->response->xSendFile(Yii::getAlias('@marketplace') . DIRECTORY_SEPARATOR . 'mod-google-shopping-master.zip');
        } else {
            throw new ForbiddenHttpException();
        }
    }
    public function actionTester(){



            //create composer.json with some content
            //require_once 'composer-source/vendor/autoload.php';
            putenv('COMPOSER_HOME=' . Yii::getAlias('@vendor') . '/composer/bin/composer');
            chdir(__DIR__);

            $stream = fopen('php://temp', 'w+');
            $output = new StreamOutput($stream);
            $application = new Application();
            $application->setAutoExit(false);

        //$input = new ArrayInput(array('command' => 'require', 'packages' => ['yiisoft/yii2-twig']));
        $input = new ArrayInput(array('command' => 'require yiisoft/yii2-twig'));
        //new ArrayInput(array('command' => 'install'))

            $code = $application->run($input, $output);
echo $code;
            var_dump(stream_get_contents($stream));
            die;

    }
}