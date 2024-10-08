@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
    .bootstrap-tagsinput .tag {
        margin-right: 3px;
        font-weight: 700;
        color: #228b22;
        padding: 3px;
    }
</style>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">İçerik Ekle</h4>
                        <form method="post" action="{{ route('blog.icerik.ekle.form') }}" enctype="multipart/form-data" id="myForm">
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlık</label>
                                            <div class="col-sm-12 form-group">
                                                <input class="form-control" name="baslik" type="text" placeholder="Başlık">
                                                @error('baslik')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Tag</label>
                                            <div class="col-sm-12 form-group">
                                                <input class="form-control" name="tag" type="text" data-role="tagsinput" value="Editör">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-12 form-group">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Mesaj</label>
                                                <textarea name="metin" id="elm1" type="text"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="row mb-3">
                                            <label class="col-form-label">Kategori Seç</label>
                                            <div class="col-sm-12">
                                                <select class="form-select" aria-label="Default select example" name="kategori_id">
                                                    <option selected="">Kategori Seç</option>
                                                    @foreach($kategoriler as $kategori)
                                                        <option value="{{ $kategori->id }}">{{ $kategori->kategori_adi }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Sıra No</label>
                                            <div class="col-sm-12 form-group">
                                                <input class="form-control" name="sirano" type="number" placeholder="Sıra No" value="1">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input">Resim</label>
                                            <div class="col-sm-12 form-group">
                                                <input type="file" name="resim" id="resim" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input"></label>
                                            <div class="col-sm-12">
                                                <img class="rounded avatar-lg" src="{{ url('upload/resim-yok.png') }}" alt="" id="resimGoster">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Anahtar</label>
                                            <div class="col-sm-12 form-group">
                                                <input class="form-control" name="anahtar" type="text" placeholder="Anahtar">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Açıklama</label>
                                            <div class="col-sm-12 form-group">
                                                <input class="form-control" name="aciklama" type="text" placeholder="Açıklama">
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-info waves-effect waves-light" value="İçerik Ekle">
                                </div>
                            </div>
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
                $('#resimGoster').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                sirano: {
                    required: true,
                },
                resim: {
                    required: true,
                },
            },
            messages: {
                sirano: {
                    required: 'Sıra No Giriniz.',
                },
                resim: {
                    required: 'Resim Seçiniz.',
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>
@endsection
