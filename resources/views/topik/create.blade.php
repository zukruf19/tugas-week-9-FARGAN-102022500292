<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Topik</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">

    <h2>Tambah Topik Penelitian Baru</h2>

    <a href="{{ route('topik.index') }}">Kembali</a>
    <br><br>

    <form action="{{ route('topik.store') }}" method="POST">
        @csrf
        
        <label>Topik:</label><br>
        <input type="text" name="topik" required style="width: 100%; margin-bottom: 10px;"><br>

        <label>Rumpun Ilmu:</label><br>
        <input type="text" name="rumpun_ilmu" required style="width: 100%; margin-bottom: 10px;"><br>

        <label>Kata Kunci:</label><br>
        <input type="text" name="kata_kunci" required style="width: 100%; margin-bottom: 10px;"><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi" required style="width: 100%; margin-bottom: 10px; height: 100px;"></textarea><br>

        <button type="submit" style="padding: 10px 20px; background-color: blue; color: white; border: none; cursor: pointer;">Simpan</button>
    </form>

</body>
</html> 