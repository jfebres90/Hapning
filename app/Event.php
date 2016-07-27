<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



class Event extends Model
{
    //avoids mass assingment exception
    protected $fillable = [

        'category_id',
        'description',
        'event_title',
        'tags',
        'start',
        'end',

];




public function scopeactiveEvents($query){

    $query->join('photos', 'events.event_id', '=' , 'photos.imageable_id' )
        ->select('events.event_id','events.user_id','events.event_title','events.created_at','events.description',
            'events.start','events.end', 'photos.image_path','photos.thumb_path', 'photos.image_name')
        ->where('events.end','>=', Carbon::now())->where('imageable_type','=','Event')->get();


}


public function scopeuserEvents($query){


        return $query->whereuser_id(Auth::user()->id );

}


    /**
     * Events belong to the user
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user()
    {

        return $this->belongsTo('App\User');

    }

    public function eventImages(){

        return $this->hasOne('Image');


    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'imageable');
    }
    //
}
