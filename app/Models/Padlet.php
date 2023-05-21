<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Padlet extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'is_public', 'user_id'];

    public function entries() : hasMany
    {
        return $this->hasMany(Entry::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
