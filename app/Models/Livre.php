<?php

namespace App\Models;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livre extends Model
{
   use HasFactory;
       /* protected $fillable = [

        ];*/
        protected $guarded=[];
        public function  Categorie (){
            return $this->belongsto(Categorie::class);
        }


}
