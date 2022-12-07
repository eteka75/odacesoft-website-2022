<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class ArticleCategorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'slug', 'description',"couleur",'img','active'
    ];

    protected $appends=['h_created_at','h_updated_at','nb'];


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
   public function getNbAttribute()
   {
       return $this->count();
   }
    public function articles()
    {
        return $this->hasMany(Article::class,'categorie_id');
    }
     /**
     * Get the comments for the blog post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
