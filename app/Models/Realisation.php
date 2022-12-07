<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\RealisationImage;
use App\Models\User;

class Realisation extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'lead', 'content', 'img','service_id','view_count',
        'user_id','actif'
    ];
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
    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }
     /**
     * Get the comments for the blog post.
     */
    public function Images()
    {
        return $this->hasMany(RealisationImage::class,'realisation_id');
    }
}
