@extends('layouts/layout')

@section('content')

@include('partials._search')
<x-card class="max-w-lg mx-auto mt-24">

<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">Create A Job</h2>
    <p class="mb-4">Post a job to find a developer for your needs</p>
</header>

<form action="/listings" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-6 ">
        <label for="company" class="inline-block text-lg mb-2">Name of Company    </label>
        <input type="text" name="company" class="border border-gray-200 rounded dark:text-black p-2 w-full" value="{{old('company')}}">
        @error('company')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6 ">
        <label for="title" class="inline-block text-lg mb-2">Job Title</label>
        <input type="text" name="title" class="border border-gray-200 rounded dark:text-black p-2 w-full" value="{{old('title')}}">
        @error('title')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6 ">
        <label for="location" class="inline-block text-lg mb-2">Job Location</label>
        <input type="text" name="location" class="border border-gray-200 rounded dark:text-black p-2 w-full" value="{{old('location')}}">
        @error('location')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6 ">
        <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
        <input type="text" name="email" class="border border-gray-200 rounded dark:text-black p-2 w-full" value="{{old('email')}}">
        @error('email')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6 ">
        <label for="website" class="inline-block text-lg mb-2">Company Website/Application URL</label>
        <input type="text" name="website" class="border border-gray-200 rounded dark:text-black p-2 w-full" value="{{old('website')}}">
        @error('website')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6 ">
        <label for="tags" class="inline-block text-lg mb-2">Tags (Separate by Comma)</label>
        <input type="text" placeholder="laravel, API, Fullstack" name="tags" class="border border-gray-200 rounded dark:text-black p-2 w-full" value="{{old('tags')}}">
        @error('tags')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6 ">
        <label for="logo" class="inline-block text-lg mb-2">Company Logo</label>
        <input type="file" name="logo" class="border border-gray-200 rounded dark:text-black p-2 w-full">
        @error('logo')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6 ">
        <label for="description" class="inline-block text-lg mb-2">Job Description</label>
        <textarea type="text" name="description" rows="10" class="border border-gray-200 rounded dark:text-black p-2 w-full" placeholder="Include Tasks, Job Requirements, Salary, Timeframe e.t.c" value="{{old('description')}}"></textarea>
        @error('description')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    <div class="mb-6 ">
        <button class="dark:bg-teal-600 py-2 px-5 text-teal-900 dark:text-black hover:bg-pink-100 dark:hover:text-white dark:hover:bg-green-700 top-1/3 right-10 bg-white border border-slate-200 shadow-lg">Create Job</button>
    </div>
</form>
</x-card>
@endsection