@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">AltKategori Ekle</h4>

                        <form method="post" action="{{ route('altkategori.ekle.form') }}" enctype="multipart/form-data" id="myForm">
                            @csrf

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Kategori Seç</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="kategori_id">
                                        <option selected="">Kategori Seç</option>
                                        @foreach($kategorigoster as $kategoriler)
                                            <option value="{{ $kategoriler->id }}">{{ $kategoriler->kategori_adi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Alt Kategori Adı</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="altkategori_adi" type="text" placeholder="Alt Kategori Adı">
                                    @error('altkategori_adi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Anahtar</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="anahtar" type="text" placeholder="Anahtar">
                                    @error('anahtar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Açıklama</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" name="aciklama" type="text" placeholder="Açıklama">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2">Resim</label>
                                <div class="col-sm-10 form-group">
                                    <input type="file" name="resim" id="resim" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" src="{{ url('upload/resim-yok.png') }}" alt="" id="resimGoster">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Alt Kategori Ekle">
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#resim').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#resimGoster').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                altkategori_adi: {
                    required: true,
                },
                anahtar: {
                    required: true,
                },
                aciklama: {
                    required: true,
                },
                resim: {
                    required: true,
                },
            },
            messages: {
                altkategori_adi: {
                    required: 'Alt Kategori adı giriniz',
                },
                anahtar: {
                    required: 'Anahtar giriniz',
                },
                aciklama: {
                    required: 'Açıklama giriniz',
                },
                resim: {
                    required: 'Resim giriniz',
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>
@endsection
