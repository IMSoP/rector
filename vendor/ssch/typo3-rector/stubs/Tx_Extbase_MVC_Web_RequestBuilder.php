<?php

namespace RectorPrefix20211111;

if (\class_exists('Tx_Extbase_MVC_Web_RequestBuilder')) {
    return;
}
class Tx_Extbase_MVC_Web_RequestBuilder
{
}
\class_alias('Tx_Extbase_MVC_Web_RequestBuilder', 'Tx_Extbase_MVC_Web_RequestBuilder', \false);
