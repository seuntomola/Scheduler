<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response as InertiaResponse;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LocationController extends Controller
{
    /**
     * Display a listing of the locations.
     *
     * @return InertiaResponse
     */
    public function index(): InertiaResponse
    {
        // Fetch all locations sorted by latest first.
        $locations = Location::orderBy('id', 'desc')->get();

        // Render the Inertia page at resources/js/Pages/Manage_location/Index.vue
        return Inertia::render('Manage_location/Index', [
            'locations' => $locations
        ]);
    }

    /**
     * Show the form for creating a new location.
     *
     * @return InertiaResponse
     */
    public function create(): InertiaResponse
    {
        // Render the Inertia page at resources/js/Pages/Manage_location/Create.vue
        return Inertia::render('Manage_location/Create');
    }

    /**
     * Store a newly created location in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): InertiaResponse
    {
        
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'capacity'    => 'required|integer|min:1',
            'is_active'   => 'sometimes|boolean',
        ]);


        $location = Location::create($validated);

        // return redirect()->route('Manage_location/Index')
        //     ->with('success', 'Location saved successfully.');
        return Inertia::render('Manage_location/Index');
    }
}
