<?php

namespace Sazanof\NovofonApiV2\Enums;

enum VirtualNumberStatusEnum: string
{
    /**
     * active
     * waiting
     * cleaning
     * prereserved
     * reserved
     * manual_lock
     * limit_lock
     */
    case ACTIVE = 'active';
    case WAITING = 'waiting';
    case CLEANING = 'cleaning';
    case PRERESERVED = 'prereserved';
    case RESERVED = 'reserved';
    case MANUAL_LOCK = 'manual_lock';
    case LIMIT_LOCK = 'limit_lock';
}
