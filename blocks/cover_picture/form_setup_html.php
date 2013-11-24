<?php
defined('C5_EXECUTE') or die("Access Denied.");
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
    Loader::element('editor_config');
    Loader::element('editor_controls');
    ?>
    <textarea name="content" class="ccm-advanced-editor"><?php echo $content ?></textarea>
</div>