<?php
defined('C5_EXECUTE') or die('Access Denied.');

$fch = Loader::helper('form/color');
?>

<div class="ccm-block-field-group">
    <h4><?php echo t('Cover Picture') ?></h4>
    <?php
    $al = Loader::helper('concrete/asset_library');
    echo $al->image('fID', 'fID', t('Picture'), File::getByID($fID));
    ?>
</div>

<div class="ccm-block-field-group">
    <h4><?php echo t('Text') ?></h4>
    <?php
    Loader::element('editor_config', array('editor_height' => 200));
    Loader::element('editor_controls');
    ?>
    <textarea name="content" class="ccm-advanced-editor"><?php echo $content ?></textarea>
</div>

<div class="ccm-block-field-group">
    <h4><?php echo t('Overlay Color') ?></h4>
    <?php
    echo $fch->output('overlayColor', '', $overlayColor, true);
    ?>
    <div class="clearfix"></div>
</div>

<div class="ccm-block-field-group">
    <h4><?php echo t('Overlay Opacity') ?></h4>
    <div style="position: relative; height: 30px;">
        <div style="position: absolute; top: 0; left: 0; right: 40px;">
            <div id="overlayOpacity"></div>
        </div>
        <div style="position: absolute; top: 0; width: 40px; right: 0px; text-align: right;">
            <input type="text" style="width: 30px;" name="overlayOpacityValue" id="overlayOpacityValue" value="<?php echo $overlayOpacity?>"/>
        </div>
    </div>
</div>

<script>
    $(function () {
        var slider = $("#overlayOpacity").slider({
            min: 0.0,
            max: 1.0,
            step: 0.1,
            value: <?php echo $overlayOpacity?>,
            slide: function (event, ui) {
                $("#overlayOpacityValue").val(ui.value);
            }
        });
        $("#overlayOpacityValue").change(function () {
            slider.slider("value", $(this).val());
        });
    });
</script>