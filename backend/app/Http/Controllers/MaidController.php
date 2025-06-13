<?php

namespace App\Http\Controllers;

use App\Models\Maid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaidController extends Controller
{
    public function index()
    {
        return Maid::all();
    }

    public function show($id)
    {
        return Maid::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'nationality' => 'required|string',
            'religion' => 'nullable|string',
            'age' => 'nullable|integer',
            'marital_status' => 'nullable|string',
            'experience' => 'nullable|string',
            'place_of_experience' => 'nullable|string',
            'language' => 'nullable|string',
            'skills' => 'nullable|string',
            'package' => 'nullable|string',
            'living_option' => 'nullable|string',
            'domestic_worker' => 'nullable|string',
            'office_fee' => 'nullable|string',
            'monthly_payment' => 'nullable|string',
            'photo' => 'nullable|image',
            'video' => 'nullable|file',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('maids/photos', 'public');
        }
        if ($request->hasFile('video')) {
            $validated['video'] = $request->file('video')->store('maids/videos', 'public');
        }

        $maid = Maid::create($validated);
        return response()->json($maid, 201);
    }
} 