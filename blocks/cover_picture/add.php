<?php
defined('C5_EXECUTE') or die('Access Denied.');

$bt->inc('editor_init.php');
?>

<h2><?php echo t('Cover Picture')?></h2>
<?php
echo $this->inc('file_selector.php');
?>

<h2><?php echo t('Text')?></h2>

<div style="text-align: center">
    <textarea id="ccm-content-<?php echo $a->getAreaID() ?>" class="advancedEditor ccm-advanced-editor" name="content" style="width: 580px; height: 380px"></textarea>
</div>


