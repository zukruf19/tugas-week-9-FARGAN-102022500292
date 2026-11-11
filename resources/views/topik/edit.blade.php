<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Topik</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">

    <h2>Edit Topik Penelitian</h2>

    <a href="{{ route('topik.index') }}">Kembali</a>
    <br><br>

    <form action="{{ route('topik.update', $topik->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label>Topik:</label><br>
        <input type="text" name="topik" value="{{ $topik->topik }}" required style="width: 100%; margin-bottom: 10px;"><br>

        <label>Rumpun Ilmu:</label><br>
        <input type="text" name="rumpun_ilmu" value="{{ $topik->rumpun_ilmu }}" required style="width: 100%; margin-bottom: 10px;"><br>

        <label>Kata Kunci:</label><br>
        <input type="text" name="kata_kunci" value="{{ $topik->kata_kunci }}" required style="width: 100%; margin-bottom: 10px;"><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi" required style="width: 100%; margin-bottom: 10px; height: 100px;">{{ $topik->deskripsi }}</textarea><br>

        <button type="submit" style="padding: 10px 20px; background-color: orange; color: white; border: none; cursor: pointer;">Update</button>
    </form>

</body>
</html>