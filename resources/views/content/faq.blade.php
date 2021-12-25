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
        <h2 class="h3 mb-3 text-black text-center">Frequently Asked Question</h2>
        <div class="border p-4 rounded mt-4" role="alert">
          <div class="border p-3 mb-3">
            <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#q1" role="button" aria-expanded="false" aria-controls="q1"><i class="bi bi-patch-question-fill"></i> What information should I input when ordering?</a></h3>
            <div class="collapse" id="q1">
              <div class="py-2">
                <p class="mb-0 text-justify"><i class="bi bi-bookmark-check"></i> Our online ordering system will ask for all the important information you should submit.</p>
              </div>
            </div>
          </div>
          <div class="border p-3 mb-3">
            <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#q2" role="button" aria-expanded="false" aria-controls="q2"><i class="bi bi-patch-question-fill"></i> What payment methods can I use?</a></h3>
            <div class="collapse" id="q2">
              <div class="py-2">
                <p class="mb-0 text-justify"><i class="bi bi-bookmark-check"></i> You can choose DANA, OVO or GOPAY.</p>
              </div>
            </div>
          </div>
          <div class="border p-3 mb-3">
            <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#q3" role="button" aria-expanded="false" aria-controls="q3"><i class="bi bi-patch-question-fill"></i> What should I do if the payment is not accepted?</a></h3>
            <div class="collapse" id="q3">
              <div class="py-2">
                <p class="mb-0 text-justify"><i class="bi bi-bookmark-check"></i> Please try again in a little while. If payment is still not accepted, please verify your account balance. If everything is as it should, but you still can't make the payment, please contact nast.shopp@gmail.com notify us about the problem. We can manage the order manually.</p>
              </div>
            </div>
          </div>
          <div class="border p-3 mb-3">
            <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#q4" role="button" aria-expanded="false" aria-controls="q4"><i class="bi bi-patch-question-fill"></i> How can I change delivery address?</a></h3>
            <div class="collapse" id="q4">
              <div class="py-2">
                <p class="mb-0 text-justify"><i class="bi bi-bookmark-check"></i> Sign in to your account and go to "my account". On "my account" you can change all your self contact information.</p>
              </div>
            </div>
          </div>
          <div class="border p-3 mb-3">
            <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#q5" role="button" aria-expanded="false" aria-controls="q5"><i class="bi bi-patch-question-fill"></i> What are the delivery charges?</a></h3>
            <div class="collapse" id="q5">
              <div class="py-2">
                <p class="mb-0 text-justify"><i class="bi bi-bookmark-check"></i> Delivery charges are dependent on the shipment requirements. If the products on your order are due to special requirements (for example dry ice) extra fee will be added to shipment charges. You can see the shipping fees on the checkout process before the payment is made.</p>
              </div>
            </div>
          </div>
          <div class="border p-3 mb-3">
            <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#q6" role="button" aria-expanded="false" aria-controls="q6"><i class="bi bi-patch-question-fill"></i> What are the terms and conditions?</a></h3>
            <div class="collapse" id="q6">
              <div class="py-2">
                <p class="mb-0 text-justify"><i class="bi bi-bookmark-check"></i> You can see the terms and condition here.</p>
              </div>
            </div>
          </div>
          <div class="border p-3 mb-3">
            <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#q8" role="button" aria-expanded="false" aria-controls="q8"><i class="bi bi-patch-question-fill"></i> Can I cancel my order?</a></h3>
            <div class="collapse" id="q8">
              <div class="py-2">
                <p class="mb-0 text-justify"><i class="bi bi-bookmark-check"></i> If you want to cancel your order, please do soon as possible. If we have already processed your order, you need to contact us and return the product. Please contact nast.shopp@gmail.com.</p>
              </div>
            </div>
          </div>
          <div class="border p-3 mb-3">
            <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#q9" role="button" aria-expanded="false" aria-controls="q9"><i class="bi bi-patch-question-fill"></i> Do you have the product in stock?</a></h3>
            <div class="collapse" id="q9">
              <div class="py-2">
                <p class="mb-0 text-justify"><i class="bi bi-bookmark-check"></i> All the products which are shown on our site are available. Order lead time depends on the produts and quantities.</p>
              </div>
            </div>
          </div>
          <div class="border p-3 mb-3">
            <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#q10" role="button" aria-expanded="false" aria-controls="q10"><i class="bi bi-patch-question-fill"></i> How to contact customer service?</a></h3>
            <div class="collapse" id="q10">
              <div class="py-2">
                <p class="mb-0 text-justify"><i class="bi bi-bookmark-check"></i> If you have question regarding our online store (ordering, account question, technical questions), plaese contact nast.shopp@gmail.com.</p>
              </div>
            </div>
          </div>
          <div class="border p-3 mb-3">
            <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#q11" role="button" aria-expanded="false" aria-controls="q11"><i class="bi bi-patch-question-fill"></i> Can I return a product?</a></h3>
            <div class="collapse" id="q11">
              <div class="py-2">
                <p class="mb-0 text-justify"><i class="bi bi-bookmark-check"></i> If you want to return a product, please contact nast.shopp@gmail.com.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection



