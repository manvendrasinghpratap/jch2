<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record2_Table2 extends Model
{
     protected $table = 'record2_table2';

    protected $fillable = ['date','hour','initial','medication','reason','action','n_id'];
}