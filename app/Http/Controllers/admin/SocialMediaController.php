<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index()
    {
        $social_mediasdata = SocialMedia::orderByDesc('id')->get();
        return view('admin.social_media.index', compact('social_mediasdata'));
    }

    public function add()
    {
        return view('admin.social_media.add');
    }

    public function store(Request $request)
    {
        foreach ($request->image as $img) {
            $image = 'social_media-' . uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move(env('ASSETPATHURL') . 'admin/images/social_media', $image);
            $event = new SocialMedia();
            $event->link = $request->link;
            $event->image = $image;
            $event->save();
        }
        return redirect(route('admin.social_media.index'))->with('success', 'Social Media Added Successfully!');
    }

    public function edit(Request $request)
    {
        $social_media = SocialMedia::where('id', $request->id)->first();
        return view('admin.social_media.edit', compact('social_media'));
    }

    public function update(Request $request)
    {
        $social_media = SocialMedia::where('id', $request->id)->first();
        if ($request->image != null) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/social_media/' . $social_media->image)) {
                unlink(env('ASSETPATHURL') . 'admin/images/social_media/' . $social_media->image);
            }
            $filename = 'social_media-' . uniqid() . '.' . $request->image->Extension();
            $request->image->move(env('ASSETPATHURL') . 'admin/images/social_media', $filename);
            $social_media->image = $filename;
        }
        $social_media->link = $request->link;
        $social_media->save();
        return redirect(route('admin.social_media.index'))->with('success', 'Social Media Updated Successfully!');
    }

    public function delete(Request $request)
    {
        $social_media = SocialMedia::where('id', $request->id)->first();
        if ($social_media) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/social_media/' . $social_media->image)) {
                unlink(env('ASSETPATHURL') . 'admin/images/social_media/' . $social_media->image);
            }
            $social_media->delete();
            return 1;
        } else {
            return 0;
        }
    }

    public function status(Request $request)
    {
        $social_mediasdata = SocialMedia::where('id', $request->id)->update(['is_available' => $request->status]);
        if ($social_mediasdata) {
            return 1;
        } else {
            return 0;
        }
    }
}
