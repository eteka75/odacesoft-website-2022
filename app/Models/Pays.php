<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategorieService;

class Pays extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'code', 'alpha2', 'alpha3','nom_en_gb', 'nom_fr_fr'
    ];


}
