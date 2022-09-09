<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\DB\Interfaces;

interface IWrite{
    function write($obj):bool;
}