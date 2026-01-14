<?php

namespace App;

enum ShelfItemStatus: string
{
    case OWNED = 'owned';
    case WISH_LIST = 'wish_list';
    case LOST = 'lost';
    case LOANED = 'loaned';
}
