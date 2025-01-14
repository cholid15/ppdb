<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #1a4d2e;
            color: white;
            text-align: center;
            padding: 20px;
            border-radius: 5px 5px 0 0;
        }

        .content {
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #ddd;
        }

        .info-box {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 5px;
            padding: 15px;
            margin: 20px 0;
        }

        .registration-number {
            font-size: 24px;
            color: #1a4d2e;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            background-color: #e9f7ef;
            border-radius: 5px;
            margin: 15px 0;
        }

        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #666;
            background-color: #f8f9fa;
            border-radius: 0 0 5px 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>PPDB <?= htmlspecialchars($sekolah) ?></h1>
        </div>
        <div class="content">
            <p>Assalamu'alaikum Wr. Wb.</p>
            <p>Yth. <?= htmlspecialchars($nama) ?>,</p>
            <p>Terima kasih telah mendaftar di PPDB <?= htmlspecialchars($sekolah) ?>. Berikut adalah informasi akun
                Anda:</p>

            <div class="info-box">
                <p>Informasi Login:</p>
                <ul>
                    <li>Email: <?= htmlspecialchars($email) ?></li>
                    <li>Password: <?= htmlspecialchars($no_pendaftaran) ?></li>
                </ul>
            </div>

            <div class="registration-number">
                Nomor Pendaftaran:<br>
                <?= htmlspecialchars($no_pendaftaran) ?>
            </div>

            <p><strong>Penting:</strong></p>
            <ul>
                <li>Simpan nomor pendaftaran dengan baik</li>
                <li>Gunakan nomor pendaftaran sebagai password saat login</li>
            </ul>

            <p>Wassalamu'alaikum Wr. Wb.</p>
        </div>
        <div class="footer">
            <p>Email ini dikirim secara otomatis, mohon tidak membalas email ini.</p>
            <p>© <?= date('Y') ?> PPDB <?= htmlspecialchars($sekolah) ?>. All rights reserved.</p>
        </div>
    </div>
</body>

</html>