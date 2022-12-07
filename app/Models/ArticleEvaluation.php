<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleEvaluation extends Model
{
    use HasFactory;
    protected $appends=['h_created_at','h_updated_at'];
    

    /**
    * Functun de convertion de date  de création
    */
   public function getHCreatedAtAttribute()
   {
       return $this->created_at!=null ?$this->created_at->diffForHumans():null;
   }
   /**
    * Functun de convertion de date  de mise a jour
    */
   public function getHUpdatedAtAttribute()
   {
       return $this->updated_at!=null ?$this->updated_at->diffForHumans():null;
   }
}
