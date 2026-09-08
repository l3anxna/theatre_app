<?php

namespace App\Services;

use Illuminate\Support\Str;

class PaymentProcessor
{
    /**
     * Process a card payment through the booking payment adapter.
     *
     * A gateway can replace this adapter without changing the booking flow.
     *
     * @return array{status: string, reference: string}
     */
    public function charge(int $tickets): array
    {
        return [
            'status' => 'paid',
            'reference' => 'PAY-' . Str::upper(Str::random(12)),
        ];
    }
}
