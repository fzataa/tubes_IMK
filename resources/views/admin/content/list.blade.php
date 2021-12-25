@extends('admin.layouts.index')

@section('section')

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





    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-lg-12 col-xl-6">
                      @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="suc">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="document.getElementById('suc').style.display = 'none' ">X</button>
                        </div>
                      @endif
                      
                        {{-- Right Side --}}
                        <div class="card">
                            <div class="card-header">
                                @if ($tran->status == "Waiting For Verification" || $tran->status == "Rejected")
                                <a href="/transaction/waiting-for-verification" class="btn btn-info mb-3">Back</a>&nbsp;&nbsp;
                                <form action="/transaction/waiting-for-verification" method="post" id="forme" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="tran_id" value="{{ $tran->id }}">
                                    <a onclick="document.getElementById('forme').submit()" style="color:white;" class="btn btn-danger mb-3">Delete Transaction</a>
                                </form>
                                @else
                                <a href="/transaction/on-shipping" class="btn btn-info mb-3">Back</a>
                                @endif
                                
                                <h5 class="d-block">Images</h5>
                                @if ($tran->product->category == "Album")
                                <span>{{ $tran->grup }}</span>
                                @else
                                <span>{{ $tran->judul }}</span>
                                @endif
                                <span>Category : {{ $tran->product->category }}</span>
                            </div> 
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs md-tabs img-tabs b-none" role="tablist">
                                <li class="nav-item">
                                    <img style="width:100px; height:100px" src="{{ asset('storage/' . $tran->product->image1) }}" class="img-flex mt-1">
                                    <p class="mt-2"> {{ $tran->desc1 }}</p>
                                </li>
                            </ul>
                        </div>
                        <ol class="list-group list-group-numbered">
                            <li class="list-group-item">Name : {{ $tran->address->name }}</li>
                            <li class="list-group-item">Product : {{ $tran->cart->keterangan }}</li>
                            <li class="list-group-item">Address : {{ $city->name }}, {{ $tran->address->province->name }}</li>
                            <li class="list-group-item">Address Detail : {{ $tran->address->address_opt }}</li>
                            <li class="list-group-item">Quantity : {{ $tran->cart->jumlah }}</li>
                            <li class="list-group-item">Total : Rp.{{ $tran->total }}</li>
                            <li class="list-group-item">Courier : {{ strtoupper($tran->address->kurir) }}</li>
                            <li class="list-group-item">Phone : {{ $tran->address->phone }}</li>
                            <li class="list-group-item">E-mail : {{ $tran->address->email }}</li>
                            <li class="list-group-item">Status : {{ $tran->status}}</li>
                            <li class="list-group-item">Date : {{ $tran->tanggal }}</li>
                        </ol>
                        <!-- Basic map end -->
                    </div>
                    <div class="col-lg-12 col-xl-6">
                        <!-- Markers map start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Payment Image</h5>
                                <span>Image</span>
                            </div>
                            <div class="card-block">
                                <div id="markers-map" class="set-map">
                                    <ul class="list-group list-group-numbered">
                                        @if ($tran->bukti)
                                        <li>
                                            <img id="myImg" width="230px" src="{{ asset('storage/' . $tran->bukti) }}" alt="">
                                        </li>
                                        <li></li>
                                        <li>
                                            <br>
                                            @if ($tran->status == "Arrived")
                                            @else
                                                @if ($tran->status == "On Shipping")
                                                    <h6 style="color:black; margin-left:65px;" >Add Tracking Number</h6>
                                                    <form action="/transaction/change-status" method="post">
                                                        @csrf
                                                        <input type="hidden" name="tran_id" value="{{ $tran->id }}">
                                                        <input type="hidden" name="status" value="On Shipping">
                                                        <input type="text" class="form-control mt-2 rounded" style="width:50%;" name="resi" required value="{{ $tran->resi }}">
                                                    </li>
                                                    <li>  </li>
                                                    <li>
                                                        <button class="btn btn-primary mt-3" style="width:50%;" ><span></span>Add Tracking Number</button>
                                                @else
                                                <h5 style="color:black;">Change Status</h5>
                                                <form action="/transaction/change-status" method="post">
                                                    @csrf
                                                    <input type="hidden" name="tran_id" value="{{ $tran->id }}">
                                                    <select class="form-control" name="status" id="stat">
                                                        @if ($tran->status == "Waiting For Verification")
                                                            <option value="{{ $tran->status }}">{{ $tran->status }}</option>
                                                            <option value="On Shipping">On Shipping</option>
                                                            <option value="Rejected">Rejected</option>
                                                        @endif
                                                    </select>
                                                </li>
                                                <li><br>  </li>
                                                <li>
                                                    <button class="btn btn-primary mb-3" ><span></span>Edit Status</button>
                                                @endif
                                                @endif
                                            </form>
                                        </li>
                                        @else
                                        <li>
                                            <h2>No Transaction Proofment Image</h2>
                                        </li>
                                        @endif
                                        
                                       

                                        {{-- <li class="list-group-item d-flex justify-content-between align-items-start bg-info">
                                          <div class="ms-2 me-auto">
                                            <div class="fw-bold">Description</div> 
                                            {!! $products->desc !!}
                                            </div>
                                        </li> --}}
                                      </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Markers map end -->
                    </div>
                </div>
            </div>
            <!-- Page-body end -->
        </div>
    </div>


    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
      </div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  $('#navbrraa').hide();
  $('#sidebrr').hide();
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  $('#navbrraa').show();
  $('#sidebrr').show();
  modal.style.display = "none";
}


</script>
    
@endsection
