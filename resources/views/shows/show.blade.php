<x-app-layout>

<div class="max-w-4xl mx-auto py-8">

<h1 class="text-4xl font-bold">
{{$show->title}}
</h1>

<p class="mt-4">
{{$show->description}}
</p>

<hr class="my-6">

<h2 class="font-bold">
Venue
</h2>

<p>
{{$show->venue?->name}}
</p>

<hr class="my-6">

<h2 class="font-bold">
Cast
</h2>

<ul>

@foreach($show->actors as $actor)

<li>
{{$actor->name}}
</li>

@endforeach

</ul>

</div>

</x-app-layout>