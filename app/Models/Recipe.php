<?php

namespace App\Models;

use App\Models\OrderHistory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class)->withPivot('quantity');
    }
    
    public function order_history(): HasMany
    {
        return $this->hasMany(OrderHistory::class);
    }
    use HasFactory;
}
