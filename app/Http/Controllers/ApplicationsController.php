<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Applications;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    //Show application form
    public function apply(Listing $listing)
    {
        return view('applications.index', ['listing' => $listing]);
    }

    //Insert Application Data to the database
    public function store(Request $request, Listing $listing)
    {
        $incomingData = $request->validate([
            'name' => ['required', 'max:40', 'min:10'],
            'email' => ['required', 'email'],
        ]);

        if ($request->hasFile('cv')) {
            $incomingData['cv'] = $request->file('cv')->store('documents/cv', 'public');
        }
        if ($request->hasFile('certificate')) {
            $incomingData['certificate'] = $request->file('certificate')->store('documents/certificates', 'public');
        }

        $incomingData['user_id'] = auth()->id();
        $incomingData['listing_id'] = $listing->id;

        Applications::create($incomingData);

        return redirect('/')->with('message', 'Application Submitted Succesfully');
    }
    //View All applications
    public function view()
    {
        return view('applications/applications', [
            'applications' => applications::all()
        ]);
    }

    //View Single Application details
    public function show(Applications $application)
    {
        return view('applications.show', [
            'application' => $application
        ]);
    }
    //Delete Application
    public function destroy(Applications $application)
    {
        if ($application->user_id != auth()->id()) {
            abort(403, 'Forbidden');
        }
        $application->delete();
        return view('/applications')->with('deleteMessage', 'Application deleted succesfully');
    }
    //Show All Applications made for job posting
    public function viewApplications(Listing $listing)
    {
        $applications = $listing->applications()->get();

        return view('applications.all-applications', [
            'applications' => $applications,
            'listing' => $listing,
        ]);
    }
}
