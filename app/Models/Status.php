<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    /**
     * undocumented function
     *
     * @return void
     */
    public function idea()
    {
        return $this->hasMany(Idea::class);
    }
    
}
