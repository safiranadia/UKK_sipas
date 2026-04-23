<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di SIPAS</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        body {
            background-color: #f3f4f6;
            padding: 20px;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        }

        .email-header {
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            padding: 32px 24px;
            text-align: center;
            color: white;
        }

        .email-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .email-header p {
            opacity: 0.9;
            font-size: 14px;
        }

        .email-body {
            padding: 32px 24px;
        }

        .greeting {
            font-size: 20px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 16px;
        }

        .welcome-text {
            color: #475569;
            line-height: 1.7;
            margin-bottom: 24px;
        }

        .account-card {
            background: #f8fafc;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
            border-left: 4px solid #2563eb;
        }

        .account-card h3 {
            font-size: 16px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 16px;
        }

        .account-info {
            display: grid;
            gap: 12px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .info-label {
            color: #64748b;
            font-size: 14px;
        }

        .info-value {
            color: #1e293b;
            font-weight: 600;
            font-size: 14px;
        }

        .cta-button {
            display: block;
            width: 100%;
            text-align: center;
            padding: 14px 24px;
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 15px;
            margin-bottom: 24px;
            transition: all 0.3s;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.4);
        }

        .note-box {
            background: #fef3c7;
            border-radius: 10px;
            padding: 16px;
            border-left: 4px solid #f59e0b;
        }

        .note-box p {
            color: #92400e;
            font-size: 13px;
            line-height: 1.6;
        }

        .email-footer {
            padding: 24px;
            text-align: center;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
        }

        .email-footer p {
            color: #64748b;
            font-size: 12px;
            line-height: 1.5;
        }

        .logo-badge {
            width: 64px;
            height: 64px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 32px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <div class="logo-badge">🏫</div>
            <h1>Selamat Datang!</h1>
            <p>Sistem Informasi Pengaduan Sarana dan Prasarana</p>
        </div>

        <div class="email-body">
            <p class="greeting">Halo {{ $username }}, 👋</p>

            <p class="welcome-text">
                Akun SIPAS Anda telah berhasil dibuat. Sekarang Anda dapat melaporkan kerusakan fasilitas sekolah dengan
                mudah dan cepat melalui sistem kami.
            </p>

            <div class="account-card">
                <h3>🔑 Informasi Akun Anda</h3>
                <div class="account-info">
                    <div class="info-row">
                        <span class="info-label">Username</span>
                        <span class="info-value">{{ $username }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Email</span>
                        <span class="info-value">{{ $email }}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Kelas</span>
                        <span class="info-value">{{ $kelas }}</span>
                    </div>
                    @if ($from_admin)
                        <div class="info-row">
                            <span class="info-label">Password</span>
                            <span class="info-value">{{ $password }}</span>
                        </div>
                    @endif
                    <div class="info-row">
                        <span class="info-label">NISN</span>
                        <span class="info-value">{{ $nisn }}</span>
                    </div>
                </div>
            </div>

            <a href="{{ url('/login') }}" class="cta-button">
                🔐 Login Sekarang
            </a>

            @if ($from_admin)
                <div class="note-box">
                    <p>⚠️ <strong>Penting:</strong> Segera ganti password Anda setelah login pertama untuk keamanan
                        akun.
                        Jangan berikan informasi akun Anda kepada siapapun.</p>
                </div>
            @else
                <div class="note-box">
                    <p>ℹ️ Jika Anda mengalami kesulitan saat login atau memiliki pertanyaan, jangan ragu untuk
                        menghubungi
                        tim dukungan kami.</p>
            @endif
        </div>

        <div class="email-footer">
            <p>Email ini dikirim otomatis oleh sistem SIPAS.<br>
                Jika Anda tidak merasa mendaftar, silahkan abaikan email ini.</p>
            <p style="margin-top: 12px; font-weight: 600; color: #2563eb;">© SIPAS - SMK Taruna Bhakti Depok</p>
        </div>
    </div>
</body>

</html>
