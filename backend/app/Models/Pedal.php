<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pedal extends Model
{
    protected $fillable = [
        'name',
        'brand',
        'category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function presets(): BelongsToMany
    {
        return $this->belongsToMany(Preset::class, 'preset_pedal', 'pedal_id', 'preset_id')
            ->withPivot('settings_note');
    }
}
