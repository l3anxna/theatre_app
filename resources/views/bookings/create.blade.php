<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#B7791F]">Complete your booking</p>
            <h1 class="mt-1 text-3xl font-bold text-[#2D2926]">Book tickets</h1>
        </div>
    </x-slot>

    <div class="mx-auto grid max-w-5xl gap-6 lg:grid-cols-[1fr_360px]">
        <form method="POST" action="{{ route('bookings.store', $show) }}" class="rounded-2xl border border-[#D8CEC1] bg-[#FFFCF7] p-6 sm:p-8">
            @csrf

            <section aria-labelledby="your-details-heading">
                <h2 id="your-details-heading" class="text-xl font-bold text-[#2D2926]">Your details</h2>
                <div class="mt-5 grid gap-5 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="customer_name" class="font-medium text-[#2D2926]">Full name</label>
                        <input id="customer_name" name="customer_name" type="text" value="{{ old('customer_name', auth()->user()?->name) }}" autocomplete="name" required class="mt-2 min-h-11 w-full rounded-xl border-[#CFC4B6] bg-[#F4F0EA] px-3 text-[#2D2926] focus:border-[#B7791F] focus:ring-[#B7791F]">
                        @error('customer_name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="customer_email" class="font-medium text-[#2D2926]">Email address</label>
                        <input id="customer_email" name="customer_email" type="email" value="{{ old('customer_email', auth()->user()?->email) }}" autocomplete="email" required class="mt-2 min-h-11 w-full rounded-xl border-[#CFC4B6] bg-[#F4F0EA] px-3 text-[#2D2926] focus:border-[#B7791F] focus:ring-[#B7791F]">
                        @error('customer_email') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="tickets" class="font-medium text-[#2D2926]">Number of tickets</label>
                        <select id="tickets" name="tickets" required class="mt-2 min-h-11 w-full rounded-xl border-[#CFC4B6] bg-[#F4F0EA] px-3 text-[#2D2926] focus:border-[#B7791F] focus:ring-[#B7791F]">
                            @for ($quantity = 1; $quantity <= 10; $quantity++) <option value="{{ $quantity }}" @selected(old('tickets', 1) == $quantity)>{{ $quantity }}</option> @endfor
                        </select>
                        @error('tickets') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="seat_number" class="font-medium text-[#2D2926]">Preferred seat number</label>
                        <input id="seat_number" name="seat_number" type="number" min="1" value="{{ old('seat_number') }}" required class="mt-2 min-h-11 w-full rounded-xl border-[#CFC4B6] bg-[#F4F0EA] px-3 text-[#2D2926] focus:border-[#B7791F] focus:ring-[#B7791F]">
                        @error('seat_number') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>
            </section>

            <section class="mt-8 border-t border-[#D8CEC1] pt-7" aria-labelledby="payment-heading">
                <div class="flex items-center justify-between gap-4"><h2 id="payment-heading" class="text-xl font-bold text-[#2D2926]">Payment</h2><span class="text-sm font-medium text-[#554E47]">🔒 Secure payment</span></div>
                <p class="mt-2 text-sm leading-6 text-[#746D64]">Your card details are used only to authorize this purchase and are not saved with your booking.</p>
                <input type="hidden" name="payment_method" value="card">
                <div class="mt-5 grid gap-5 sm:grid-cols-2">
                    <div class="sm:col-span-2"><label for="card_number" class="font-medium text-[#2D2926]">Card number</label><input id="card_number" type="text" inputmode="numeric" autocomplete="cc-number" placeholder="4242 4242 4242 4242" required class="mt-2 min-h-11 w-full rounded-xl border-[#CFC4B6] bg-[#F4F0EA] px-3 text-[#2D2926] focus:border-[#B7791F] focus:ring-[#B7791F]"></div>
                    <div><label for="card_expiry" class="font-medium text-[#2D2926]">Expiry date</label><input id="card_expiry" type="text" inputmode="numeric" autocomplete="cc-exp" placeholder="MM / YY" required class="mt-2 min-h-11 w-full rounded-xl border-[#CFC4B6] bg-[#F4F0EA] px-3 text-[#2D2926] focus:border-[#B7791F] focus:ring-[#B7791F]"></div>
                    <div><label for="card_cvc" class="font-medium text-[#2D2926]">CVC</label><input id="card_cvc" type="text" inputmode="numeric" autocomplete="cc-csc" placeholder="123" required class="mt-2 min-h-11 w-full rounded-xl border-[#CFC4B6] bg-[#F4F0EA] px-3 text-[#2D2926] focus:border-[#B7791F] focus:ring-[#B7791F]"></div>
                </div>
            </section>

            <button type="submit" class="mt-8 inline-flex min-h-11 w-full items-center justify-center rounded-xl bg-[#B7791F] px-5 font-semibold text-black transition hover:bg-[#D49A3A]">Pay &amp; confirm booking</button>
        </form>

        <aside class="h-fit rounded-2xl border border-[#D8CEC1] bg-[#FFFCF7] p-6" aria-label="Booking summary">
            <p class="text-sm font-semibold uppercase tracking-[0.16em] text-[#B7791F]">Booking summary</p>
            <h2 class="mt-3 text-2xl font-bold text-[#2D2926]">{{ $show->title }}</h2>
            <dl class="mt-5 space-y-3 border-y border-[#D8CEC1] py-5 text-sm"><div class="flex justify-between gap-4"><dt class="text-[#746D64]">Venue</dt><dd class="text-right font-medium text-[#2D2926]">{{ $show->venue?->name ?? 'To be announced' }}</dd></div><div class="flex justify-between gap-4"><dt class="text-[#746D64]">Date</dt><dd class="text-right font-medium text-[#2D2926]">{{ $show->start_date?->format('d M Y') ?? 'To be announced' }}</dd></div></dl>
            <p class="mt-5 text-sm leading-6 text-[#746D64]">You will receive confirmation at the email address above once payment has been processed.</p>
        </aside>
    </div>
</x-app-layout>
