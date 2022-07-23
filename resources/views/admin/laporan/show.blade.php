<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin</title>
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" type="text/css">
    {{-- Google Fonts --}}
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') }}" rel="stylesheet">
    {{-- SB Admin --}}
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.min.css') }}">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body class="pt-4">
    <div class="container">
        <h4 class="text-center mb-4">Laporan Keuangan Masjid Nurul Iman</h4>
        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Tanggal</th>
                        <th>Sumber</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        <th>Keperluan</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kasmasuk as $kasmasuk)
                    <td>{{ $kasmasuk->tanggal }}</td>
                    <td>{{ $kasmasuk->kategori }}</td>
                    <td>{{ $kasmasuk->tanggal }}</td>
                    @endforeach
                    @foreach ($kaskeluar as $kaskeluar)
                    <td>{{ $kaskeluar->tanggal }}</td>
                    <td>{{ $kaskeluar->anggaran_id }}</td>
                    <td>{{ $kaskeluar->tanggal }}</td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>