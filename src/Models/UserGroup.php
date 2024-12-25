<?php

namespace Zoker\Shop\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zoker\Shop\Classes\Bases\BaseModel;
use Zoker\Shop\Enums\Permission;

class UserGroup extends BaseModel
{
    use SoftDeletes;

    protected $casts = [
        'permissions' => 'array',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_group_users', 'user_group_id', 'user_id');
    }

    public function hasPermission(Permission $permission): bool
    {
        return in_array($permission->value, $this->permissions ?? []);
    }
}
