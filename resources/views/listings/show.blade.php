@extends('layouts/layout')

@section('content')
@include('partials._search')
<a href="/" class="inline-block text-black dark:text-white ml-4 mb-4">
    <i class="fa-solid fa-arrow-left"></i>Back
</a>
<div class="mx-4">
    <div class="bg-gray-50  dark:bg-transparent border border-gray-200 p-10 rounded">
        <div class="flex flex-col text-black dark:text-white items-center justify-center text-center">
            <img src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('images/iko_kazi_logo.png')}}" alt="ImageListing" class="hidden w-48 mr-6 md:block">
            <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
            <x-listing-tags :tagsCsv="$listing->tags"/>
            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i>{{$listing->location}}
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold-mb-4">Job Description</h3>
                <div class="text-lg space-y-6">
                    <p>
                        {{$listing->description}}
                    </p>
                    <a href="mailto:{{$listing->email}}" class="block bg-none border border-black-500 text-black dark:text-white mt-6 py-2 rounded-xl hover:opacity-80">
                        <i class="fa-solid fa-envelope"></i>Contact Employer
                    </a>
                    <a href="{{$listing->website}}" target="_blank" class="block bg-black dark:bg-gray-200 dark:text-black border border-black-500 text-white py-2 rounded-xl hover:opacity-80">
                        <i class="fa-solid fa-globe"></i>Visit Website
                    </a>
                    @if(auth()->user()->id != $listing->user_id)
                    <a href="/apply/{{$listing->id}}" class="block bg-none border border-black-500 text-black dark:text-white mt-6 py-2 rounded-xl hover:opacity-80">
                        <i class="fa-solid fa-envelope"></i>Apply Now
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection