@props(['tagsCsv'])

@php
 $tags = explode(', ', $tagsCsv);
@endphp


<ul class="flex">
    @foreach ($tags as $tag)
    <li class="bg-gray-300 text-white dark:text-black rounded-xl py-1 px-3 mr-2">
        <a href="/?tag={{$tag}}">{{$tag}}</a>
    </li>
    @endforeach
</ul>