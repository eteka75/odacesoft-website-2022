<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
class Evenement extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'lieu', 'lead', 'img','date_event','heure_event','top','nb_participants',
        'date_fin', 'heure_fin','content','view_count','priorite','user_id','actif'
    ];
    protected $appends=['h_created_at','h_updated_at','h_date_debut','h_date_fin'];


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
   /**
    * Functun de convertion de date  de mise a jour
    */
   public function getHDateDebutAttribute()
   {
    return $this->date_event!=null ?date('d/m/Y',strtotime($this->date_event)):null;
   }
   /**
    * Functun de convertion de date  de mise a jour
    */
   public function getHDateFinAttribute()
   {
    return $this->date_fin!=null ?date('d/m/Y',strtotime($this->date_fin)):null;
   }
}
