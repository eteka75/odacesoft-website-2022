<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategorieService;

class Service extends Model
{
    use HasFactory;


    protected $fillable = [
        'title', 'slug', 'prix', 'prix_min','prix_max', 'img','icone','lead','content',
        'categorie_service_id','user_id','view_count','actif'
    ];

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
   public function categories()
    {
        return $this->belongsTo(CategorieService::class,'categorie_service_id')->withDefault();;
    }
   public function categorie()
    {
        return $this->belongsTo(CategorieService::class,'categorie_service_id')->withDefault();;
    }

}
