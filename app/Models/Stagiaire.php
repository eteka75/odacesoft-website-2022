<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'nom', 'prenom', 'sexe','lieu','email', 'tel', 'domaine', 'duree_stage', 'references_stage', 'raisons_stage','competences_stage','cv','lettre_motivation','user_id','etat'
    ];
    protected $appends=['h_created_at','h_updated_at'];


    /**
    * Functun de convertion de date  de création
    */
   public function getHCreatedAtAttribute()
   {
       return $this->created_at!=null ?date('d/m/Y à H\H i\m\i\n', strtotime($this->created_at)):null;
   }
   /**
    * Functun de convertion de date  de mise a jour
    */
   public function getHUpdatedAtAttribute()
   {
       return $this->updated_at!=null ?date('d/m/Y à H\H i\m\i\n', strtotime($this->updated_at)):null;
   }
    /**
     * Get the comments for the blog post.
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
     /**
     * Get the comments for the blog post.
     */
}
