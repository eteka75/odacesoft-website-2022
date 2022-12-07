<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalerieImage extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'galerie_images';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titre', 'slug','lead', 'description', 'img','view_count', 'actif','user_id'];
    protected $appends=['h_created_at','h_updated_at','nb_image'];


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
   public function getNbImageAttribute()
   {
       $n=($this->Images()->count());
       return 1  + $n ;
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
    public function Images()
    {
        return $this->hasMany(GImage::class,'galerie_id');
    }
    
}
