<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public function getFiltered($filter = null, $paginate = 10)
    {
        if ($filter) {
            return $this->where("body", "LIKE", "%{$filter}%")->orWhere("title", "LIKE", "%{$filter}%")->get();
        }

        return $this->paginate($paginate);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
