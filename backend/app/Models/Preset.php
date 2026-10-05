<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Preset extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'signal_chain_order',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'signal_chain_order' => 'array',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pedals(): BelongsToMany
    {
        return $this->belongsToMany(Pedal::class, 'preset_pedal', 'preset_id', 'pedal_id')
            ->withPivot('settings_note');
    }
}
