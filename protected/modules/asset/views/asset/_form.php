<?php
/* @var $this ProjectController */
/* @var $model Project */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'project-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <?php
        $this->widget('application.extensions.qrcode.QRCodeGenerator', array(
            'data' => 'ss',
            'subfolderVar' => false,
            'matrixPointSize' => 5,
            'displayImage' => true, // default to true, if set to false display a URL path
            'errorCorrectionLevel' => 'L', // available parameter is L,M,Q,H
            'matrixPointSize' => 4, // 1 to 10 only
        ))
        ?>
    </div>
    <div class="row">
        <?php
        foreach ($model->getAttributes() as $attribute => $value):
            if (!$model->isAttributeSafe($attribute))
                continue;
            ?>

            <div class="row">
                <?php echo $form->labelEx($model, $attribute); ?>
                <?php echo $form->textField($model, $attribute); ?>
                <?php echo $form->error($model, $attribute); ?>
            </div>

            <?php
        endforeach;
        ?>

    </div>


    <!--    <div class="row">
    <?php echo $form->labelEx($model, 'Name'); ?>
    <?php echo $form->textField($model, 'Name', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'Name'); ?>
        </div>
    
        <div class="row">
    <?php echo $form->labelEx($model, 'SerialNumber'); ?>
    <?php echo $form->textField($model, 'SerialNumber', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'SerialNumber'); ?>
        </div>-->

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->