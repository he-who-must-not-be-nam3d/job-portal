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
            <div class="border border-gray-200 w-full mb-6"></div>
            <x-card class="max-w-lg hover:shadow-sm mx-auto">
            <form action="/application/{{$listing->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-6 ">
                <label for="name" class="inline-block text-lg mb-2">Name</label>
                <input type="text" name="name" class="border border-gray-200 rounded dark:text-black p-2 w-full" value="{{auth()->user()->name}}">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6 ">
                <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                <input type="text" name="email" class="border border-gray-200 rounded dark:text-black p-2 w-full" value="{{auth()->user()->email}}">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6 ">
                <label for="cv" class="inline-block text-lg mb-2">Curriculum Vitae</label>
                <input type="file" name="cv" class="border border-gray-200 rounded dark:text-black p-2 w-full">
                @error('cv')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6 ">
                <label for="certificate" class="inline-block text-lg mb-2">Academic Certificate</label>
                <input type="file" name="certificate" class="border border-gray-200 rounded dark:text-black p-2 w-full">
                @error('certificate')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6 ">
                <button class="dark:bg-teal-600 py-2 px-5 text-teal-900 dark:text-black hover:bg-pink-100 dark:hover:text-white dark:hover:bg-green-700 top-1/3 right-10 bg-white border border-slate-200 shadow-lg">Submit Application</button>
            </div>
            </form>
        </x-card>
        </div>
    </div>
</div>
@endsection