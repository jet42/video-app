<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['user_id', 'bitrate', 'filesize', 'duration', 'file_location', 'name', 'extension', 'format'];
    //
}
