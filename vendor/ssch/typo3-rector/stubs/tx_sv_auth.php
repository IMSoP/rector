<?php

namespace RectorPrefix20210601;

if (\class_exists('tx_sv_auth')) {
    return;
}
class tx_sv_auth
{
}
\class_alias('tx_sv_auth', 'tx_sv_auth', \false);