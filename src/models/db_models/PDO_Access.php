<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\Models\DB_Models;

use PDO;

class PDO_Access extends PDO{
    // Probably not neseccary
    public function __construct($file = 'my_settings.ini')
    {
        if(! $settings = parse_ini_file($file,TRUE)){
            throw new \Exception("Unable to open" . $file . '.');
        }

        
    }
}