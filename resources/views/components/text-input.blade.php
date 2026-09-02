@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'rounded-md border-[#CFC4B6] bg-stage-surface text-stage-text shadow-sm placeholder:text-stage-muted focus:border-stage-accent focus:ring-stage-accent disabled:bg-stage-elevated']) }}>
