<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Cache;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{


    public function __construct(Setting $setting)
    {
        $this->model = $setting;
    }

    public function index()
    {

        return view('admin.settings.edit');
    }
    public function Panel()
    {
        return view('admin.index.panel');
    }
    public function OurProduct()
    {
        return view('admin.index.ourproduct');
    }
  public function AboutUs()
    {
        return view('admin.index.aboutus');
    }


    public function store(Request $request){

        $settings = $this->model->rows();

        $input = $request->except(['_token', '_method']);

        if ($request->hasFile('logo')) {
            $input['logo'] = $request->file('logo')->store('basics', 'public');

//            @unlink(public_path('app/public/'. $settings->logo));
        }
        if ($request->hasFile('favicon')) {
            $input['favicon'] = $request->file('favicon')->store('basics', 'public');

//            @unlink(public_path('app/public/'. $settings->logo));
        }

        if ($request->hasFile('ceo_image')) {
            $input['ceo_image'] = $request->file('ceo_image')->store('basics', 'public');

//            @unlink(storage_path('app/public/'. $settings->favicon));
        }
        if ($request->hasFile('ourproduct_image')) {
            $input['ourproduct_image'] = $request->file('ourproduct_image')->store('index', 'public');

//            @unlink(public_path('app/public/'. $settings->logo));
        }

        foreach ($input as $key => $value) {
            if(!is_null($value))
                $this->model->set($key, $value);
        }

        Cache::forget('site_settings');
        $settings = Cache::rememberForever('site_settings', function () {
            $settings = $this->model->rows();
            return $settings;
        });

        return back()->with('success', 'Settings Saved Successfully..');
    }

}
