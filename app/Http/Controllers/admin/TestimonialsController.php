<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    public function index()
    {
        $testimonialsdata = Testimonial::orderByDesc('id')->get();
        return view('admin.testimonials.index', compact('testimonialsdata'));
    }

    public function add()
    {
        return view('admin.testimonials.add');
    }

    public function store(Request $request)
    {
        foreach ($request->image as $img) {
            $image = 'testimonials-' . uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move(env(key: 'ASSETPATHURL') . 'admin/images/testimonials', $image);
            $testimonials = new Testimonial();
            $testimonials->name = $request->name;
            $testimonials->designation = $request->designation;
            $testimonials->description = $request->description;
            $testimonials->image = $image;
            $testimonials->save();
        }
        return redirect(route('admin.testimonials.index'))->with('success', 'Testimonial Added Successfully!');
    }

    public function edit(Request $request)
    {
        $testimonials = Testimonial::where('id', $request->id)->first();
        return view('admin.testimonials.edit', compact('testimonials'));
    }

    public function update(Request $request)
    {
        $testimonials = Testimonial::where('id', $request->id)->first();
        if ($request->image != null) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/testimonials/' . $testimonials->image)) {
                unlink(env('ASSETPATHURL') . 'admin/images/testimonials/' . $testimonials->image);
            }
            $filename = 'testimonials-' . uniqid() . '.' . $request->image->Extension();
            $request->image->move(env('ASSETPATHURL') . 'admin/images/testimonials', $filename);
            $testimonials->image = $filename;
        }
        $testimonials->name = $request->name;
        $testimonials->designation = $request->designation;
        $testimonials->description = $request->description;
        $testimonials->save();
        return redirect(route('admin.testimonials.index'))->with('success', 'Testimonial Updated Successfully!');
    }

    public function delete(Request $request)
    {
        $testimonials = Testimonial::where('id', $request->id)->first();
        if ($testimonials) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/testimonials/' . $testimonials->image)) {
                unlink(env('ASSETPATHURL') . 'admin/images/testimonials/' . $testimonials->image);
            }
            $testimonials->delete();
            return 1;
        } else {
            return 0;
        }
    }

    public function status(Request $request)
    {
        $testimonials = Testimonial::where('id', $request->id)->update(['is_available' => $request->status]);
        if ($testimonials) {
            return 1;
        } else {
            return 0;
        }
    }
}
