<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nastshopp | Admin</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Mega Able Bootstrap dashboard template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
      <meta name="keywords" content="bootstrap, bootstrap dashboard template, dashboard theme, dashboard dashboard, dashboard template, dashboard template, responsive" />
      <meta name="author" content="codedthemes" />
      <!-- Favicon icon -->
      <link rel="icon" href="#" type="image/x-icon">
      <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap/css/bootstrap.min.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('admin/icon/themify-icons/themify-icons.css') }}">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="{{ asset('admin/icon/font-awesome/css/font-awesome.min.css') }}">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="{{ asset('admin/icon/icofont/css/icofont.css') }}">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/style.css') }}">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
      <script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>

      <link href="{{ asset('dataTables') }}/datatables.min.css" rel="stylesheet" />
        <script type="text/javascript">
          $(document).ready( function () {
            $('#datatables').DataTable();
        } );
      </script>

      <link rel="stylesheet" type="text/css" href="/css/trix.css">
      <script type="text/javascript" src="/js/trix.js"></script>


      <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
        display : none;
      }


      </style>




  </head>
  <body>
      
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
          {{-- Top bar --}}
            @include('admin.layouts.topbar')
    
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                  {{-- Sidebar start --}}
                    @include('admin.layouts.sidebar')
                  {{-- Sidebar end --}}

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                              @yield('section')
                            <!-- Main-body end -->

                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('admin/js/jquery/jquery.min.js') }}"></script>
    <!-- waves js -->
    <script src="{{ asset('admin/pages/waves/js/waves.min.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('admin/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('admin/js/vertical-layout.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/script.js') }}"></script>  
    <script src="{{ asset('dataTables') }}/datatables.min.js">
    </script>
        <script type="text/javascript">
          $(document).ready( function () {
            $('#datatables').DataTable();
        } );
    </script>  

<script>
  $(document).ready(function() {
    $('#category').change(function() {
      var a = $(this).children(":selected").attr('id');
      if(a == "album"){
        $("#al").show();
        $("#ale").show();
        $("#alee").hide();
      }else if(a == "akun"){
        $("#al").hide();
        $("#ale").hide();
        $("#alee").show();
      }


    });
  });

var minDate, maxDate;
 
 // Custom filtering function which will search data in column four between two values
 $.fn.dataTable.ext.search.push(
     function( settings, data, dataIndex ) {
         var min = minDate.val();
         var max = maxDate.val();
         var date = new Date( data[4] );
  
         if (
             ( min === null && max === null ) ||
             ( min === null && date <= max ) ||
             ( min <= date   && max === null ) ||
             ( min <= date   && date <= max )
         ) {
             return true;
         }
         return false;
     }
 );
  
 $(document).ready(function() {
     // Create date inputs
     minDate = new DateTime($('#min'), {
         format: 'MMMM Do YYYY'
     });
     maxDate = new DateTime($('#max'), {
         format: 'MMMM Do YYYY'
     });
  
     // DataTables initialisation
     var table = $('#example').DataTable();
  
     // Refilter the table
     $('#min, #max').on('change', function () {
         table.draw();
     });
 });

 $(document).ready(function() {
  $('#ex').click(function() {
    $('#sta').val("Excel");
  });
  $('#pd').click(function() {
    $('#sta').val("PDF");
  });
 });










  



</script>










</body>

</html>

