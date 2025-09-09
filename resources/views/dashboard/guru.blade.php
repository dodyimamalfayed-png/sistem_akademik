<!DOCTYPE html>
<html>
<head>
    <title>Guru Dashboard</title>
</head>
<body>
    <h1>Selamat Datang, Guru!</h1>
    <p>Ini adalah halaman dashboard guru.</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
