<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Item extends Model
{
    
    
    public function itemuser()
    {
        return $this->belongsTo('App\User');
    }    

    
    
    public function mark()
    {
        if ($this->done == true)
        {
            $this->done = false;
            $this->done_at = null;
        }
        else
        {
            $this->done = true;
            $this->done_at = Carbon::now();
        }
        $this->save();
    }
}