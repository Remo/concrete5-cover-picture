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

    public function add() {
        $this->set('overlayOpacity', 0.7);
        $this->set('overlayColor', '#999999');
    }

    public function save($args) {
        $args['content'] = $this->translateTo($args['content']);
        $args['fID'] = intval($args['fID']);
        $args['overlayOpacity'] = $args['overlayOpacityValue'] ? $args['overlayOpacityValue'] : 0.7;
        $args['overlayColor'] = $args['overlayColor'] ? $args['overlayColor'] : '#999999';
        parent::save($args);
    }

    protected function getCurrentTemplate() {
        $blockObject = $this->getBlockObject();
        if (is_object($blockObject)) {
            return $blockObject->getBlockFilename();
        }
        return '';
    }

    /**
     * Called every time the page is rendered. We hook into this method to check
     * if we have to regenerate the .less files.
     */
    public function on_page_view() {
        // get current block template
        $template = $this->getCurrentTemplate();

        $bv = new BlockView();
        $bv->setController($this);
        $bv->setBlockObject($this->getBlockObject());

        // build path to less file
        $blockPath = $bv->getBlockPath();
        if ($template == '') {
            $blockTemplateLessPath = $blockPath . DIRECTORY_SEPARATOR . 'view.less';
        } else {
            $blockTemplateLessPath = $blockPath . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $template . DIRECTORY_SEPARATOR . 'view.less';
        }
        
        // there's a less file, check if we have to rebuild it
        if (file_exists($blockTemplateLessPath)) {
            $lessFileHash = md5($blockTemplateLessPath . $this->bID . filemtime($blockTemplateLessPath));
            $cacheFile = DIR_FILES_CACHE . '/cover-picture-' . $lessFileHash . '.css';

            // cache file doesn't exist, rebuild it
            if (!file_exists($cacheFile)) {
                $lessc = Loader::library('3rdparty/lessc.inc', 'cover_picture');
                $lessc = new lessc();
                $lessc->setVariables(
                        array(
                            'opacity' => $this->overlayOpacity,
                            'color' => $this->overlayColor,
                            'bID' => $this->bID
                        )
                );
                $lessc->compileFile($blockTemplateLessPath, $cacheFile);
            }

            // include generated css file
            $this->addHeaderItem('<link rel="stylesheet type="text/css" href="' . REL_DIR_FILES_CACHE . '/cover-picture-' . $lessFileHash . '.css' . '"/>');
        }
    }

}
