<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ArticlesViews extends Model
{
    use HasFactory;
    protected $fillable = [
        'article_id', 'title', 'slug', 'url', 'session_id', 'user_id',
        'ip', 'agent'
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
    public static function createViewLog($post,$request) {
        $postsViews= new ArticlesViews();
        $postsViews->article_id = $post->id;
        $postsViews->title = $post->title;
        $postsViews->slug = $post->slug;
        $postsViews->url = $request->url;
        $postsViews->session_id =$request->getSession()->getId();
        $postsViews->user_id =$request->user()?$request->user()->id:'';
        $postsViews->ip = $request->getClientIp();
        $postsViews->agent = $request->header('User-Agent');
        $postsViews->save();
    }
}
