<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 08/01/2019
 * Time: 01:09
 */

namespace App\Services;


use App\Http\Middleware\Locale;

class TranslateService
{
    static function getLang()
    {
        return response()->json([]);
    }
}
