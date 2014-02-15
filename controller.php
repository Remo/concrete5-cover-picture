<?php

defined('C5_EXECUTE') or die('Access Denied.');

class CoverPicturePackage extends Package {

    protected $pkgHandle = 'cover_picture';
    protected $appVersionRequired = '5.6.2.1';
    protected $pkgVersion = '0.9.2';

    public function getPackageDescription() {
        return t("Adds a text covered by a picture");
    }

    public function getPackageName() {
        return t("Cover Picture");
    }

    public function install() {
        $pkg = parent::install();

        $ci = new ContentImporter();
        $ci->importContentFile($pkg->getPackagePath() . '/install.xml');
    }

    public function upgrade() {
        $pkg = Package::getByHandle($this->pkgHandle);
        $ci = new ContentImporter();
        try {
            $ci->importContentFile($pkg->getPackagePath() . '/install.xml');
        } catch (Exception $ex) {
            
        }

        parent::upgrade();
    }

}
