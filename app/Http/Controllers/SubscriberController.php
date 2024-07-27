<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Subscriber::latest()->get();
        return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subscriber = Subscriber::with("websites")->find($id);
        return response()->json($subscriber, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        $request->validate([
            "email" => "required|email",
            "website_id" => "required|integer",
        ]);
        $subscriber = Subscriber::firstOrCreate([
            "email" => $request->input("email"),
        ]);
        $website = Website::find($request->input("website_id"));
        $subscriber->websites()->attach($website->getAttribute("id"));
        $subscriber->save();

        return response()->json(["updated" => true], 204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
