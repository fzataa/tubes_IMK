<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Nastshopp | @yield('title')</title>
  </head>
  <body onbeforeunload="HandleBackFunctionality()">

    @yield('section')
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script>

      $(document).ready(function() {
        $("#shows").change(function() {
          if ($(this).prop("checked") == true) {
            $("#passwordd").attr("type", "text");            
          }else{
            $("#passwordd").attr("type", "password");            
          }
        });
     
        
      });
      
      $(document).ready(function() {
        history.pushState({page: 1}, null, "?page=log");
      });
      
      
      

      $(window).on('popstate', function(event) {
        
        window.location.href = "/";
      });

      $(document).ready(function() {
        $('#showpasse').change(function() {
          if ($(this).prop('checked')) {
            $('#Confirm_Password').attr('type', "text");
            $('#password').attr('type', "text");
          }else{
            $('#Confirm_Password').attr('type', "password");
            $('#password').attr('type', "password");
          }
        });
      });









    </script>



  </body>
</html>
