<?php
defined('C5_EXECUTE') or die("Access Denied.");
?>

<h2><?php echo t('Cover Picture') ?></h2>
<?php
echo $this->inc('file_selector.php');
?>

<h2><?php echo t('Text') ?></h2>
<?php
$bt->inc('editor_init.php');
?>
<div style="text-align: center" id="ccm-editor-pane">
    <textarea id="ccm-content-<?php echo $b->getBlockID() ?>-<?php echo $a->getAreaID() ?>" class="advancedEditor ccm-advanced-editor" name="content" style="width: 580px; height: 380px"><?php echo htmlspecialchars($controller->getContentEditMode()) ?></textarea>
</div>
