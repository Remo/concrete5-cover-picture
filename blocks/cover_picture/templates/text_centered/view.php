<?php
defined('C5_EXECUTE') or die('Access Denied.');

$content = $controller->getContent();
$fileObject = File::getByID($fID);

if (!is_object($fileObject) || $fileObject->isError()) {
    echo '<div style="color: red; font-weight: bold;">' . t('No picture selected') . '</div>';
    return;    
}

$width = $fileObject->getAttribute('width');
$height = $fileObject->getAttribute('height');
?>

<div id="cover-picture-<?php echo $bID?>" class="cover-picture-text-centered" style="width: <?php echo $width?>px; height: <?php echo $height?>px; overflow: hidden;">
    <img src="<?php echo $fileObject->getURL() ?>" alt=""/>
    <div class="cover-picture-text">
        <div class="cover-picture-overlay"></div>
        <div class="cover-picture-text-inner">
            <?php echo $content ?>
        </div>    
    </div>    
</div>