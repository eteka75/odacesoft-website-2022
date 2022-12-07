<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'slug', 'description','user_id'
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
     * Get all of the posts that are assigned this tag.
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_tags','tag_id','article_id')->withTimestamps();

    }
     /**
     * Get the comments for the blog post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
