<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Pelaku_ekraf extends Model
{	
	use Uuid;
    use HasFactory;
    protected $table = 'pelaku_ekraf';
    protected $guard = [];

    public function sektor(){
        return $this->belongsTo(Sektor::class);
    }
}
