<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Topik Penelitian</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">

    <!-- Navbar / Header Area (Menampilkan Nama dan Role) -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; background-color: #f8f9fa; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
        <h2 style="margin: 0;">Daftar Topik Penelitian</h2>
        
        <div style="display: flex; align-items: center; gap: 15px;">
            <!-- Ini syarat dosen: Nama dan Role tampil di Navbar -->
            <span style="font-weight: bold; color: #333;">
                Halo, {{ auth()->user()->name }} (Role: {{ ucfirst(auth()->user()->role) }})
            </span>
            
            <a href="/keluar" style="background-color: #dc3545; color: white; padding: 8px 16px; border-radius: 5px; text-decoration: none; font-weight: bold;">
                Keluar
            </a>
        </div>
    </div>

    <!-- Notifikasi kalau ada error dari hak akses -->
    @if(session('error'))
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
            {{ session('error') }}
        </div>
    @endif

    <!-- Tombol Tambah Topik -->
    <a href="{{ route('topik.create') }}" style="display: inline-block; margin-bottom: 15px; padding: 10px; background-color: blue; color: white; text-decoration: none; border-radius: 5px;">
        + Tambah Topik
    </a>

    <!-- Tabel Data Utama -->
    <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th>No</th>
                <th>Topik</th>
                <th>Rumpun Ilmu</th>
                <th>Kata Kunci</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($topiks as $index => $t)
                <tr>
                    <td style="text-align: center;">{{ $index + 1 }}</td>
                    <td>{{ $t->topik }}</td>
                    <td>{{ $t->rumpun_ilmu }}</td>
                    <td>{{ $t->kata_kunci }}</td>
                    <td>{{ $t->deskripsi }}</td>
                    <td style="text-align: center;">
                        
                        <!-- Tombol Edit (Bisa dilihat Admin dan Staff) -->
                        <a href="{{ route('topik.edit', $t->id) }}" style="color: orange; text-decoration: none; font-weight: bold;">Edit</a> 
                        
                        <!-- Tombol Hapus (DIKUNCI: Hanya untuk Admin) -->
                        @if(auth()->user()->role === 'admin')
                            <span style="margin: 0 5px;">|</span>
                            <form action="{{ route('topik.destroy', $t->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color: red; border: none; background: none; cursor: pointer; font-weight: bold;" onclick="return confirm('Yakin mau dihapus?')">Hapus</button>
                            </form>
                        @endif

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; font-style: italic;">Belum ada data topik penelitian.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>