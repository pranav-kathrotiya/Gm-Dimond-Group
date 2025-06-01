<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function add()
    {
        $mission = Mission::first();
        return view('admin.mission.add', compact('mission'));
    }

    public function store(Request $request)
    {
        $mission = Mission::first();

        if (!$mission) {
            $mission = new Mission();
        }

        $mission->title = $request->title;
        $mission->description = $request->description;

        if ($request->image != null) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/mission/' . $mission->image)) {
                unlink(env('ASSETPATHURL') . 'admin/images/mission/' . $mission->image);
            }
            $filename = 'mission-' . uniqid() . '.' . $request->image->Extension();
            $request->image->move(env('ASSETPATHURL') . 'admin/images/mission', $filename);
            $mission->image = $filename;
        }

        $mission->save();
        return redirect(route('admin.mission.add'))->with('success', 'Mission Added Successfully!');
    }
}
