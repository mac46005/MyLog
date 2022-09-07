<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\Models\DB_Models\Interfaces;

interface IQuery{
    function query($sql):mixed;
}