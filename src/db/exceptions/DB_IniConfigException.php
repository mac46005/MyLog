<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\DB\Exceptions;

class DB_IniConfigException extends \Exception{
    public function __construct($message)
    {
        parent::__construct("INI_CONFIG EXCEPTION: $message");
    }
}