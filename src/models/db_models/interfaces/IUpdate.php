<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\Models\DB_Models\Interfaces;

interface IUpdate{
    function update($obj):bool;
}