<?php

use Facebook\WebDriver\WebDriverBy;

class AcceptanceCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->cli(['core', 'update-db']);
        $I->cli(['plugin', 'install', 'disable-welcome-messages-and-tips']);
        $I->cli(['plugin', 'activate', 'disable-welcome-messages-and-tips']);
        $I->cli(['option', 'update', 'blogname', 'Test']);
    }

    public function iSeeDropCap(AcceptanceTester $I)
    {
        $I->loginAsAdmin();
        $I->amOnPage('wp-admin/post-new.php');
        $I->click('.block-editor-default-block-appender__content');
        //$I->clickTextField();
        $I->see('Drop cap');
        $I->amOnUrl('https://google.com');
        $I->acceptPopup();
    }

    public function iActivatePlugin(AcceptanceTester $I)
    {
        $I->loginAsAdmin();
        $I->amOnPluginsPage();
        //$I->activatePlugin('remove-drop-cap');
        $I->activatePlugin('disable-drop-cap');
    }

    public function iDontSeeDropCap(AcceptanceTester $I)
    {
        $I->loginAsAdmin();
        $I->amOnPluginsPage();
        $I->wait(10);
        $I->amOnPage('wp-admin/post-new.php');
        $I->click('.block-editor-default-block-appender__content');
        //$I->clickTextField();
        $I->dontSee('Drop cap');
    }

}
