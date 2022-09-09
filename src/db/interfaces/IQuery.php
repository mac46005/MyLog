<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\DB\Interfaces;

interface IQuery{
    function query($sql):mixed;
}