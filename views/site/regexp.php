<?php
use yii\helpers\VarDumper;
?>

<section class="b-line ">
    <div class="b-wrap">
        <h3><?=$message?></h3>
        <div class="b-array">
            <pre>
                <?php print_r($result); ?>
            </pre>
            <h3>Исходник</h3>
            <pre>
                <?= $cnt?>
            </pre>
            <!-- /.menu__item -->
        </div>
        <!-- /.menu -->
    </div>
    <!-- /.b-wrap -->
</section>