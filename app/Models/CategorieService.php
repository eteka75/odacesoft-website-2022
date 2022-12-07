<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieService extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'img', 'icone', 'lead','content','user_id','actif'
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
       return $this->date_event!=null ?$this->updated_at->diffForHumans():null;
   }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
