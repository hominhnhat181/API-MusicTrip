<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class AlbumStatus extends Enum
{
    const ACTIVE =   1;
    const DISABLE =   2;
}
