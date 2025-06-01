<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class helper
{
    public static function image_path($image)
    {
        $path = url(env('ASSETPATHURL') . 'admin/images/placeholder.jpg');
        if (Str::contains($image, 'blog')) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/blog/' . $image)) {
                $path = url(env('ASSETPATHURL') . 'admin/images/blog/' . $image);
            }
        }
        if (Str::contains($image, 'pioneers')) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/pioneers/' . $image)) {
                $path = url(env('ASSETPATHURL') . 'admin/images/pioneers/' . $image);
            }
        }
        if (Str::contains($image, 'event')) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/event/' . $image)) {
                $path = url(env('ASSETPATHURL') . 'admin/images/event/' . $image);
            }
        }
        if (Str::contains($image, 'about_us') || Str::contains($image, 'our_project') || Str::contains($image, 'career') || Str::contains($image, 'media') || Str::contains($image, 'blog') || Str::contains($image, 'contact_us')) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/other/' . $image)) {
                $path = url(env('ASSETPATHURL') . 'admin/images/other/' . $image);
            }
        }
        if (Str::contains($image, 'project')) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/project/' . $image)) {
                $path = url(env('ASSETPATHURL') . 'admin/images/project/' . $image);
            }
        }
        if (Str::contains($image, 'about')) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/about/' . $image)) {
                $path = url(env('ASSETPATHURL') . 'admin/images/about/' . $image);
            }
        }
        if (Str::contains($image, 'who_we_are')) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/who_we_are/' . $image)) {
                $path = url(env('ASSETPATHURL') . 'admin/images/who_we_are/' . $image);
            }
        }
        if (Str::contains($image, 'vision')) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/vision/' . $image)) {
                $path = url(env('ASSETPATHURL') . 'admin/images/vision/' . $image);
            }
        }
        if (Str::contains($image, 'mission')) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/mission/' . $image)) {
                $path = url(env('ASSETPATHURL') . 'admin/images/mission/' . $image);
            }
        }
        if (Str::contains($image, 'workplace')) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/workplace/' . $image)) {
                $path = url(env('ASSETPATHURL') . 'admin/images/workplace/' . $image);
            }
        }
        if (Str::contains($image, 'social_media')) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/social_media/' . $image)) {
                $path = url(env('ASSETPATHURL') . 'admin/images/social_media/' . $image);
            }
        }
        if (Str::contains($image, 'testimonials')) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/testimonials/' . $image)) {
                $path = url(env('ASSETPATHURL') . 'admin/images/testimonials/' . $image);
            }
        }
        if (Str::contains($image, 'core_values')) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/core_values/' . $image)) {
                $path = url(env('ASSETPATHURL') . 'admin/images/core_values/' . $image);
            }
        }
        if (Str::contains($image, 'chairman')) {
            if (file_exists(env('ASSETPATHURL') . 'admin/images/chairman/' . $image)) {
                $path = url(env('ASSETPATHURL') . 'admin/images/chairman/' . $image);
            }
        }
        return $path;
    }
}
