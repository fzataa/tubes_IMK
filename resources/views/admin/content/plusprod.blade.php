@extends('admin.layouts.index')

@section('section')
    
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <!-- Basic table card start -->
                <div class="card">
                    <div class="card-header">
                        <a href="/products" class="btn btn-info mb-3">Back to all products</a>
                        <h5 class="d-block">Insert New Products</h5>
                        <span>Menambah produk baru</span>
                    </div>
                    <div class="card-block">
                        <form method="post" action="/products" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="category" class="form-label">Category *</label>
                                <select class="form-control" name="category" id="category" required>
                                    <option id="album" value="Album">Album</option>
                                </select>
                                <div class="invalid-feedback">
                                    @error('category')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div id="al" class="mb-3">
                                <label for="grup" class="form-label">Grup *</label>
                                <input type="text" class="form-control @error('grup') is-invalid @enderror" name="grup" id="grup" autofocus value="{{ old('grup')}}">
                                <div class="invalid-feedback">
                                    @error('grup')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div id="alee" class="mb-3" style="display:none;">
                                <label for="judul" class="form-label">Judul *</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul"  value="{{ old('judul')}}">
                                <div class="invalid-feedback">
                                    @error('judul')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div id="ale" class="mb-3">
                                <label for="album" class="form-label">Nama Album *</label>
                                <input type="text" class="form-control @error('album') is-invalid @enderror" id="album" name="album" value="{{ old('album')}}">
                                <div class="invalid-feedback">
                                    @error('album')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="desc" class="form-label">Description *</label>
                                <input id="desc" type="hidden" name="desc" value="{{ old('desc')}}">
                                <trix-editor class="@error('desc') is-invalid @enderror" input="desc"></trix-editor>
                                <div class="invalid-feedback">
                                    @error('desc')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image1" class="form-label">Image 1 *</label>
                                <img class="img-preview img-fluid" style="width:400px; height:400px; display:none;" alt=""><br>
                                <input type="file" class="form-control @error('image1') is-invalid @enderror" name="image1" id="image1"  onchange="previewImage()" required>
                                <div class="invalid-feedback">
                                    @error('image1')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="desc1" class="form-label">Desc Image *</label>
                                <input type="text" class="form-control @error('desc1') is-invalid @enderror" id="desc1" name="desc1" value="{{ old('desc1')}}">
                                <div class="invalid-feedback">
                                    @error('desc1')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image2" class="form-label">Image 2</label>
                                <img class="img-preview1 img-fluid" style="width:400px; height:400px; display:none;" alt=""><br>
                                <input type="file" class="form-control @error('image2') is-invalid @enderror" name="image2" id="image2"  onchange="previewImage()">
                                <div class="invalid-feedback">
                                    @error('image 2')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="desc2" class="form-label">Desc Image</label>
                                <input type="text" class="form-control @error('desc2') is-invalid @enderror" id="desc2" name="desc2" value="{{ old('desc2')}}">
                                <div class="invalid-feedback">
                                    @error('desc2')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image3" class="form-label">Image 3</label>
                                <img class="img-preview2 img-fluid" style="width:400px; height:400px; display:none;" alt=""><br>
                                <input type="file" class="form-control @error('image3') is-invalid @enderror" name="image3" id="image3"  onchange="previewImage()">
                                <div class="invalid-feedback">
                                    @error('image3')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="desc3" class="form-label">Desc Image</label>
                                <input type="text" class="form-control @error('desc3') is-invalid @enderror" id="desc3" name="desc3" value="{{ old('desc3')}}">
                                <div class="invalid-feedback">
                                    @error('desc3')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image4" class="form-label">Image 4</label>
                                <img class="img-preview3 img-fluid" style="width:400px; height:400px; display:none;" alt=""><br>
                                <input type="file" class="form-control @error('image4') is-invalid @enderror" name="image4" id="image4"  onchange="previewImage()">
                                <div class="invalid-feedback">
                                    @error('image4')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="desc4" class="form-label">Desc Image</label>
                                <input type="text" class="form-control @error('desc4') is-invalid @enderror" id="desc4" name="desc4" value="{{ old('desc4')}}">
                                <div class="invalid-feedback">
                                    @error('desc4')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image5" class="form-label">Image 5</label>
                                <img class="img-preview4 img-fluid" style="width:400px; height:400px; display:none;" alt=""><br>
                                <input type="file" class="form-control @error('image5') is-invalid @enderror" name="image5" id="image5"  onchange="previewImage()">
                                <div class="invalid-feedback">
                                    @error('image5')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="desc5" class="form-label">Desc Image</label>
                                <input type="text" class="form-control @error('desc5') is-invalid @enderror" id="desc5" name="desc5" value="{{ old('desc5')}}">
                                <div class="invalid-feedback">
                                    @error('desc5')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image6" class="form-label">Image 6</label>
                                <img class="img-preview5 img-fluid" style="width:400px; height:400px; display:none;" alt=""><br>
                                <input type="file" class="form-control @error('image6') is-invalid @enderror" name="image6" id="image6"  onchange="previewImage()">
                                <div class="invalid-feedback">
                                    @error('image6')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="desc6" class="form-label">Desc Image</label>
                                <input type="text" class="form-control @error('desc6') is-invalid @enderror" id="desc6" name="desc6" value="{{ old('desc6')}}">
                                <div class="invalid-feedback">
                                    @error('desc6')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="image7" class="form-label">Image 7</label>
                                <img class="img-preview6 img-fluid" style="width:400px; height:400px; display:none;" alt=""><br>
                                <input type="file" class="form-control @error('image7') is-invalid @enderror" name="image7" id="image7"  onchange="previewImage()">
                                <div class="invalid-feedback">
                                    @error('image7')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="desc7" class="form-label">Desc Image</label>
                                <input type="text" class="form-control @error('desc7') is-invalid @enderror" id="desc7" name="desc7" value="{{ old('desc7')}}">
                                <div class="invalid-feedback">
                                    @error('desc7')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price Per Version *</label>
                                <input type="text" class="form-control @error('price_ver') is-invalid @enderror" name="price_ver" id="price" required value="{{ old('price_ver')}}">
                                <div class="invalid-feedback">
                                    @error('price_ver')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="price_f" class="form-label">Price Full</label>
                                <input type="text" class="form-control @error('price_full') is-invalid @enderror" name="price_full" id="price_f"  value="{{ old('price_full')}}">
                                <div class="invalid-feedback">
                                    @error('price_full')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="rate" class="form-label">(*) Must Be Filled</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Insert</button>
                        </form>
                    </div>
                </div>
                <!-- Basic table card end -->
            </div>
            <!-- Page-body end -->
        </div>
    </div>

    <script>
        function previewImage (){
            const img1 = document.querySelector('#image1');
            const img2 = document.querySelector('#image2');
            const img3 = document.querySelector('#image3');
            const img4 = document.querySelector('#image4');
            const img5 = document.querySelector('#image5');
            const img6 = document.querySelector('#image6');
            const img7 = document.querySelector('#image7');
            const imgp1 = document.querySelector('.img-preview');
            const imgp2 = document.querySelector('.img-preview1');
            const imgp3 = document.querySelector('.img-preview2');
            const imgp4 = document.querySelector('.img-preview3');
            const imgp5 = document.querySelector('.img-preview4');
            const imgp6 = document.querySelector('.img-preview5');
            const imgp7 = document.querySelector('.img-preview6');

            
            const oFReader = new FileReader();
            oFReader.readAsDataURL(img1.files[0]);
            
            oFReader.onload = function(oFREvent){
                imgp1.src = oFREvent.target.result;
            }

            imgp1.style.display = 'block';

            const oFReader1 = new FileReader();
            oFReader1.readAsDataURL(img2.files[0]);
            
            oFReader1.onload = function(oFREvent){
                imgp2.src = oFREvent.target.result;
            }

            imgp2.style.display = 'block';

            const oFReader2 = new FileReader();
            oFReader2.readAsDataURL(img3.files[0]);
            
            oFReader2.onload = function(oFREvent){
                imgp3.src = oFREvent.target.result;
            }

            imgp3.style.display = 'block';

            const oFReader3 = new FileReader();
            oFReader3.readAsDataURL(img4.files[0]);
            
            oFReader3.onload = function(oFREvent){
                imgp4.src = oFREvent.target.result;
            }

            imgp4.style.display = 'block';

            const oFReader4 = new FileReader();
            oFReader4.readAsDataURL(img5.files[0]);
            
            oFReader4.onload = function(oFREvent){
                imgp5.src = oFREvent.target.result;
            }

            imgp5.style.display = 'block';

            const oFReader5 = new FileReader();
            oFReader5.readAsDataURL(img6.files[0]);
            
            oFReader5.onload = function(oFREvent){
                imgp6.src = oFREvent.target.result;
            }

            imgp6.style.display = 'block';

            const oFReader6 = new FileReader();
            oFReader6.readAsDataURL(img7.files[0]);
            
            oFReader6.onload = function(oFREvent){
                imgp7.src = oFREvent.target.result;
            }

            imgp7.style.display = 'block';
        }

        $("#album").click(function() {
            $("#al").show();
            $("#ale").show();
            $("#alee").hide();
        });
        $("#akun").click(function() {
            $("#al").hide();
            $("#ale").hide();
            $("#alee").show();
        });
        








    </script>
    
@endsection 