<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Event extends Model
{
    protected $table = 'event';
    protected $fillable = ['nama_event','tgl_event','lokasi','deskripsi','published'];
}
