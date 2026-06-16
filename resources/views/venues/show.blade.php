<x-app-layout>

<h1 class="text-4xl font-bold">
{{$venue->name}}
</h1>

<p>
{{$venue->address}}
</p>

<p>
{{$venue->description}}
</p>

<h2 class="mt-6 font-bold">
Shows
</h2>

@foreach($venue->shows as $show)

<div>
{{$show->title}}
</div>

@endforeach

</x-app-layout>