<?php

namespace RectorPrefix20211111\TYPO3\CMS\Extbase\Mvc\Controller;

if (\class_exists('TYPO3\\CMS\\Extbase\\Mvc\\Controller\\CommandController')) {
    return;
}
class CommandController
{
    /**
     * @return void
     */
    protected function getBackendUserAuthentication()
    {
    }
}
