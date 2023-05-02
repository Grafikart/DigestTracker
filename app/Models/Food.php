<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperFood
 */
class Food extends Model
{
    use HasFactory;

    protected $table = 'food';
    public $timestamps = false;

    protected $fillable = ['name'];

    public function movements(): BelongsToMany
    {
        return $this->belongsToMany(Food::class);
    }
}
