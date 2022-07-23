<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Keluarga Ma Haya') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link rel="shrotcut icon" href="{{ asset('img/logo.jpg') }}">

</head>

<body class="hold-transition login-page" style="background-image: url('{{ asset("img/lembur.png") }}'); background-size: cover; background-attachment: fixed;">
  <div class="login-box">
    <div class="login-logo">
      <img src="{{ asset('img/logo.jpg') }}" width="50%" alt="">
    </div>

    <div>
      @yield('content')
    </div>

    <footer style="color: white;">
      <marquee>
        <strong>KELUARGA BESAR Alm. MA HAYA </strong>
      </marquee>
    </footer>
  </div>

  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
  <!-- page script -->
  <script>
    $(document).ready(function() {
      $('#role').change(function() {
        var kel = $('#role option:selected').val();
        if (kel == "Guru") {
          $("#noId").addClass("mb-3");
          $("#noId").html(`
              <input id="nomer" type="text" maxlength="5" onkeypress="return inputAngka(event)" placeholder="No Id Card" class="form-control @error('nomer') is-invalid @enderror" name="nomer" autocomplete="nomer">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-id-card"></span>
                </div>
              </div>
              `);
          $("#pesan").html(`
              @error('nomer')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            `);
        } else if (kel == "Siswa") {
          $("#noId").addClass("mb-3");
          $("#noId").html(`
              <input id="nomer" type="text" placeholder="No Induk Siswa" class="form-control" name="nomer" autocomplete="nomer">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-id-card"></span>
                </div>
              </div>
            `);
          $("#pesan").html(`
              @error('nomer')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            `);
        } else {
          $('#noId').removeClass("mb-3");
          $('#noId').html('');
        }
      });
    });

    function inputAngka(e) {
      var charCode = (e.which) ? e.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
      }
      return true;
    }
  </script>
  @yield('script')

  @error('id_card')
  <script>
    toastr.error("Maaf User ini tidak terdaftar sebagai Guru SMKN 1 Jenangan Ponorogo!");
  </script>
  @enderror
  @error('guru')
  <script>
    toastr.error("Maaf Guru ini sudah terdaftar sebagai User!");
  </script>
  @enderror
  @error('no_induk')
  <script>
    toastr.error("Maaf User ini tidak terdaftar sebagai Siswa SMKN 1 Jenangan Ponorogo!");
  </script>
  @enderror
  @error('siswa')
  <script>
    toastr.error("Maaf Siswa ini sudah terdaftar sebagai User!");
  </script>
  @enderror
  @if (session('status'))
  <script>
    toastr.success("{{ Session('success') }}");
  </script>
  @endif
  @if (Session::has('error'))
  <script>
    toastr.error("{{ Session('error') }}");
  </script>
  @endif

</body>

</html>