<?php

defined('C5_EXECUTE') or die("Access Denied.");

$al = Loader::helper('concrete/asset_library');
echo $al->image('fID', 'fID', t('Picture'), File::getByID($fID));
