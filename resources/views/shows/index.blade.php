<x-app-layout>

<div class="max-w-5xl mx-auto py-8">

<h1 class="text-3xl font-bold mb-6">
Upcoming Shows
</h1>

@foreach($shows as $show)

<div class="border rounded p-4 mb-4">

<h2 class="text-xl font-bold">
    <a href="/shows/{{$show->slug}}">
        {{$show->title}}
    </a>
</h2>

<p>
{{$show->venue?->name}}
</p>

</div>

@endforeach

</div>

</x-app-layout>