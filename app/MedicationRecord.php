<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicationRecord extends Model
{
    protected $table = 'medication_record';

    protected $fillable = ['diagnosis','allergies','physician','name','diet','reg_nurse','date'];
}
