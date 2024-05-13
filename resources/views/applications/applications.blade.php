@extends('layouts/layout')


@section('content')

@include('partials._search')

<x-card class="p-10 h-lvh shadow-xl mx-2">
    <header>
        <h1 class="text-3xl text-center font-bold my-6 uppercase">
            My Applications
        </h1>
    </header>
    <table class="w-full table-auto rounded-sm">
        <tbody>
            @unless($applications->isEmpty())
            @foreach($applications as $application)
            <tr class="border-black">
                <td class="px-4 py-8 border-t border-b border-black text-lg">
                    <a href="/listing">{{$application->listings->title}}</a>
                </td>
                <td class="px-2 py-8 border-t border-b border-black text-lg">
                    <a class="text-blue-900 px-6 py-2 rounded-xl" 
                    href="/applications/{{$application->id}}"><i class="fa-solid fa-trash-can"></i>View</a>
                </td>
                <td class="px-2 py-8 border-t border-b border-black text-lg">
                    <form action="/listings/{{$application->id}}" method="POST">
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
                    <p class="text-center">No Applications Found</p>
                </td>
            </tr>
            <tr>
                <td class="px-4 py-8 border-t border-b border-black text-lg">
                    <p class="text-center"><a href="/" class=" dark:bg-teal-600 py-2 px-5 text-teal-900 dark:text-white hover:bg-pink-100 dark:hover:text-white dark:hover:bg-green-700 bg-white text-white-py-2">Apply Now</a></p>
                </td>
            </tr>             
            @endunless
        </tbody>
    </table>
</x-card>

@endsection