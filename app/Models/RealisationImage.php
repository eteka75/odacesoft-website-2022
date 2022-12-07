<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Realisation;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
class RealisationImage extends Model
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
      //use HasCan;
    
    /*
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'url','view_count','realisation_id','etat','user_id'
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
        return $this->belongsTo(User::class,'user_id');
    }
     /**
     * Get the comments for the blog post.
     */
    public function realisation()
    {
        return $this->belongsTo(Realisation::class,'realisation_id');
    }
    
}
