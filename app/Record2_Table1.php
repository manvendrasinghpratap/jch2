<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record2_Table1 extends Model
{
     protected $table = 'record2_table1';

    protected $fillable = ['date','hour','initial','medication','reason','action','n_id'];
}
