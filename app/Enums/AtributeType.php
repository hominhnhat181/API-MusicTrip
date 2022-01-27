<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class AtributeType extends Enum
{
    const ACTIVE =   1;
    const DEACTIVE =   2;
}
