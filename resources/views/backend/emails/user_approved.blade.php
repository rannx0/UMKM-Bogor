<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <h1>Halo {{ $user->name }},</h1>
        <p>Akun Anda telah disetujui. Anda sekarang bisa login menggunakan email dan password yang sudah didaftarkan.</p>
        <p>Terima kasih,</p>
        <p>Tim {{ config('app.name') }}</p>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
    </div>
</body>
</html>