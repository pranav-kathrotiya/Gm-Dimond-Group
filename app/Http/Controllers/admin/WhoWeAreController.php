<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\WhoWeAre;
use Illuminate\Http\Request;

class WhoWeAreController extends Controller
{
    public function add()
    {
        $who_we_are = WhoWeAre::first();
        return view('admin.who_we_are.add', compact('who_we_are'));
    }

    public function store(Request $request)
    {
        $who_we_are = WhoWeAre::first();

        if (!$who_we_are) {
            $who_we_are = new WhoWeAre();
        }

        $who_we_are->title = $request->title;
        $who_we_are->description = $request->description;

        if ($request->image != null) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/who_we_are/' . $who_we_are->image)) {
                unlink(env('ASSETPATHURL') . 'admin/images/who_we_are/' . $who_we_are->image);
            }
            $filename = 'who_we_are-' . uniqid() . '.' . $request->image->Extension();
            $request->image->move(env('ASSETPATHURL') . 'admin/images/who_we_are', $filename);
            $who_we_are->image = $filename;
        }

        $who_we_are->save();
        return redirect(route('admin.who_we_are.add'))->with('success', 'Who We Are Added Successfully!');
    }
}
