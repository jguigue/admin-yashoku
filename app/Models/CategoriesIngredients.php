<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ListeIngredients;

class CategoriesIngredients extends Model
{
    public function categories()
    {
        return $this->hasMany(ListeIngredients::class);
    }
    protected $table = 'categorie_ingredients';
    protected $primaryKey = "id";
    protected $fillable = [
        'nom_categorie',
    ];
    use HasFactory;
    
}