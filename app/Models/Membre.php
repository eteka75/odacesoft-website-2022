<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membre extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'prenom', 'poste', 'sexe', 'datenaissance','lieunaissance','niveau_etude','bio','date_integration','ordre',
        'lead', 'website','facebook','twitter','instagram','linkedin','other_link','photo','cover','fichier','user_id','actif'
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
   public function user(){
       return $this->belongsTo(User::class,'user_id');
   }
}
