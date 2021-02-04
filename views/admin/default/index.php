<?php

use panix\engine\widgets\Pjax;
use panix\engine\grid\GridView;

//\panix\engine\CMS::dump($install);
$client = new \Github\Client();
$client->authenticate('6894c3d8088d78703f422594ab41230389b1ac02', null, Github\Client::AUTH_ACCESS_TOKEN);


$repositories = $client->api('me')->repositories('test');
$protection = $client->api('repo')->protection()->showStatusChecks('andrtechno', 'test', 'main');
$release = $client->api('repo')->releases()->all('andrtechno', 'test');

\panix\engine\CMS::dump($protection);
?>
<div class="row">
    <?php foreach ($install as $type => $items) { ?>
        <?php foreach ($items as $item) {


            ?>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="float-left"><?= $item['name']; ?></h5>
                        <span class="float-right badge badge-danger mt-2 mr-2 h6"><?= $type; ?></span>
                    </div>
                    <div class="card-body">
                        <img src="https://via.placeholder.com/500" class="img-fluid"/>
                        <?= $item['version']; ?>

                        <?php
                        if(isset($item['alias'])){
                            print_r($item['alias']);
                        }
                        ?>
                        <p class="m-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                            in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                            sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum.</p>
                    </div>
                    <div class="card-footer ">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4>30$</h4>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="#" class="btn btn-success">Купить</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
</div>
<div class="container-fluid">


    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
               aria-selected="true">Модули</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
               aria-selected="false">Виджеты</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="theme-tab" data-toggle="tab" href="#theme" role="tab" aria-controls="theme"
               aria-selected="false">Шаблоны</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <?php for ($i = 1; $i <= 10; $i++) { ?>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="float-left">Новая почта</h5>
                                <span class="float-right badge badge-danger mt-2 mr-2 h6">Модуль</span>
                            </div>
                            <div class="card-body">
                                <img src="https://via.placeholder.com/500" class="img-fluid"/>
                                <p class="m-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                                    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                    nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                    officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div class="card-footer ">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4>30$</h4>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <a href="#" class="btn btn-success">Купить</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row">
                <?php for ($i = 1; $i <= 10; $i++) { ?>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="float-left">Новая почта</h5>
                                <span class="float-right badge badge-danger mt-2 mr-2 h6">Premium</span>
                            </div>
                            <div class="card-body">
                                <img src="https://via.placeholder.com/500" class="img-fluid"/>
                                <p class="m-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                                    aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                    nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                    officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div class="card-footer ">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4>30$</h4>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <a href="#" class="btn btn-success">Установить</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>


    </div>
</div>

