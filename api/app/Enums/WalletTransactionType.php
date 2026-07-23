<?php

namespace App\Enums;

enum WalletTransactionType:string
{
    case DEPOSIT='deposit';

    case WITHDRAW='withdraw';

    case GIFT='gift';

    case STORE='store';

    case VIP='vip';

    case LUCKY='lucky';

    case GAME='game';

    case REWARD='reward';

    case ADJUST='adjust';
}
