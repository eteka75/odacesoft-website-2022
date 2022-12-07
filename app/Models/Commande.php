<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre','prix_min','prix_max','delais','code_commande','type_content','content','etat','service_id','quantite',
        'email','tel','pays_id','auteur','fichier','user_id','actif'
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
    /**
     * Get the comments for the blog post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
     /**
     * Get the comments for the blog post.
     */
    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }
     /**
     * Get the comments for the blog post.
     */
    public function pays()
    {
        return $this->belongsTo(Pays::class,'pays_id');
    }
}
