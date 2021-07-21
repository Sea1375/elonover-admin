<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Setting as SettingModel;

class Setting extends Model
{
    protected $table = "settings";
    public $timestamps = false;

    public static function getByKey($key) {
        
    }

    public static function setByKey($key, $value) {
        SettingModel::where('key', $key)->update(['value' => $value]);
    }
}