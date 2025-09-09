<!DOCTYPE html>
<html>
<head>
    <title>Siswa Dashboard</title>
</head>
<body>
    <h1>Selamat Datang, Siswa!</h1>
    <p>Ini adalah halaman dashboard siswa.</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
