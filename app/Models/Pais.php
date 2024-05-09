<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pais extends Model
{
    use HasFactory;
    protected $table = 'Pais';
    protected $fillable = [
        'nombre',
        'locale'];
    public function estados(): HasMany
    {
        return $this->hasMany(Estados::class, 'id_pais', 'id');
    }
}
