<?php

namespace App\Domain\Contacts\Model;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Domain\Contacts\Model\Contact
 *
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Contacts\Model\Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Contacts\Model\Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Contacts\Model\Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Contacts\Model\Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Contacts\Model\Contact whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Contacts\Model\Contact whereValue($value)
 * @mixin \Eloquent
 */
class Contact extends Model
{
    protected $guarded = ['id'];

    public static $keysAvailable = [
        'phone',
    ];

    public $timestamps = false;
}
