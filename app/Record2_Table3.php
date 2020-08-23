<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record2_Table3 extends Model
{
         protected $table = 'record2_table3';

    protected $fillable = ['date','hour','initial','medication','reason','action','n_id'];
}
