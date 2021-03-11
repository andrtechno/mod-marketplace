<?php

use panix\engine\widgets\Pjax;
use panix\engine\grid\GridView;
use yii\helpers\Html;



?>
<div class="container-fluid2">
    <div class="row2">
        <div class="card">
            <div class="card-header">
Список
            </div>
            <div class="card-body">


                <ul class="nav nav-tabs" id="tab" role="tablist">
                    <?php
                    $i = 0;
                    foreach ($items as $data) {
                        $show = ($i == 0) ? 'active' : '';
                        ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $show; ?>" data-toggle="tab" href="#tab-<?= md5($data['name']); ?>"
                               role="tab"
                               aria-controls="tab-<?= md5($data['name']); ?>"
                               aria-selected="true"><?= $data['name'] ?></a>
                        </li>

                        <?php
                        $i++;
                    } ?>
                </ul>


                <div class="tab-content" id="tabContent">
                    <?php
                    $i = 0;
                    foreach ($items as $type => $data) {
                        $show = ($i == 0) ? 'show active' : '';
                        ?>
                        <div class="tab-pane p-3 <?= $show; ?>" id="tab-<?= md5($data['name']); ?>" role="tabpanel"
                             aria-labelledby="r-tab-<?= md5($data['name']); ?>">

                            <div class="row">


                                <?php foreach ($data['items'] as $item) {
                                    $is_install = false;
                                    if (isset($install[$type][$item['packageName']])) {
                                        $is_install = true;
                                    }

                                    ?>
                                    <div class="col-sm-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="float-left"><?= $item['name']; ?></h5>
                                                <span class="float-right badge badge-danger mt-2 mr-2 h6"><?= $item['type']; ?></span>
                                            </div>
                                            <div class="card-body">
                                                <?php if (isset($item['preview'])) { ?>
                                                    <img src="<?= $item['preview']; ?>" class="img-fluid"/>
                                                <?php } else { ?>
                                                    <img src="https://via.placeholder.com/500x300/fff/000?text=<?= $item['name']; ?>"
                                                         class="img-fluid"/>
                                                <?php } ?>

                                                <?php
                                                if (isset($install[$type][$item['packageName']])) {
                                                    echo 'Текущая версия: ' . $install[$type][$item['packageName']]['version'];
                                                }
                                                ?>
                                                <div>
                                                    Доступна версия:
                                                    <strong><?php echo $item['version']; ?></strong>
                                                </div>
                                                <?php
                                                //if(isset($item['alias'])){
                                                //   print_r($item['alias']);
                                                // }
                                                ?>
                                                <?php if (isset($item['description'])) { ?>
                                                    <p class="m-3"><?= $item['description']; ?></p>
                                                <?php } ?>

                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <?php if (!$is_install) { ?>
                                                            <h4>30$</h4>
                                                        <?php } ?>

                                                    </div>
                                                    <div class="col-sm-6 text-right">
                                                        <?php
                                                        if ($is_install) {
                                                            echo 'Уже установлен';
                                                        } else {
                                                            echo Html::a('Купить', '', ['class' => 'btn btn-success']);
                                                        }
                                                        ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>
                        <?php
                        $i++;
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>


