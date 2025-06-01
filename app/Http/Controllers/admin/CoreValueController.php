<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CoreValue;
use App\Models\Settings;
use App\Models\SocialMedia;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class CoreValueController extends Controller
{

    public function coreDescriptionStore(Request $request)
    {
        $core_description = Settings::first();

        if (!$core_description) {
            $core_description = new Settings();
        }
        $core_description->core_value_description = $request->core_value_description;

        $core_description->save();
        return redirect(route('admin.core_values.index'))->with('cor_success', 'Description Added Successfully!');
    }
    public function index()
    {
        $core_description = Settings::first();
        $core_valuesdata = CoreValue::orderByDesc('id')->get();
        return view('admin.core_values.index', compact('core_valuesdata', 'core_description'));
    }

    public function add()
    {
        return view('admin.core_values.add');
    }

    public function store(Request $request)
    {
        foreach ($request->image as $img) {
            $image = 'core_values-' . uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move(env(key: 'ASSETPATHURL') . 'admin/images/core_values', $image);
            $core_values = new CoreValue();
            $core_values->title = $request->title;
            $core_values->description = $request->description;
            $core_values->image = $image;
            $core_values->save();
        }
        return redirect(route('admin.core_values.index'))->with('success', 'Core Value Added Successfully!');
    }

    public function edit(Request $request)
    {
        $core_values = CoreValue::where('id', $request->id)->first();
        return view('admin.core_values.edit', compact('core_values'));
    }

    public function update(Request $request)
    {
        $core_values = CoreValue::where('id', $request->id)->first();
        if ($request->image != null) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/core_values/' . $core_values->image)) {
                unlink(env('ASSETPATHURL') . 'admin/images/core_values/' . $core_values->image);
            }
            $filename = 'core_values-' . uniqid() . '.' . $request->image->Extension();
            $request->image->move(env('ASSETPATHURL') . 'admin/images/core_values', $filename);
            $core_values->image = $filename;
        }
        $core_values->title = $request->title;
        $core_values->description = $request->description;
        $core_values->save();
        return redirect(route('admin.core_values.index'))->with('success', 'Core Value Updated Successfully!');
    }

    public function delete(Request $request)
    {
        $core_values = CoreValue::where('id', $request->id)->first();
        if ($core_values) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/core_values/' . $core_values->image)) {
                unlink(env('ASSETPATHURL') . 'admin/images/core_values/' . $core_values->image);
            }
            $core_values->delete();
            return 1;
        } else {
            return 0;
        }
    }

    public function status(Request $request)
    {
        $core_values = CoreValue::where('id', $request->id)->update(['is_available' => $request->status]);
        if ($core_values) {
            return 1;
        } else {
            return 0;
        }
    }
}
