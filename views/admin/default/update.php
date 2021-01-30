<?php

use panix\engine\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use panix\mod\shop\models\Manufacturer;
use panix\engine\jui\DatetimePicker;
use panix\engine\Html;
use panix\mod\shop\models\Category;

$form = ActiveForm::begin(['id' => 'marketplace-form']);

/**
 * @var \panix\mod\marketplace\models\marketplace $model
 * @var \panix\engine\bootstrap\ActiveForm $form
 */
?>
<div class="alert alert-info">
    <?= Yii::t('marketplace/default','ALERT_HINT');?>
</div>
<div class="card">
    <div class="card-header">
        <h5><?= Html::encode($this->context->pageName) ?></h5>
    </div>
    <div class="card-body">

        <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
        <?= $form->field($model, 'sum')->textInput(['maxlength' => 10]) ?>

        <?php /*$form->field($model, 'currency_id')
            ->dropDownList(ArrayHelper::map(Yii::$app->currency->getCurrencies(), 'id', 'iso'), [
                'prompt' => html_entity_decode($model::t('SELECT_CURRENCY')),
            ]);*/
        ?>

        <?= $form->field($model, 'manufacturers')
            ->dropDownList(ArrayHelper::map(Manufacturer::find()->all(), 'id', 'name'), [
                'prompt' => html_entity_decode($model::t('SELECT_MANUFACTURER')),
                'multiple' => 'multiple'
            ]);
        ?>
        <?= $form->field($model, 'suppliers')
            ->dropDownList(ArrayHelper::map(\panix\mod\shop\models\Supplier::find()->all(), 'id', 'name'), [
                'prompt' => html_entity_decode($model::t('SELECT_SUPPLIER')),
                'multiple' => 'multiple'
            ]);
        ?>
        <div class="form-group row">
            <div class="col-sm-4 col-lg-2">
                <?= Html::label(Yii::t('marketplace/marketplace', 'CATEGORIES')); ?>
            </div>
            <div class="col-sm-8 col-lg-10">
                <?= Html::label(Yii::t('app/default', 'Поиск:'), 'search-marketplace-category', ['class' => 'control-label']); ?>
                <?= Html::textInput('search', null, [
                    'id' => 'search-marketplace-category',
                    'class' => 'form-control',
                    'onChange' => '$("#CategoryTree").jstree("search", $(this).val());'
                ]); ?>
                <br/>
                <?php
                echo \panix\ext\jstree\JsTree::widget([
                    'id' => 'CategoryTree',
                    'allOpen' => true,
                    'data' => Category::find()->dataTree(1, null, ['switch' => 1]),
                    'core' => [
                        'strings' => [
                            'Loading ...' => Yii::t('app/default', 'LOADING')
                        ],
                        'check_callback' => true,
                        "themes" => [
                            "stripes" => true,
                            'responsive' => true,
                            "variant" => "large",
                            // 'name' => 'default-dark',
                            // "dots" => true,
                            // "icons" => true
                        ],
                    ],
                    'plugins' => ['search', 'checkbox'],
                    'checkbox' => [
                        'three_state' => false,
                        "keep_selected_style" => false,
                        'tie_selection' => false,
                    ],
                ]);
                ?>
            </div>
        </div>


        <?php

        if (!$model->isNewRecord) {
            foreach ($model->getCategories() as $id) {

                $this->registerJs("$('#CategoryTree').checkNode({$id});", yii\web\View::POS_END, "checkNode{$id}");
            }
        }

        ?>
    </div>
    <div class="card-footer text-center">
        <?= $model->submitButton(); ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
