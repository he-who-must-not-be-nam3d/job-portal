@extends('layouts/layout')

@section('content')
@include('partials._search')
<a href="/" class="inline-block text-black dark:text-white ml-4 mb-4">
    <i class="fa-solid fa-arrow-left"></i>Back
</a>
<div class="mx-4">
    <div class="bg-gray-50  dark:bg-transparent border border-gray-200 p-10 rounded">
        <div class="flex flex-col text-black dark:text-white items-center justify-center text-center">
            <img src="{{$application->listings->logo ? asset('storage/' . $application->listings->logo) : asset('images/iko_kazi_logo.png')}}" alt="ImageListing" class="hidden w-48 mr-6 md:block">
            <h3 class="text-2xl mb-2">{{$application->listings->title}}</h3>
            <div class="text-xl font-bold mb-4">{{$application->listings->company}}</div>
            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i>{{$application->listings->location}}
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold-mb-4">Job Description</h3>
                <div class="text-lg space-y-6">
                    <p>
                        {{$application->listings->description}}
                    </p>
                </div>
                <h3 class="text-3xl font-bold mb-4">Applicant Details</h3>
                <div class="text-lg">
                    <p>
                        Name: {{$application->name}}
                    </p>
                    <p>
                        Email: {{$application->email}}
                    </p>
                    <form action="/applications/{{$application->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-black dark:text-white bg-red-600 w-full block bg-none border border-black-500 mt-6 py-2 rounded-xl hover:opacity-80">Delete Application</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection