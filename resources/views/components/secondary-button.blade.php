<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center rounded-md border border-[#CFC4B6] bg-stage-surface px-4 py-2 text-xs font-semibold uppercase tracking-widest text-stage-text shadow-sm transition duration-150 ease-in-out hover:bg-stage-elevated focus:outline-none focus:ring-2 focus:ring-stage-accent focus:ring-offset-2 focus:ring-offset-stage-page disabled:opacity-50']) }}>
    {{ $slot }}
</button>
