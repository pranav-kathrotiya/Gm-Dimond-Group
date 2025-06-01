<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Workplace;
use Illuminate\Http\Request;

class WorkplaceController extends Controller
{
    public function add()
    {
        $workplace = Workplace::first();
        return view('admin.workplace.add', compact('workplace'));
    }

    public function store(Request $request)
    {
        $workplace = Workplace::first();

        if (!$workplace) {
            $workplace = new Workplace();
        }

        $workplace->name = $request->name;
        $workplace->description = $request->description;

        if ($request->image != null) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/workplace/' . $workplace->image)) {
                unlink(env('ASSETPATHURL') . 'admin/images/workplace/' . $workplace->image);
            }
            $filename = 'workplace-' . uniqid() . '.' . $request->image->Extension();
            $request->image->move(env('ASSETPATHURL') . 'admin/images/workplace', $filename);
            $workplace->image = $filename;
        }

        $workplace->save();
        return redirect(route('admin.workplace.add'))->with('success', 'Workplace Added Successfully!');
    }
}
