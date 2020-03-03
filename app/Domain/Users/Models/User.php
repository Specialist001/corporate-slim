<?php

namespace App\Domain\Users\Models;


use App\Services\FilterService\Filterable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Domain\Users\Models\User
 *
 * @property int $id
 * @property string|null $role
 * @property string|null $name
 * @property string $username
 * @property string|null $email
 * @property string|null $email_verified_at
 * @property string|null $password
 * @property int $active
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User filter(\App\Services\FilterService\Filter $filters)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Domain\Users\Models\User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User paginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User simplePaginateFilter($perPage = 20)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Domain\Users\Models\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Domain\Users\Models\User withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User admins()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User managers()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Domain\Users\Models\User users()
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, SoftDeletes, Filterable;

    const ROLE_ADMIN = 'admin';
    const ROLE_MANAGER = 'manager';
    const ROLE_USER = 'user';

    const STATUS_ACTIVE = 1;
    const STATUS_NOT_ACTIVE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function preferredLocale()
    {
        return $this->locale;
    }

    public static function roles()
    {
        return [
            static::ROLE_ADMIN,
            static::ROLE_MANAGER,
            static::ROLE_USER,
        ];
    }

    public static function statuses()
    {
        return [
            static::STATUS_ACTIVE,
            static::STATUS_NOT_ACTIVE,
        ];
    }

    public function isAdmin()
    {
        return $this->role === static::ROLE_ADMIN;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAdmins($query)
    {
        return $query->where('role', static::ROLE_ADMIN);
    }

    public function isManager()
    {
        return $this->role === static::ROLE_MANAGER;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeManagers($query)
    {
        return $query->where('role', static::ROLE_MANAGER);
    }

    public function isUser()
    {
        return $this->role === static::ROLE_USER;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUsers($query)
    {
        return $query->where('role', static::ROLE_USER);
    }

    /**
     * Check role
     *
     * @param array|string $roles
     * @return bool
     */
    public function hasRole($roles)
    {
        $myRoles = self::roles();

        if (is_array($roles)) {
            foreach ($roles as $role) {
                if (in_array($role, $myRoles) && $this->role == $role) {
                    return true;
                }
            }
            return false;
        }
        return in_array($roles, $myRoles) && $this->role == $roles;
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
//        $this->notify(new VerifyEmail);
    }
}
