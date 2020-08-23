<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
        protected $table = 'pharmacyreview';

    protected $fillable = ['question','response','comment','user_id'];
}
