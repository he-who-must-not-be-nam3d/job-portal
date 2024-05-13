<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingsController extends Controller
{
    //
    public function index()
    {
        return view('listings.index', [
            'listings' => listing::latest()->filter(request(['tag', 'search']))->simplePaginate(6)
        ]);
    }
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $incomingData = $request->validate([
            'title' => ['required', 'max:40', 'min:10'],
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => ['required'],
            'website' => ['required', 'Url'],
            'email' => ['required', 'email'],
            'tags' => ['required'],
            'description' => ['required'],
        ]);

        if ($request->hasFile('logo')) {
            $incomingData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $incomingData['user_id'] = auth()->id();

        Listing::create($incomingData);

        return redirect('/')->with('message', 'Job posted succesfully');
    }

    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing)
    {
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $incomingData = $request->validate([
            'title' => ['required', 'max:40', 'min:10'],
            'company' => ['required'],
            'location' => ['required'],
            'website' => ['required', 'Url'],
            'email' => ['required', 'email'],
            'tags' => ['required'],
            'description' => ['required'],
        ]);

        if ($request->hasFile('logo')) {
            $incomingData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($incomingData);

        return back()->with('message', 'Job updated succesfully');
    }

    public function destroy(Listing $listing)
    {
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized');
        }
        $listing->delete();
        return back()->with('deleteMessage', 'Job Posting deleted successfully');
    }

    public function manage()
    {
        return view('Listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
    public function applications()
    {
        return view('Listings.applications', ['listings' => auth()->user()->listings()->get()]);
    }
}
