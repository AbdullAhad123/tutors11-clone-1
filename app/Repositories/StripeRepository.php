<?php
/**
 * File name: StripeRepository.php
 * Last modified: 01/04/22, 3:50 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2022
 */

namespace App\Repositories;

use App\Models\Subscription;
use App\Models\Payment;
use App\Settings\PaymentSettings;
use App\Settings\StripeSettings;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StripeRepository
{
    /**
     * @var StripeSettings
     */
    private StripeSettings $settings;

    public function __construct(StripeSettings $settings)
    {
        $this->settings = $settings;
        Stripe::setApiKey($settings->secret_key);
        \Stripe\Stripe::setApiKey($settings->secret_key);
    }

    /**
     * @param $paymentId
     * @param $amount
     * @return Session
     * @throws ApiErrorException
     */
    public function createSession($paymentId, $amount, $planId, $userId, $userEmail, $orderSummary)
    {   
        $lineItems = [];
        $totalPrice = 0;
        if($userEmail){
            $session = \Stripe\Checkout\Session::create([
                'line_items' => [[
                    'price_data' => [
                        'currency' => app(PaymentSettings::class)->default_currency,
                        'product_data' => [
                            'name' => $paymentId,
                        ],
                        'unit_amount' => $amount,
                    ],
                    'quantity' => 1,
                ]],
                'customer_email' => $userEmail,
                'payment_intent_data' => [
                    'metadata' => [
                        'payment_id' => $paymentId,
                        'plan_id' => $planId,
                        'user_id' => $userId,
                        'user_email' => $userEmail,
                        'currency_symbol' => app(PaymentSettings::class)->currency_symbol,
                        'currency' => app(PaymentSettings::class)->default_currency,
                        'order_summary' => json_encode($orderSummary)
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('payment_success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
                'cancel_url' => route('payment_failed', [], true),
            ]);
        } else {
            $session = \Stripe\Checkout\Session::create([
                'line_items' => [[
                    'price_data' => [
                        'currency' => app(PaymentSettings::class)->default_currency,
                        'product_data' => [
                            'name' => $paymentId,
                        ],
                        'unit_amount' => $amount,
                    ],
                    'quantity' => 1,
                ]],
                'payment_intent_data' => [
                    'metadata' => [
                        'payment_id' => $paymentId,
                        'plan_id' => $planId,
                        'user_id' => $userId,
                        'user_email' => $userEmail,
                        'currency_symbol' => app(PaymentSettings::class)->currency_symbol,
                        'currency' => app(PaymentSettings::class)->default_currency,
                        'order_summary' => json_encode($orderSummary)
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('payment_success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
                'cancel_url' => route('payment_failed', [], true),
            ]);
        }
        return $session->url;
    }
}
