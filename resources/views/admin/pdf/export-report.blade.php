<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pengaduan SIPAS</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #1e40af;
            padding-bottom: 15px;
        }
        .title {
            font-size: 20px;
            font-weight: bold;
            color: #1e40af;
            margin-bottom: 5px;
        }
        .subtitle {
            font-size: 12px;
            color: #64748b;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
        }
        th {
            background-color: #1e40af;
            color: white;
            padding: 10px;
            text-align: left;
            font-weight: bold;
        }
        td {
            padding: 8px;
            border: 1px solid #e2e8f0;
            vertical-align: top;
        }
        tr:nth-child(even) {
            background-color: #f8fafc;
        }
        .status {
            padding: 3px 8px;
            border-radius: 10px;
            font-size: 10px;
            font-weight: bold;
            display: inline-block;
        }
        .status-pending {
            background-color: #fee2e2;
            color: #991b1b;
        }
        .status-approved {
            background-color: #dbeafe;
            color: #1e40af;
        }
        .status-in_progress {
            background-color: #fef3c7;
            color: #92400e;
        }
        .status-resolved {
            background-color: #dcfce7;
            color: #166534;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 10px;
            color: #64748b;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="title">SISTEM INFORMASI PENGADUAN SARANA SEKOLAH</div>
        <div class="title">SIPAS</div>
        <div class="subtitle">Daftar Laporan Pengaduan - Dicetak pada {{ date('d F Y H:i') }}</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pelapor</th>
                <th>Fasilitas</th>
                <th>Kategori</th>
                <th>Lokasi</th>
                <th>Deskripsi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $index => $report)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $report->created_at->format('d/m/Y') }}</td>
                <td>{{ $report->user->username ?? '-' }}</td>
                <td>{{ $report->nama_fasilitas }}</td>
                <td>{{ $report->categoryReport->nama_kategori ?? '-' }}</td>
                <td>{{ $report->lokasi ?? '-' }}</td>
                <td>{{ Str::limit($report->deskripsi, 80) }}</td>
                <td>
                    @php
                        $statusLabel = [
                            'pending' => 'Baru',
                            'approved' => 'Disetujui',
                            'in_progress' => 'Diproses',
                            'resolved' => 'Selesai'
                        ];
                    @endphp
                    <span class="status status-{{ $report->status }}">{{ $statusLabel[$report->status] }}</span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak oleh Sistem SIPAS<br>Total Laporan: {{ $reports->count() }}</p>
    </div>

</body>
</html>