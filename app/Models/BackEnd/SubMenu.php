<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\BackEnd\Menu;

class SubMenu extends Model
{
    use HasFactory, SoftDeletes;

    public function menus(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id')->withTrashed();
    }
}
