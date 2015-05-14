<?php
use yii\helpers\VarDumper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<section class="b-line ">
    <div class="b-wrap">
        <hr/>
        <div class="b-menu">
            <?php
            if (!$check_table)
                echo Html::a('Загрузить данные', '/db/init', ['class' => 'menu__item' ]);
            ?>
            <!-- /.menu__item -->
        </div>
        <!-- /.menu -->
    </div>
    <!-- /.b-wrap -->
</section>


<section class="b-line ">
    <div class="b-wrap">
        <div class="b-report">
            <?php $form = yii\widgets\ActiveForm::begin(); ?>
                <div class="b-date">
                    <label>от</label>
                    <?= Html::activeTextInput($model, 'from_date', ['class'=>'b-date__input js-date', 'placeholder'=>'12.05.2006']) ?>
                </div>
                <div class="b-date">
                    <label>до</label>
                    <?= Html::activeTextInput($model, 'to_date', ['class'=>'b-date__input js-date', 'placeholder'=>'12.06.2006']) ?>
                </div>

                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <!-- /.b-date -->
                <?= Html::submitButton('найти', ['class'=>'btn']) ?>

                <?= Html::error($model, 'from_date') ?>
                <?= Html::error($model, 'to_date') ?>
            <?php yii\widgets\ActiveForm::end(); ?>
            <!-- /.date -->
        </div>

        <div class="b-result__agency">
             <?php if (!empty($agency)) :?>
            <table border="1" cellspacing="0" class="b-result__table" width="100%">
                <tr class="b-result__table-head">
                    <td>Сеть</td>
                    <td>Агентсво</td>
                    <td>Сумма</td>
                </tr>
                <?php if (!empty($agency)) :?>
                    <?php foreach ($agency as $key =>$val):?>
                        <tr>
                            <td><?=$val['network_name']?></td>
                            <td><?=$val['agency_name']?></td>
                            <td><?=$val['amount']? $val['amount']: 0; ?></td>
                        </tr>
                    <?php endforeach;?>
                <?php endif; ?>
                <tr>
                    <td colspan="2"></td>
                    <td><?=$total_amount['total']?></td>
                </tr>
            </table>
            <?php endif;?>
        </div>
        <!-- /.b-result -->
        <!-- /.report -->
    </div>
    <!-- /.b-wrap -->
</section>
<div class="">

</div>
