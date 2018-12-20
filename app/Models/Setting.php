<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable
        = [
            'key',
            'value',
        ];

    protected $casts
        = [
            'value' => 'array',
        ];

    public $timestamps = false;

    protected static $rows
        = [
            'title' => '',
            'subtitle' => '',
            'logo' => '',
            'favicon' => '',
            'phone' => '',
            'phone2' => '',
            'telephone' => '',
            'email' => '',
            'address' => '',
            'slider' => '',
            'ceo_image' => '',
            'Ceo_Name_ar' => '',
            'Ceo_Name_en' => '',
            'Ceo_Name_tr' => '',
            'ceo_description_en' => '',
            'ceo_description_ar' => '',
            'ceo_description_tr' => '',
            'pdf' => '',
            'ourproduct_image' => '',
            'ourproduct_description_tr' => '',
            'ourproduct_description_en' => '',
            'ourproduct_description_ar' => '',
            'index_title_ar' => '',
            'index_title_en' => '',
            'index_title_tr' => '',
            'panel_description_tr' => '',
            'panel_description_en' => '',
            'panel_description_ar' => '',
            'index_title_ar2' => '',
            'index_title_en2' => '',
            'index_title_tr2' => '',
            'panel_description_tr2' => '',
            'panel_description_en2' => '',
            'panel_description_ar2' => '',
            'index_title_ar3' => '',
            'index_title_en3' => '',
            'index_title_tr3' => '',
            'panel_description_tr3' => '',
            'panel_description_en3' => '',
            'panel_description_ar3' => '',
            'goal_title_ar' => '',
            'goal_title_en' => '',
            'goal_title_tr' => '',
            'view_title_ar' => '',
            'view_title_en' => '',
            'view_title_tr' => '',
            'message_title_ar' => '',
            'message_title_en' => '',
            'message_title_tr' => '',
            'goal_description_tr' => '',
            'goal_description_en' => '',
            'goal_description_ar' => '',
            'view_description_tr' => '',
            'view_description_en' => '',
            'view_description_ar' => '',
            'message_description_tr' => '',
            'message_description_en' => '',
            'message_description_ar' => '',
        ];

    public static function get($key, $default = '')
    {
        $get = self::where('key', $key)->first();
        if ( ! count($get)) {
            return $default;
        }

        return $get->value;
    }


    public static function set($key, $value)
    {
        $set = self::where('key', $key)->first();

        if ( ! isset($set)) {
            $set = self::firstOrCreate([
                'key'   => $key,
                'value' => $value,
            ]);
        } else {
            $set->update(['value' => $value]);
        }

        return $set;
    }


    public static function forget($key)
    {
        $forget = self::where('key', $key)->first();
        if (count($forget)) {
            return $forget->delete();
        }
    }

    public static function rows()
    {
        $items = self::all();

        $settings = self::$rows;
        foreach ($items as $item) {
            $settings[$item->key] = $item->value;
        }

        return (OBJECT)$settings;
    }
}
