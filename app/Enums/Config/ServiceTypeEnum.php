<?php

namespace App\Enums\Config;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
enum ServiceTypeEnum:string
{
    case JEUX = "jeux";
    case PLATEFORME = "plateforme";
}
