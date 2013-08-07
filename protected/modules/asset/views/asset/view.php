<div class="view">
    <h1><?php echo $model->getLabel() ?></h1>
    <?php
    $owner = User::model()->findByPk($model->OwnerUserId);
    if ($owner != null):
        ?>

        <div class="row">
            <?php echo Html::gravatar($owner->email); ?>
        </div>
        <?php
    endif;
    ?>

    <div class="row">
        <label>Name</label>
        <?php echo $model->Name ?> 
    </div>

    <div class="row">
        <label>Serial Numer</label>
        <?php echo $model->SerialNumber ?> 
    </div>
</div>