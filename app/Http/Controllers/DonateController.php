<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Services\GoHighLevelService;
use Illuminate\Http\Request;
use Stripe\Checkout\Session as CheckoutSession;
use Stripe\Stripe;

class DonateController extends Controller
{
    public function index()
    {
        return view('pages.donate');
    }

    public function store(Request $request)
    {
        $isAnonymous = $request->boolean('is_anonymous');

        $validated = $request->validate([
            'amount'       => ['required', 'numeric', 'min:1'],
            'frequency'    => ['required', 'in:once,monthly'],
            'first_name'   => [$isAnonymous ? 'nullable' : 'required', 'string', 'max:100'],
            'last_name'    => [$isAnonymous ? 'nullable' : 'required', 'string', 'max:100'],
            'email'        => [$isAnonymous ? 'nullable' : 'required', 'email', 'max:200'],
            'is_anonymous' => ['boolean'],
            'message'      => ['nullable', 'string', 'max:1000'],
        ]);

        $donation = Donation::create($validated);

        Stripe::setApiKey(config('services.stripe.secret'));

        $amountCents = (int) round($validated['amount'] * 100);
        $isMonthly   = $validated['frequency'] === 'monthly';

        $priceData = [
            'currency'     => 'usd',
            'unit_amount'  => $amountCents,
            'product_data' => [
                'name' => 'Donation — Innovate Hub Foundation',
            ],
        ];

        if ($isMonthly) {
            $priceData['recurring'] = ['interval' => 'month'];
        }

        $sessionParams = [
            'mode'        => $isMonthly ? 'subscription' : 'payment',
            'line_items'  => [[
                'price_data' => $priceData,
                'quantity'   => 1,
            ]],
            'success_url' => route('donate.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'  => route('donate'),
            'metadata'    => ['donation_id' => $donation->id],
        ];

        if (!$isAnonymous && !empty($validated['email'])) {
            $sessionParams['customer_email'] = $validated['email'];
        }

        $session = CheckoutSession::create($sessionParams);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');

        if (!$sessionId) {
            return redirect()->route('donate');
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        $session    = CheckoutSession::retrieve($sessionId);
        $donationId = $session->metadata->donation_id ?? null;
        $donation   = $donationId ? Donation::find($donationId) : null;

        if ($donation && in_array($session->payment_status, ['paid', 'no_payment_required'])) {
            $donation->update(['status' => 'completed']);

            if (! $donation->is_anonymous && $donation->email) {
                app(GoHighLevelService::class)->upsertContact(
                    data: [
                        'first_name' => $donation->first_name,
                        'last_name'  => $donation->last_name,
                        'email'      => $donation->email,
                        'source'     => 'website-donation-form',
                    ],
                    tags: ['website-donation-form', 'donor', "frequency-{$donation->frequency}"],
                    customFields: [
                        'donation_amount'    => $donation->amount,
                        'donation_frequency' => $donation->frequency,
                        'donation_message'   => $donation->message,
                    ],
                );
            }
        }

        return view('pages.donate-success', compact('donation', 'session'));
    }
}
