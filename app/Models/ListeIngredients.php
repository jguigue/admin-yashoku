<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListeIngredients extends Model
{   
    public function categories()
    {
        return $this->AsOne(CategoriesRecettes::class);
    }
    protected $table = 'ingredients';
    protected $primaryKey = "id";
    protected $fillable = [
        'nom_ingredient',
        'type_quantite',
        'image',
    ];
    use HasFactory;
}