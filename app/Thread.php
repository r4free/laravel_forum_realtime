<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable =[
        'body','title','user_id'
    ];
    public function getFiltered($filter = null, $paginate = 10)
    {
        if ($filter) {
            return $this->mostRecently()->where("body", "LIKE", "%{$filter}%")->orWhere("title", "LIKE", "%{$filter}%")->get();
        }

        return $this->mostRecently()->paginate($paginate);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();
        auth()->check() && self::creating(function ($model) {
            $model->user_id = auth()->user()->id;
        });
    }

    public function mostRecently(){
        return $this->orderBy('updated_at','desc');
    }

}
