<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Onecodeuse extends Model
{
    use HasFactory;
    use SoftDeletes;
    //no timpestamps
    public $timestamps = false;
    protected $table = 'onecodeuse';
    protected $fillable = [
        'id_user',
        'onecode',
        'used',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
