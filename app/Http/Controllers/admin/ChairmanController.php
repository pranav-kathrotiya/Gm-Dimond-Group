<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Chairman;
use Illuminate\Http\Request;

class ChairmanController extends Controller
{
    public function index()
    {
        $chairmansdata = Chairman::orderByDesc('id')->get();
        return view('admin.chairman.index', compact('chairmansdata'));
    }

    public function add()
    {
        return view('admin.chairman.add');
    }

    public function store(Request $request)
    {
        foreach ($request->image as $img) {
            $image = 'chairman-' . uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move(env('ASSETPATHURL') . 'admin/images/chairman', $image);
            $chairman = new Chairman();
            $chairman->name = $request->name;
            $chairman->description = $request->description;
            $chairman->image = $image;
            $chairman->save();
        }
        return redirect(route('admin.chairman.index'))->with('success', 'Chairman Added Successfully!');
    }

    public function edit(Request $request)
    {
        $chairman = Chairman::where('id', $request->id)->first();
        return view('admin.chairman.edit', compact('chairman'));
    }

    public function update(Request $request)
    {
        $chairman = Chairman::where('id', $request->id)->first();
        if ($request->image != null) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/chairman/' . $chairman->image)) {
                unlink(env('ASSETPATHURL') . 'admin/images/chairman/' . $chairman->image);
            }
            $filename = 'chairman-' . uniqid() . '.' . $request->image->Extension();
            $request->image->move(env('ASSETPATHURL') . 'admin/images/chairman', $filename);
            $chairman->image = $filename;
        }
        $chairman->name = $request->name;
        $chairman->description = $request->description;
        $chairman->save();
        return redirect(route('admin.chairman.index'))->with('success', 'Chairman Updated Successfully!');
    }

    public function delete(Request $request)
    {
        $chairman = Chairman::where('id', $request->id)->first();
        if ($chairman) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/chairman/' . $chairman->image)) {
                unlink(env('ASSETPATHURL') . 'admin/images/chairman/' . $chairman->image);
            }
            $chairman->delete();
            return 1;
        } else {
            return 0;
        }
    }

    public function status(Request $request)
    {
        $chairmansdata = Chairman::where('id', $request->id)->update(['is_available' => $request->status]);
        if ($chairmansdata) {
            return 1;
        } else {
            return 0;
        }
    }
}
