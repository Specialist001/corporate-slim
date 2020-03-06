<?php


namespace App\Services;


class TranslitService
{
    const CYR = [
        'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п',
        'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',
        'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П',
        'Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я'
    ];
    const LAT = [
        'a','b','v','g','d','e','io','zh','z','i','y','k','l','m','n','o','p',
        'r','s','t','u','f','h','ts','ch','sh','sht','a','i','y','e','yu','ya',
        'A','B','V','G','D','E','Io','Zh','Z','I','Y','K','L','M','N','O','P',
        'R','S','T','U','F','H','Ts','Ch','Sh','Sht','A','I','Y','e','Yu','Ya'
    ];

    public static function makeLatin($str)
    {
        $str = str_replace(static::CYR, static::LAT, $str);
        return self::clearText($str);
    }

    public static function makeCyr($str)
    {
        $str = self::clearText($str);
        return str_replace(static::LAT, static::CYR, $str);
    }

    public static function clearText($str)
    {
        $str = str_replace(' ', '_', trim($str));
        return preg_replace('/\W/i', '', $str);
    }
}
