<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Chatify\Facades\ChatifyMessenger as Chatify;
use App\Models\ReportFacilities;
use App\Models\User;

class CustomChatController extends Controller
{
    /**
     * Daftar pertanyaan dan jawaban default chatbot
     */
    private function getChatbotResponses()
    {
        return [
            'bagaimana cara membuat laporan pengaduan?' => 'Untuk membuat laporan pengaduan, silakan isi formulir yang tersedia dengan lengkap, meliputi judul pengaduan, lokasi, kategori, serta deskripsi permasalahan. Setelah itu, tekan tombol Kirim Laporan. Laporan Anda akan segera diproses oleh admin.',
            'apakah laporan saya sudah diproses?' => 'Anda dapat melihat status laporan melalui halaman riwayat laporan. Status yang ditampilkan meliputi Pending, Diproses, atau Selesai.',
            'apa saja kategori pengaduan yang tersedia?' => 'Kategori pengaduan yang tersedia meliputi Kerusakan Fasilitas, Kebersihan, Kelistrikan, Jaringan atau Internet, Ruangan, serta kategori lainnya. Silakan pilih kategori yang paling sesuai dengan kondisi yang dilaporkan.',
            'apakah saya dapat mengunggah foto atau video?' => 'Ya, Anda dapat mengunggah foto atau video sebagai bukti pendukung laporan. Ukuran maksimal setiap file adalah 10MB.',
            'berapa lama laporan akan diproses?' => 'Lama waktu pemrosesan laporan bergantung pada jenis dan tingkat permasalahan yang dilaporkan. Namun, admin akan berupaya menindaklanjuti setiap laporan secepat mungkin.'
        ];
    }

    /**
     * Cek pesan user dan berikan jawaban otomatis dari chatbot
     */
    private function chatbotAutoReply($userMessage, $userId)
    {
        $userMessage = strtolower(trim($userMessage));
        $responses = $this->getChatbotResponses();

        // Cek apakah pertanyaan ada di daftar
        foreach ($responses as $question => $answer) {
            similar_text(strtolower($question), $userMessage, $percent);
            if ($percent > 75) {
                return $answer;
            }
        }

        // Jika tidak ada jawaban, arahkan buat laporan
        return "🤖 Maaf, saya tidak dapat menjawab pertanyaan tersebut.<br><br>

        Untuk masalah yang anda alami, silahkan buat laporan secara formal dengan klik link berikut:<br><br>

        👉 <a class='btn btn-primary' href='" . route('siswa.home') . "' target='_blank'>Buat Laporan Sekarang</a><br><br>

        Tim admin akan segera memproses laporan anda.";
    }

    public function reportChat($id)
    {
        return redirect()->route('starbhak', ['report_id' => $id]);
    }

    /**
     * API Endpoint untuk chatbot
     */
    public function chatbotApi(Request $request)
    {
        $userMessage = $request->message;
        $botReply = $this->chatbotAutoReply($userMessage, auth()->id());
        
        return response()->json([
            'status' => 'success',
            'reply' => nl2br($botReply)
        ]);
    }
}