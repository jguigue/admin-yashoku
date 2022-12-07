<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesIngredients extends Model
{
    protected $table = 'categorie_ingredients';
    protected $primaryKey = "id";
    protected $fillable = [
        'nom_categorie',
    ];

    use HasFactory;
}