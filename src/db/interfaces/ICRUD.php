<?php

declare(strict_types = 1);

namespace MyLog_ClassLib\DB\Interfaces;

interface ICRUD extends IReadOne,IReadAll,IWrite,IDelete,IUpdate,IQuery{
    
}