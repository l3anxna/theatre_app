<x-app-layout>

<h1 class="text-4xl font-bold">
{{$actor->name}}
</h1>

<p>
{{$actor->biography}}
</p>

<h2 class="mt-6 font-bold">
Shows
</h2>

@foreach($actor->shows as $show)

<div>

{{$show->title}}

</div>

@endforeach

</x-app-layout>