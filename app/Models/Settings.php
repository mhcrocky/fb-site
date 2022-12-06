<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    public $fillable = ['key','value'];
    public static function getValue($key = '')
    {
        return json_decode(Settings::where('key',$key)->get()->first()->value);
    }
}
