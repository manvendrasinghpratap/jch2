<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicationDosage extends Model
{
    protected $table = 'medication_dosage';

    protected $fillable = ['stat_date','m_d_p_n','dc_date','hour','p_id'];
}
