<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = ['entryText'];

    /**
     * Entry belongs to one padlet
     * @return BelongsTo
     */
    public function padlet() : BelongsTo {
        return $this->belongsTo(Padlet::class);
    }

}
