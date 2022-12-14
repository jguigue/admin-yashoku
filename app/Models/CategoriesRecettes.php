<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesRecettes extends Model
{
    protected $table = 'categorie_recettes';
    protected $primaryKey = "id";
    protected $fillable = [
        'nom_categorie',
    ];

    use HasFactory;
}