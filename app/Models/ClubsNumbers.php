<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ClubsNumbers extends Model
{
    use HasFactory;
    protected $table = 'ClubsNumbers';
    protected $fillable = [
        'id_club',
        'cantidad',
        'fecha'
    ];

    public function club(): BelongsTo
    {
        return $this->belongsTo(Clubs::class, 'id_club');
    }
}
