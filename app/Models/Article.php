<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArticleCategorie;
use App\Models\Tag;
use App\Models\User;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'title', 'slug', 'statut', 'lead', 'content', 'comment_statuts',
        'view_count', 'categorie_id', 'user_id',
        'featured','actif'
    ];
    protected $appends=['h_created_at','h_updated_at','categories_ids','tags_ids','image_ids','nb_commentaires'];


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
        return $this->belongsTo(ArticleCategorie::class,'categorie_id')->withDefault();;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'article_tags','article_id','tag_id')->withTimestamps();
    }

    public function getTagsIdsAttribute()
    {
        return $this->tags->pluck('id');
    }
    public function getCategoriesIdsAttribute()
    {
        return $this->pluck('categorie_id');
    }
    public function getImageIdsAttribute()
    {
        return $this->pluck('categorie_id');
    }

    /**
     * Get the comments for the blog post.
     */
    public function commentaires()
    {
        return $this->hasMany(ArticleCommentaire::class,'article_id');
    }

    /**
     * Get the comments for the blog post.
     */
    public function getNbCommentairesAttribute()
    {
        return $this->commentaires->pluck('article_id')->count();
    }
    /**
     * Get the comments for the blog post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the phone associated with the user.
     */
    public function image()
    {
        return $this->hasOne(ArticleMedia::class,'article_id');
    }

}
