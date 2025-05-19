<?php

namespace App\Http\Controllers;



use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id === 1) {
            $links = Link::with('user')->latest()->get();
        } else {
            // $links = Auth::user()->links()->latest()->get();
        }

        return view('links.index', compact('links'));
    }

    public function create()
    {
        return view('links.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'url_title' => 'required|string',
            'original_url' => 'required|url',
            'custom_slug' => 'nullable|unique:links,slug'
        ]);

        $slug = $request->custom_slug;
        if (empty($slug)) {
            do {
                $slug = Str::random(4);
            } while (Link::where('slug', operator: $slug)->exists());
        }


        // dd($request->all());
        Link::create([
            'url_title' => $request->url_title,
            'original_url' => $request->original_url,
            'slug' => $slug,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('links.index')
            ->with('success', 'Link created successfully');
    }

    public function edit(Link $link)
    {
        if (!Auth::user()->role_id === 1 && $link->user_id !== Auth::id()) {
            abort(403);
        }

        return view('links.edit', compact('link'));
    }

    public function update(Request $request, Link $link)
    {
        if (!Auth::user()->role_id === 1 && $link->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'original_url' => 'required|url',
            'custom_slug' => 'nullable|alpha_dash|unique:links,slug,' . $link->id
        ]);

        $slug = $request->custom_slug;
        if (!empty($slug)) {
            $link->slug = $slug;
        }

        $link->original_url = $request->original_url;
        $link->save();

        return redirect()->route('links.index')
            ->with('success', 'Link updated successfully');
    }

    public function destroy(Link $link)
    {
        if (!Auth::user()->role_id === 1 && $link->user_id !== Auth::id()) {
            abort(403);
        }

        $link->delete();

        return redirect()->route('links.index')
            ->with('success', 'Link deleted successfully');
    }

    // Redirect function for short links
    public function redirect($slug)
    {
        $link = Link::where('slug', $slug)->firstOrFail();
        $link->increment('clicks');

        return redirect($link->original_url);
    }
}