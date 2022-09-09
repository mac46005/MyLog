<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\DB\Interfaces;

interface IDelete{
    function delete($id):bool;
}