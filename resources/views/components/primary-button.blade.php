<button {{ $attributes->merge(['type' => 'submit', 'class' => 'stage-button-primary border border-transparent px-4 py-2 text-xs uppercase tracking-widest']) }}>
    {{ $slot }}
</button>
