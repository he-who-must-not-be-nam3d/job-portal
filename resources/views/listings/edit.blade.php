@extends('layouts/layout')
@section('content')
<x-card class="max-w-lg mx-auto mt-24">

<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">Edit A Job</h2>
    <p class="mb-4">Change particulars of job {{$listing->title}}</p>
</header>

<form action="/listings/{{$listing->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-6 ">
        <label for="company" class="inline-block text-lg mb-2">Name of Company    </label>
        <input type="text" name="company" class="border border-gray-200 rounded dark:text-black p-2 w-full" value="{{$listing->company}}">
        @error('company')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6 ">
        <label for="title" class="inline-block text-lg mb-2">Job Title</label>
        <input type="text" name="title" class="border border-gray-200 rounded dark:text-black p-2 w-full" value="{{$listing->title}}">
        @error('title')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6 ">
        <label for="location" class="inline-block text-lg mb-2">Job Location</label>
        <input type="text" name="location" class="border border-gray-200 rounded dark:text-black p-2 w-full" value="{{$listing->location}}">
        @error('location')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6 ">
        <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
        <input type="text" name="email" class="border border-gray-200 rounded dark:text-black p-2 w-full" value="{{$listing->email}}">
        @error('email')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6 ">
        <label for="website" class="inline-block text-lg mb-2">Company Website/Application URL</label>
        <input type="text" name="website" class="border border-gray-200 rounded dark:text-black p-2 w-full" value="{{$listing->website}}">
        @error('website')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6 ">
        <label for="tags" class="inline-block text-lg mb-2">Tags (Separate by Comma)</label>
        <input type="text" placeholder="laravel, API, Fullstack" name="tags" class="border border-gray-200 rounded dark:text-black p-2 w-full" value="{{$listing->tags}}">
        @error('tags')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6 ">
        <label for="logo" class="inline-block text-lg mb-2">Company Logo</label>
        <input type="file" name="logo" class="border border-gray-200 rounded dark:text-black p-2 w-full">

        <img src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('images/iko_kazi_logo.png')}}" alt="ImageListing" class="hidden w-48 mr-6 md:block">

        @error('logo')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6 ">
        <label for="description" class="inline-block text-lg mb-2">Job Description</label>
        <textarea type="text" name="description" rows="10" class="border border-gray-200 rounded dark:text-black p-2 w-full" placeholder="Include Tasks, Job Requirements, Salary, Timeframe e.t.c" value="{{$listing->description}}"></textarea>
        @error('description')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6 ">
        <button class="dark:bg-teal-600 py-2 px-5 text-teal-900 dark:text-black hover:bg-pink-100 dark:hover:text-white dark:hover:bg-green-700 top-1/3 right-10 bg-white border border-slate-200 shadow-lg">Update Job</button>
    </div>
</form>
</x-card>
@endsection