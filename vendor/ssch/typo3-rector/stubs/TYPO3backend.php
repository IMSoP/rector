<?php

namespace RectorPrefix20210602;

if (\class_exists('TYPO3backend')) {
    return;
}
class TYPO3backend
{
}
\class_alias('TYPO3backend', 'TYPO3backend', \false);
