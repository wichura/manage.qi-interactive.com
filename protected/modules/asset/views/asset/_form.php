<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'project-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary($model); ?>

    <?php if ($model->isNewRecord == false): ?>

        <div class="row">
            <label>QR Code</label>
            <a onclick="$('#qr').show(); $(this).remove()" href="javascript:void(0)">Show</a>
            <div id="qr" style="display: none;" >
                <?php
                $serverName = $_SERVER["SERVER_NAME"];
                $this->widget('application.extensions.qrcode.QRCodeGenerator', array(
                    'data' => "http://$serverName/asset/asset/view/id/$model->Id",
                    'filename' => "qr-asset-$model->Id",
                    'subfolderVar' => false,
                    'displayImage' => true, // default to true, if set to false display a URL path
                    'errorCorrectionLevel' => 'L', // available parameter is L,M,Q,H
                    'matrixPointSize' => 4, // 1 to 10 only
                ))
                ?>
            </div>
        </div>
    <?php endif; ?>

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

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->