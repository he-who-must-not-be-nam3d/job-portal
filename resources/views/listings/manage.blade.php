@extends('layouts/layout')


@section('content')

@include('partials._search')

<x-card class="p-10 h-lvh shadow-xl mx-2">
    <header>
        <h1 class="text-3xl text-center font-bold my-6 uppercase">
            Manage Jobs
        </h1>
    </header>
    <table class="w-full table-auto rounded-sm">
        <tbody>
            @unless($listings->isEmpty())
            @foreach($listings as $listing)
            <tr class="border-black">
                <td class="px-4 py-8 border-t border-b border-black text-lg">
                    <a href="llisting">{{$listing->title}}</a>
                </td>
                <td class="px-2 py-8 border-t border-b border-black text-lg">
                    <a class="text-blue-900 px-6 py-2 rounded-xl" 
                    href="/listings/{{$listing->id}}/applications"><i class="fa-solid fa-trash-can"></i>Applications</a>
                </td>
                <td class="px-2 py-8 border-t border-b border-black text-lg">
                    <a class="text-blue-900 px-6 py-2 rounded-xl" 
                    href="/listings/{{$listing->id}}/edit"><i class="fa-solid fa-trash-can"></i>Edit</a>
                </td>
                <td class="px-2 py-8 border-t border-b border-black text-lg">
                    <form action="/listings/{{$listing->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500">Delete</button>
                        </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr class="border-black">
                <td class="px-4 py-8 border-t border-b border-black text-lg">
                    <p class="text-center">No Job Postings Found</p>
                </td>
            </tr>
            <tr>
                <td class="px-4 py-8 border-t border-b border-black text-lg">
                    <p class="text-center"><a href="/listings/create" class=" dark:bg-teal-600 py-2 px-5 text-teal-900 dark:text-white hover:bg-pink-100 dark:hover:text-white dark:hover:bg-green-700 bg-white text-white-py-2">Post Job</a></p>
                </td>
            </tr>
            @endunless
        </tbody>
    </table>
</x-card>

@endsection