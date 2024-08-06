<?php

namespace App\Models;

use App\Models\Livre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;
   /* protected $fillable = [

    ];*/
    protected $guarded=[];
    public function  Livre (){
        return $this->belongsto(Livre::class);
    }
}
