<?php

namespace Zoker\Shop\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zoker\Shop\Classes\Model;

class UserGroup extends Model
{
    use SoftDeletes;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_group_users', 'user_group_id', 'user_id');
    }

    public function canAccessPanel(): bool
    {
        return $this->is_admin;
    }
}
