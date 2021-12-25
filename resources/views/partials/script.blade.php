<script src="{{ asset('user/js/jquery-3.3.1.min.js') }}"></script>
<!-- <script src="js/jquery-ui.js"></script> -->
<!-- <script src="js/popper.min.js"></script> -->
<script src="{{ asset('user/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('user/js/owl.carousel.min.js') }}"></script>
<!-- <script src="js/jquery.magnific-popup.min.js"></script> -->
<script src="{{ asset('user/js/aos.js') }}"></script>

<script src="{{ asset('user/js/main.js') }}"></script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


<script>
  $(document).ready(function(){
      //active select2
      $(".provinsi-tujuan, .kota-tujuan").select2({
          theme:'bootstrap4',width:'style',
      });
      //ajax select kota asal
      // $('select[name="province_origin"]').on('change', function () {
      //     let provindeId = $(this).val();
      //     if (provindeId) {
      //         jQuery.ajax({
      //             url: '/cities/'+provindeId,
      //             type: "GET",
      //             dataType: "json",
      //             success: function (response) {
      //                 $('select[name="city_origin"]').empty();
      //                 $('select[name="city_origin"]').append('<option value="">-- pilih kota asal --</option>');
      //                 $.each(response, function (key, value) {
      //                     $('select[name="city_origin"]').append('<option value="' + key + '">' + value + '</option>');
      //                 });
      //             },
      //         });
      //     } else {
      //         $('select[name="city_origin"]').append('<option value="">-- pilih kota asal --</option>');
      //     }
      // });
      //ajax select kota tujuan
      $('select[name="province_destination"]').on('change', function () {
          let provindeId = $(this).val();
          if (provindeId) {
              jQuery.ajax({
                  url: '/cities/'+provindeId,
                  type: "GET",
                  dataType: "json",
                  success: function (response) {
                      $('select[name="city_destination"]').empty();
                      $('select[name="city_destination"]').append('<option value="">-- Destination City --</option>');
                      $.each(response, function (key, value) {
                          $('select[name="city_destination"]').append('<option value="' + key + '">' + value + '</option>');
                      });
                  },
              });
          } else {
              $('select[name="city_destination"]').append('<option value="">--  Destination City  --</option>');
          }
      });
      //ajax check ongkir
      let isProcessing = false;
      $('.btn-check').click(function (e) {
          e.preventDefault();

          let token            = $("meta[name='csrf-token']").attr("content");
          let city_origin      = $('input[name=city_origin]').val();
          let city_destination = $('select[name=city_destination]').val();
          let courier          = $('select[name=courier]').val();
          let weight           = $('#weight').val();

          if(isProcessing){
              return;
          }

          isProcessing = true;
          jQuery.ajax({
              url: "/ongkir",
              data: {
                  _token:              token,
                  city_origin:         city_origin,
                  city_destination:    city_destination,
                  courier:             courier,
                  weight:              weight,
              },
              dataType: "JSON",
              type: "POST",
              success: function (response) {
                  isProcessing = false;
                  if (response) {
                      $('#ongkir').empty();
                      $('.ongkir').addClass('d-block');
                      $.each(response[0]['costs'], function (key, value) {
                          $('#ongkir').append('<li class="list-group-item"><label><input type="radio" name="harga" value="'+value.cost[0].value+'" required>&nbsp;&nbsp;'+response[0].code.toUpperCase()+' : <strong>'+value.service+'</strong> - Rp. '+value.cost[0].value+' ('+value.cost[0].etd+' day)</label></li>');
                        });
                        $('input[type="radio"]').click(function() {
                          var harga = $(this).val();
                          $('#huarga').val(harga);
                        });
                  }
              }
          });

      });

  });



  $(document).ready(function() {
        var urr = [];
        var b = 0;
    
        
        arr = $('input[id=jumlahh]').map(function() {
            return this.value ;
        });
    
        err = $('input[id=hargg]').map(function(){
            return this.value;
        });
    
        for (let i = 0; i < arr.length; i++) {
            // alert(arr[i]);
            urr[i] = err[i]*arr[i];
            b += urr[i];
        }
    
        $('td[id=tot]').each(function (index){
            $(this).empty();
            $(this).append("Rp." + urr[index]);
            });    
            
            $('strong[class=text-black]').text("Rp."+b);


    });

    function plus() {

        var urr = [];
        var b = 0;
        
        arr = $('input[id=jumlahh]').map(function() {
            return this.value ;
        });
    
        err = $('input[id=hargg]').map(function(){
            return this.value;
        });
    
        for (let i = 0; i < arr.length; i++) {
            // alert(arr[i]);
            urr[i] = err[i]*arr[i];
            b += urr[i];
        }
    
        $('td[id=tot]').each(function (index){
            $(this).empty();
            $(this).append("Rp." + urr[index]);
        });    
            
        $('strong[class=text-black]').text("Rp."+b);

    }





$(document).ready(function() {
    
    var a = $("#harg_f").val();

    var b = $("#lain");

    var c = $("#harg_ver").val();

    checked = $("input[type=checkbox]:checked").length;
    
    var cek = 0;
    
    $("#pilihan").change(function() {
        var d = $(this).children(":selected").attr("id");



        if (d == "non") {
            $("input[type=checkbox]").prop("checked", false);
            cek=0;
            $('div[id="price_verr1"]').hide();
            $("#price_ful").hide();
            b.val("");
        }else if(d == "full"){
            $("input[type=checkbox]").prop("checked", false);
            cek=0;
            $('div[id="price_verr1"]').hide();
            $("#price_ful").show();
            b.empty();
            b.val(a);
        }else if(d == "vers") {
            $("input[type=checkbox]").prop("checked", false);
            cek=0;
            $('div[id="price_verr1"]').show();
            $("#price_ful").hide();
            b.empty();
            b.val(c);
        }



        // $("#non").click(function() {
        // });
        // $("#full").click(function() {
        //     
        // });
        // $("#vers").click(function() {
        //    
        // });

        // $('input[type=checkbox]').click(function() {
        //     cek+=1;
        // });
    });

    $("input[type=checkbox]").each(function() {
            $(this).change(function() {
                if ($(this).prop("checked") == true) {
                    cek+=1;
                }else{
                    cek-=1;
                }
            });
            // if ($(this).prop("checked") == true) {
                //     alert("a");
                // }
        });


        $("#pijit").click(function () {
            if (cek == 0) {
                alert("You must check at least one");
                return false;
            }
        });
}); 

$(document).ready(function() {
    $('#shopass').change(function() {
        if ($(this).prop('checked')) {
            $('#new_password_confirm').attr('type', 'text');
            $('#password').attr('type', 'text');
            $('#old_password').attr('type', 'text');
        }else{
            $('#new_password_confirm').attr('type', 'password');
            $('#password').attr('type', 'password');
            $('#old_password').attr('type', 'password');
        }
    });
});





</script>