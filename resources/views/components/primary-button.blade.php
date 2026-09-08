<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center rounded-md border border-transparent bg-stage-primary px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition duration-150 ease-in-out hover:bg-[#8A3B32] focus:outline-none focus:ring-2 focus:ring-stage-accent focus:ring-offset-2 focus:ring-offset-stage-page disabled:opacity-50']) }}>
    {{ $slot }}
</button>
