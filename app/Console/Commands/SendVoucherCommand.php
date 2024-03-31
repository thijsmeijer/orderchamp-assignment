<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\Voucher;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class SendVoucherCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-voucher-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends a voucher to a user with a previous purchase';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $orders = Order::where('created_at', '>=', Carbon::now()->subMinutes(15))
            ->where('created_at', '<', Carbon::now()->subMinutes(14))
            ->get();

        $orders->each(function ($order) {
            $voucher = rand(1000000, 6000000);

            Voucher::create([
                'code' => $voucher
            ]);

//             here i would send the voucher to the user by sending a notification or mail
//            $order->user->notify();
        });
    }
}
