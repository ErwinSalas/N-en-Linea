<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email','score', 'level', 'win_matches','lost_matches','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function gamesession()
    {
        return $this->belongsTo('App\Gamesession');
    }
    public function setImageAttribute($image)
    {
        if ($this->password != null) {
            if (!empty($image)) {
                $name = Carbon::now()->second . $image->getClientOriginalName();
                $this->attributes['image'] = $name;
                \Storage::disk('local')->put($name, \File::get($image));
            }
        }
        $this->attributes['image'] = $image;
    }

}
