<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with Paket
     */
    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }

    /**
     * Check if the order has been paid
     *
     * @return bool
     */
    public function isPaid()
    {
        return $this->status_pembayaran === 'paid';
    }

    /**
     * Update the payment status based on notification from Midtrans
     *
     * @param  string $status
     * @return void
     */
    public function updatePaymentStatus($status)
    {
        switch ($status) {
            case 'capture':
            case 'settlement':
                $this->status_pembayaran = 'paid';
                $this->transaction_status = 'settlement';
                break;

            case 'pending':
                $this->status_pembayaran = 'pending';
                $this->transaction_status = 'pending';
                break;

            case 'cancel':
            case 'deny':
            case 'expire':
                $this->status_pembayaran = 'cancelled';
                $this->transaction_status = 'cancel';
                break;
        }
        $this->save();
    }

    /**
     * Set transaction details for Midtrans
     *
     * @param string $transaction_id
     * @param string $payment_type
     * @param int $gross_amount
     * @return void
     */
    public function setTransactionDetails($transaction_id, $payment_type, $gross_amount)
    {
        $this->transaction_id = $transaction_id;
        $this->payment_type = $payment_type;
        $this->gross_amount = $gross_amount;
        $this->save();
    }
}
