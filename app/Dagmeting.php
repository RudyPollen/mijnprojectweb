<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dagmeting extends Model
{
    protected $table = 'dagmeting'; //koppelaan tabel dagmeting
    public $timestamps = false; //tabels bevad geen timestamps
}
