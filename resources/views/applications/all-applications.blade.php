@extends('layouts/layout')


@section('content')

@include('partials._search')

<x-card class="p-10 h-lvh shadow-xl mx-2">
    <header>
        <h1 class="text-3xl text-center font-bold my-6 uppercase">
            All Applications For {{$listing->title}}
        </h1>
    </header>
    <table class="w-full table-auto rounded-sm">
        <tbody>
            @unless($applications->isEmpty())
            @foreach($applications as $application)
            <tr class="border-black">
                <td class="px-4 py-8 border-t border-b border-black text-lg">
                    <p>{{$application->name}}</p>
                </td>
                <td class="px-2 py-8 border-t border-b border-black text-lg">
                    <a class="text-blue-900 px-6 py-2 rounded-xl" 
                    href="/applications/{{$application->id}}"><i class="fa-solid fa-trash-can"></i>View</a>
                </td>
            </tr>
            @endforeach
            @else
            <tr class="border-black">
                <td class="px-4 py-8 border-t border-b border-black text-lg">
                    <p class="text-center">No Applications Found</p>
                </td>
            </tr>           
            @endunless
        </tbody>
    </table>
</x-card>

@endsection