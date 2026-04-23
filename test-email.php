<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Mail;

echo "Testing Email Connection...\n";

try {
    Mail::raw('Test Email SIPAS berhasil!', function($message) {
        $message->to('test@mailtrap.io')->subject('✅ Test Email SIPAS');
    });
    
    echo "✅ EMAIL BERHASIL DIKIRIM!\n";
    echo "Cek inbox Mailtrap anda sekarang.\n";
    
} catch (Exception $e) {
    echo "❌ ERROR KIRIM EMAIL:\n";
    echo "Pesan: " . $e->getMessage() . "\n";
    echo "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
}