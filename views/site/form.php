<?php
use yii\helpers\VarDumper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<section class="b-line ">
    <div class="b-wrap">
        <h3><?=$message?></h3>
        <form class="b-data" action="/form_result">
            <div class="b-data__fields">
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <input class="b-data__input" type="text" name="N[0]" value=""/>
            </div>
            <div class="b-data__hidden">
                <input class="b-data__input" type="text" value=""/>
            </div>

            <button class="js-field__add btn" >добавить поле</button>
            <input type="submit" class="btn" value="расчитать" />
        </form>
        <!-- /.menu -->
    </div>
    <!-- /.b-wrap -->
</section>

<section class="b-line ">
    <div class="b-wrap">
        <div class="b-result">
            <label>Суммы:</label>
            <div class="js-result__data-sum_all"></div>
            <!-- /.js-result__data-sum_all -->
            <label>Минимальная разница D:</label>
            <div class="js-result__data-d"></div>
            <!-- /.js-result__data-d -->
        </div>
        <!-- /.f-result -->
    </div>
    <!-- /.b-wrap -->
</section>