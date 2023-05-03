<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * @mixin IdeHelperMovement
 */
class Movement extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'date' => 'datetime',
        'pain' => 'boolean'
    ];

    public const URGENCY_OPTIONS = [
        'none' => 'Aucune',
        'moderate' => 'Modérée',
        'urgent' => 'Urgent'
    ];

    protected $fillable = [
        'rating',
        'urgency',
        'pain',
        'date',
        'comment',
    ];

    public const BRISTOL_SCALE = [
        1 => '1 - Lapin',
        2 => '2 - Hérisson',
        3 => '3 - Souris',
        4 => '4 - Queue de chat',
        5 => '5 - Cheval',
        6 => '6 - Vache',
        7 => '7 - Eau'
    ];

    public function foods(): BelongsToMany
    {
        return $this->belongsToMany(Food::class);
    }

    public function setFoodFromSelect(?array $input)
    {
        $ids = collect($input ?? [])
            ->map(fn (string $foodItem) => is_numeric($foodItem) ? $foodItem : Food::create(['name' => ucfirst($foodItem)])->id);
        $this->foods()->sync($ids);
    }

    public function getFoodIds(): array
    {
        return $this->foods()->pluck('id')->toArray();
    }
}
