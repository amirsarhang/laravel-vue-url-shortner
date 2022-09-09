<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;

class UrlPreviewController extends Controller
{
    public function show(string $slug)
    {
        $url = Url::query()->where('slug', $slug)->firstOrFail();
        $url->increment('visit_count');

        return redirect()->away($url->url);
    }
}
