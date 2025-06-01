<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Vision;
use Illuminate\Http\Request;

class VisionController extends Controller
{
    public function add()
    {
        $vision = Vision::first();
        return view('admin.vision.add', compact('vision'));
    }

    public function store(Request $request)
    {
        $vision = Vision::first();

        if (!$vision) {
            $vision = new Vision();
        }

        $vision->title = $request->title;
        $vision->description = $request->description;

        if ($request->image != null) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/vision/' . $vision->image)) {
                unlink(env('ASSETPATHURL') . 'admin/images/vision/' . $vision->image);
            }
            $filename = 'vision-' . uniqid() . '.' . $request->image->Extension();
            $request->image->move(env('ASSETPATHURL') . 'admin/images/vision', $filename);
            $vision->image = $filename;
        }

        $vision->save();
        return redirect(route('admin.vision.add'))->with('success', 'Vision Added Successfully!');
    }
}
