<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;


class kirimPesan implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    private $nohape;
    private $pesan;

    public function __construct($nohape, $pesan)
    {
        $this->nohape = $nohape;
        $this->pesan = $pesan;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Http::withHeaders([
            'Authorization' => config('app.token_wa'),
        ])->withoutVerifying()->post(config('app.wa_url') . "/send-message", [
                    'phone' => konversi_nomor($this->nohape),
                    'message' => $this->pesan,
                ]);
    }
}
