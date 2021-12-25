<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Reset Password - Nastshopp</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/jumbotron/">

    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

    

    <!-- Bootstrap core CSS -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    
<main>
  <div class="container py-4 mt-5">

    <div style="margin-left: 350px;" class="row align-items-md-stretch align-items-center mt-5">
      <a href="/login" class="text-decoration-none mt-5" style="color: #F9A826;"><i class="bi bi-chevron-double-left"></i></i> Back</a>
      <div class="col-md-8 mt-2">
        <div class="h-100 p-5 text-white rounded-3" style="background-color: #F9A826;">
          <h2>{{ $data }}</h2>
          @if (Request::is('verify-email*'))
              <p>{{ $data }} Has Been Send to <b>{{ $mail['email'] }}</b>.
                If still hasn't received click this button bellow</p>
              <form action="/verify-email" method="post">
                @csrf
                <input type="hidden" name="email" value="{{ $mail['email'] }}">
                <button class="btn btn-outline-light" type="submit">Resend E-mail</button>
            </form>
        @else
              <p>{{ $data }} Has Been Send to <b>{{ $mail->email }}</b>.
                If still hasn't received click this button bellow</p>
              <form action="/forget-passwordd" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ $mail->id }}">
                <input type="hidden" name="email" value="{{ $mail->email }}">
                <button class="btn btn-outline-light" type="submit">Resend E-mail</button>
            </form>
          @endif
      </div>
    </div>
  </div>
</main>


    
  </body>
</html>
