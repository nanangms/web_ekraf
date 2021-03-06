<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
class Sektor extends Model
{
	use Uuid;
    use HasFactory;
    protected $table = 'sektor';
    protected $fillable = ['nama_sektor'];
}
