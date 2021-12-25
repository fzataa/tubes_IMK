@extends('layouts.main')

@section('isi')

<style>
  body {font-family: Arial, Helvetica, sans-serif;}
  
  #myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
  }
  
  #myImg:hover {opacity: 0.7;}
  
  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
  }
  
  /* Modal Content (image) */
  .modal-content {
    margin: auto;
    display: block;
    width: 50%;
    max-width: 700px;
  }
  
  /* Caption of Modal Image */
  #caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
  }
  
  /* Add Animation */
  .modal-content, #caption {  
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
  }
  
  @-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
  }
  
  @keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
  }
  
  /* The Close Button */
  .close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
  }
  
  .close:hover,
  .close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
  }
  
  /* 100% Image Width on Smaller Screens */
  @media only screen and (max-width: 700px){
    .modal-content {
      width: 100%;
    }
  }
  </style>


<div class="site-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-12">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
          <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
          </symbol>
          <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </symbol>
        </svg>
        @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert" id="suc">
              <svg class="bi flex-shrink-0 me-2 mr-1" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
              {{ session('success') }}
              <button type="button" class="btn btn-light border-0 mt-0" style="background-color: transparent; float: right; margin-right: 0%" data-bs-dismiss="alert" aria-label="Close" onclick="document.getElementById('suc').style.display = 'none' "><i class="bi bi-x-lg"></i></button>
          </div>
        @endif
        {{-- <a class="text-light text-center bg-primary rounded text-danger mb-3 border-0" style="font-size:20px" onclick="">Back To Order List</a> --}}
        <a href="/transactio/upload-proofment" class="btn btn-primary mb-3 px-2 py-1" style="padding: 0"><i class="bi bi-arrow-left"></i>Back To Order List</a>
        <div class="border p-4 rounded" role="alert">
          <div class="row">
            <img src="{{ asset('storage/' . $tran->product->image1) }}" height="180" width="130" class="rounded float-start mb-3 mt-4 ml-4">
            <div class="col col-centered rounded bg-muted ml-5 mr-4">
              <div class="mycontent-right">
                <table class="table mb-3">
                  <tbody>
                    <tr>
                      <th>Product Name</th>
                      @if ($tran->product->category == "Album")
                        <td>{{$tran->product->grup }}</td>
                      @else
                        <td>{{$tran->product->judul }}</td>
                      @endif
                    </tr>
                    <tr>
                      <th>Order Detail</th>
                      <td>{!! $tran->cart->keterangan !!}</td>
                    </tr>
                    <tr>
                      <th>Quantity</th>
                      <td>{{ $tran->cart->jumlah }} Pcs</td>
                    </tr>
                    <tr>
                      <th>Sub Total</th>
                      <th class="text-right">Rp.{{ $tran->cart->harga }}</th>
                    </tr>
                  </tbody>
                </table>
              </div>
              <p class="text-dark fs-4 ml-2 mt-4 text-center" style="font-weight: bold">Shipping</p>
                <div class="border-top pb-4">
                  <table class="table table-borderless mb-3">
                    <tbody>
                      <tr>
                        <th>Destination</th>
                        <td width="70%">{{ $tran->address->address_opt }}, {{ $city->name }}, {{ $tran->address->province->name }}</td>
                      </tr>
                      <tr>
                        <th>Shipping Cost</th>
                        <td class="text-right">Rp.{{ $tran->address->ongkir }}</td>
                      </tr>
                      <tr class="border-top">
                        <th width="30%">Total</th>
                        <th class="text-right">Rp.{{ $tran->total }}</th>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
        
        <div class="border p-4 rounded mt-4" role="alert">
          <p class="text-dark">Status : {{ $tran->status }}</p>
        </div>
        
        
        @if ($tran->status == "Arrived")
          <div class="border p-4 rounded mt-4" role="alert">
            @if (!$tran->review_id)
                
            <form action="/add-review-product" method="post" enctype="multipart/form-data">
              @csrf
              <p class="text-dark">Add Review</p>
                <input class="mb-3 @error('rate') is-invalid @enderror" type="text" name="rate" placeholder="Rate 0 - 100">
                @error('rate')
                  <div class="invalid-feedback mb-3 mt-0">
                    {{ $message }}
                  </div>
                @enderror
                <input type="hidden" name="product_id" value="{{ $tran->product->id }}">
                <input type="hidden" name="user_id" value="{{ $tran->user->id }}">
                <input type="hidden" name="tran_id" value="{{ $tran->id }}">
                <textarea style="background-color: transparent;" name="review" class="form-control @error('review') is-invalid @enderror" placeholder="Your Reviews"></textarea>
                @error('review')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
                <p class="mt-3 text-black">Optional</p>
                <input class="mt-3 form-control @error('image') is-invalid @enderror" type="file" name="image">
                @error('image')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              <button class="btn btn-primary d-block mt-3" style="font-size:15px;">Add</button>
            </form>
            @else
            @endif
          </div>
        @else    
        @if ($tran->resi && $tran->status == "On Shipping")
          <div class="border p-4 rounded mt-4" role="alert">
            <p class="text-dark">Tracking Number : <input id="myInput" style="border: 0; background-color: transparent;" size="15" disabled value="{{ $tran->resi }}">
            <button class="btn btn-primary d-inline" style="font-size:10px;" onclick="myFunction()">Copy Number</button>
            </p>
          </div>
          
          
          <div class="border p-4 rounded mt-4" role="alert">
            <p class="text-dark">Product Receipt Confirmation</p>
            <form action="/transactio/change-stats" method="post">
              @csrf
              <input type="hidden" name="name" value="{{ $tran->user->name }}">
              <input type="hidden" name="phone" value="{{ $tran->address->phone }}">
              <input type="hidden" name="e_mail" value="{{ $tran->address->email }}">
              <input type="hidden" name="product_name" value="{{ $tran->cart->keterangan }}">
              <input type="hidden" name="quantity" value="{{ $tran->cart->jumlah }}">
              <input type="hidden" name="address_location" value="{{ $tran->address->address_opt }}">
              <input type="hidden" name="city" value="{{ $city->name }}">
              <input type="hidden" name="province" value="{{ $tran->address->province->name }}">
              <input type="hidden" name="courier" value="{{ $tran->address->kurir }}">
              <input type="hidden" name="total" value="{{ $tran->total }}">
              <input type="hidden" name="status" value="Arrived">
              <input type="hidden" name="tran_id" value="{{ $tran->id }}">
              <button class="btn btn-primary" type="submit" onclick="return confirm('Make Sure The Condition Of The Product Is Appropriate And Good, You Cant Apply For a Refund After Confirmation')">Order Accepted</button>
            </form>
          </div>
          
        @elseif($tran->status != "On Shipping")
          

        <div class="border p-4 rounded mt-4" role="alert">
          <p class="text-dark">Payment Method</p>

          <div class="border p-3 mb-3">
            <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebni" role="button" aria-expanded="false" aria-controls="collapsebni"> &nbsp;<img width="80px" src="/image/logo-gopay-vector.png" alt="GOPAY"></a></h3>
            <div class="collapse" id="collapsebni">
              <div class="py-2">
                <p class="mb-0">Transfer To This Number : 0811 6556 162</p>
                <p class="mb-0">On Behalf : Amalia Rizkinta</p>
              </div>
            </div>
          </div>
          <div class="border p-3 mb-3">
            <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsedana" role="button" aria-expanded="false" aria-controls="collapsedana"> &nbsp;<img width="80px" src="/image/6da13aa250285ea3992849f37257083e.jpg" alt="DANA"></a></h3>
            <div class="collapse" id="collapsedana">
              <div class="py-2">
                <p class="mb-0">Transfer To This Number : 0811 6556 162</p>
                <p class="mb-0">On Behalf : Amalia Rizkinta</p>
              </div>
            </div>
          </div>
          <div class="border p-3 mb-3">
            <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapseshopee" role="button" aria-expanded="false" aria-controls="collapseshopee"> &nbsp;<img width="80px" src="/image/1a62aa1c175a7bb8ce2aaeb1aef6b2c4.png" alt="OVO"></a></h3>
            <div class="collapse" id="collapseshopee">
              <div class="py-2">
                <p class="mb-0">Transfer To This Number : 0811 6556 162</p>
                <p class="mb-0">On Behalf : Amalia Rizkinta</p>
              </div>
            </div>
          </div>

          <div>
            <form action="/upload-transaction-proofment" method="post" enctype="multipart/form-data">
              @csrf
              @if ($tran->status == "Waiting For Verification")
                <p class="mt-5 text-black">change Image If It Isn't Payment Proofment Image (OPTIONAL)</p>
                {{-- <p class="mt-3 text-danger">If Within 24 Hours There Is No proof Of Payment, The Transaction Will Automatically Be Canceled</p> --}}
                @if ($tran->bukti)
                  <img src="{{ asset('storage/' . $tran->bukti) }}" class="img-preview img-fluid" id="myImg" style="width:200px; height:200px;" alt=""><br>
                @else
                  <img class="img-preview img-fluid" style="width:200px; height:200px; display:none;" id="myImg" alt=""><br>
                @endif
                <input class="form-control @error('bukti') is-invalid @enderror " type="file" name="bukti" id="image1" onchange="previewImage()">
                @error('bukti')
                  <div class="invalid-feedback">
                    {{ $message }}  
                  </div>                
                @enderror
                <input type="hidden" name="status" value="Waiting For Verification">
                <input type="hidden" name="tran_id" value="{{ $tran->id }}">
                <button type="submit" class="btn btn-primary mt-3">Upload Image</button>
              @else
                <p class="mt-5 text-danger">Upload Your Payment Proofment*</p>
                {{-- <p class="mt-3 text-danger">If Within 24 Hours There Is No proof Of Payment, The Transaction Will Automatically Be Canceled</p> --}}
                @if ($tran->bukti)
                <img src="{{ asset('storage/' . $tran->bukti) }}" class="img-preview img-fluid" id="myImg" style="width:200px; height:200px;" alt=""><br>
                @else
                <img class="img-preview img-fluid" style="width:200px; height:200px; display:none;" id="myImg" alt=""><br>
                @endif
                <input class="form-control @error('bukti') is-invalid @enderror " type="file" name="bukti" id="image1" onchange="previewImage()">
                @error('bukti')
                <div class="invalid-feedback">
                  {{ $message }}  
                </div>                
                @enderror
                <input type="hidden" name="status" value="Waiting For Verification">
                <input type="hidden" name="tran_id" value="{{ $tran->id }}">
                <button class="btn btn-primary px-2 py-1 mt-3" style="padding: 0" type="submit"><i class="bi bi-arrow-bar-up"></i>Upload Image</button>
              @endif
            </form>
          </div>
        </div>

        @if ($tran->status == "Upload Payment Proofment")
          <div class="border p-4 rounded mt-4" role="alert">
            <p class="text-dark">Cancel Transaction </p>
            <form action="/delete" method="post">
              @csrf
              <input type="hidden" name="tran_id" value="{{ $tran->id }}">
              <button onclick="return confirm('Are You Sure ?')" class="btn btn-danger px-1" style="padding: 0" type="submit">Cancel<i class="bi bi-x-lg"></i></button>
            </form>
          </div>
        @endif

          <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
          </div>
        @endif

        @endif
          



        </div>

      </div>
    </div>
  </div>
</div>

<script>
  function previewImage (){
      const img1 = document.querySelector('#image1');
      const imgp1 = document.querySelector('.img-preview');

      
      const oFReader = new FileReader();
      oFReader.readAsDataURL(img1.files[0]);
      
      oFReader.onload = function(oFREvent){
          imgp1.src = oFREvent.target.result;
      }

      imgp1.style.display = 'block';
  }

  function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

   /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}





// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}

</script>

@endsection



