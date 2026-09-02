<x-app-layout>
    <x-slot name="header">
        <div><p class="text-xs font-bold uppercase tracking-[0.16em] text-stage-accent">Stagebook control room</p><h1 class="mt-1 text-2xl font-bold text-stage-text">Administration</h1></div>
    </x-slot>

    <div class="mx-auto max-w-6xl">
        <section class="rounded-3xl border border-stage-accent/25 bg-gradient-to-r from-stage-primary via-[#7E3D55] to-stage-secondary p-6 sm:p-8">
            <p class="text-sm font-semibold text-stage-accent">Content management</p>
            <h2 class="mt-2 text-3xl font-bold text-stage-text">Keep the theatre database accurate and discoverable.</h2>
            <p class="mt-3 max-w-2xl text-stage-text/90">Create productions, maintain venue information, and make sure performer credits are ready for the community.</p>
        </section>

        <section class="mt-8 grid gap-5 md:grid-cols-3">
            <a href="{{ route('admin.shows.index') }}" class="group rounded-2xl border border-[#D8CEC1] bg-stage-surface p-6 transition hover:-translate-y-0.5 hover:border-stage-accent/70 focus:outline-none focus:ring-2 focus:ring-stage-accent"><p class="text-sm font-semibold text-stage-accent">Productions</p><h3 class="mt-2 text-2xl font-bold text-stage-text">Manage shows</h3><p class="mt-2 text-sm leading-6 text-stage-body">Add production details, run dates, venues, and casts.</p><span class="mt-5 inline-block font-semibold text-stage-text">Open shows →</span></a>
            <a href="{{ route('admin.actors.index') }}" class="group rounded-2xl border border-[#D8CEC1] bg-stage-surface p-6 transition hover:-translate-y-0.5 hover:border-stage-accent/70 focus:outline-none focus:ring-2 focus:ring-stage-accent"><p class="text-sm font-semibold text-stage-accent">People</p><h3 class="mt-2 text-2xl font-bold text-stage-text">Manage actors</h3><p class="mt-2 text-sm leading-6 text-stage-body">Keep performer names and biographies up to date.</p><span class="mt-5 inline-block font-semibold text-stage-text">Open people →</span></a>
            <a href="{{ route('admin.venues.index') }}" class="group rounded-2xl border border-[#D8CEC1] bg-stage-surface p-6 transition hover:-translate-y-0.5 hover:border-stage-accent/70 focus:outline-none focus:ring-2 focus:ring-stage-accent"><p class="text-sm font-semibold text-stage-accent">Places</p><h3 class="mt-2 text-2xl font-bold text-stage-text">Manage venues</h3><p class="mt-2 text-sm leading-6 text-stage-body">Maintain practical information for theatre-goers.</p><span class="mt-5 inline-block font-semibold text-stage-text">Open venues →</span></a>
        </section>
    </div>
</x-app-layout>
