<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ListeIngredients extends Model
{   

    protected $table = 'ingredients';
    protected $primaryKey = "id";
    protected $fillable = [
        'nom_ingredient',
        'categorie',
        'categorie_id',
        'type_quantite'
    ];
    public function categories()
    {
        return $this->hasOne(CategoriesIngredients::class, 'id', 'categorie_id');
    }
    use HasFactory;
}