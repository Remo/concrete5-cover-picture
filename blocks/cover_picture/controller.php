<?php

defined('C5_EXECUTE') or die('Access Denied.');

class CoverPictureBlockController extends Concrete5_Controller_Block_Content {

    protected $btTable = 'btCoverPicture';
    protected $btInterfaceHeight = "645";

    public function getBlockTypeDescription() {
        return t("Cover picture where you can add additional text that shows up when you hover the picture.");
    }

    public function getBlockTypeName() {
        return t("Cover Picture");
    }

    public function save($args) {
        $args['content'] = $this->translateTo($args['content']);
        $args['fID'] = intval($args['fID']);
        parent::save($args);
    }

}
