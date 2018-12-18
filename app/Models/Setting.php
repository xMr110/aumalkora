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
            'fax' => '',
            'slider' => '',
            'map_Lat' => '',
            'map_Lng' => '',
            'pdf' => '',
            'whytitle_en' => '',
            'whytitle_fr' => '',
            'whybody_fr' => '',
            'whybody_en' => '',
            'part1_image'=> '',
            'part1_title_en'=> '',
            'part1_title_fr'=> '',
            'part1_description_en'=> '',
            'part1_description_fr'=> '',
            'part2_image'=> '',
            'part2_title_en'=> '',
            'part2_title_fr'=> '',
            'part2_description_en'=> '',
            'part2_description_fr'=> '',
            'part3_image'=> '',
            'part3_title_en'=> '',
            'part3_title_fr'=> '',
            'part3_description_en'=> '',
            'part3_description_fr'=> '',
            'part4_image'=> '',
            'part4_title_en'=> '',
            'part4_title_fr'=> '',
            'part4_description_en'=> '',
            'part4_description_fr'=> '',
            'project_image'=> '',
            'project_description_fr'=> '',
            'project_description_en'=> '',
            'section_project_image'=>'',
            'section_service_image'=>'',
            'section_topic_image'=>'',
            'section_partner_image'=>'',
            'section_team_image'=>'',
            'section_about_image'=>'',
            'why_image'=>'',
            'why_image_mobile'=>'',
            'whatwedo_image'=>'',
            'whatwedo_image_mobile'=>'',

        ];

    public static function get($key, $default = '')
    {
        $get = self::where('key', $key)->first();
        if (!count($get)) {
            return $default;
        }

        return $get->value;
    }


    public static function set($key, $value)
    {
        $set = self::where('key', $key)->first();

        if (!isset($set)) {
            $set = self::firstOrCreate([
                'key' => $key,
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
