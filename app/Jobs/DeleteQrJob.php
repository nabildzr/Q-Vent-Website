<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class DeleteQrJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $qrPath;

    public function __construct($qrPath)
    {
        $this->qrPath = $qrPath;
    }

    public function handle(): void
    {
        if (Storage::disk('public')->exists($this->qrPath)) {
            Storage::disk('public')->delete($this->qrPath);
        }
    }
}
