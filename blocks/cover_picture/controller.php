<?php

defined('C5_EXECUTE') or die('Access Denied.');

class CoverPictureBlockController extends Concrete5_Controller_Block_Content {

    protected $btTable = 'btCoverPicture';
    protected $btInterfaceHeight = "640";

    public function save($args) {
        $args['content'] = $this->translateTo($args['content']);
        $args['fID'] = intval($args['fID']);
        parent::save($args);
    }

}
