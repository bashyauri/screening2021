<?php

namespace App\Enums;

enum TransactionStatus: string
{
    case APPROVED = '00';
    case ACTIVATED = '01';
}