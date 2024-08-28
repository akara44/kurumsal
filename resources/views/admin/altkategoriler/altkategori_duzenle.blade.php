@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Alt Kategori Düzenle</h4>
                        
                        <form method="POST" action="{{ route('alt.guncelle') }}" class="mt-6 space-y-6" id="myForm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $altkategoriler->id }}">
                            <input type="hidden" name="onceki_resim" value="{{ $altkategoriler->resim }}">

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Kategori Seç</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="kategori_id">
                                        <option selected="">Kategori Seç</option>
                                        @foreach($kategoriler as $kategori)
                                            <option value="{{ $kategori->id }}" {{ $kategori->id == $altkategoriler->kategori_id ? 'selected' : '' }}>
                                                {{ $kategori->kategori_adi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="altkategori_adi" class="col-sm-2 col-form-label">Alt Kategori Adı</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" type="text" placeholder="Alt Kategori Adı" name="altkategori_adi" value="{{ $altkategoriler->altkategori_adi }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="anahtar" class="col-sm-2 col-form-label">Anahtar</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" type="text" placeholder="Anahtar" name="anahtar" value="{{ $altkategoriler->anahtar }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="aciklama" class="col-sm-2 col-form-label">Açıklama</label>
                                <div class="col-sm-10 form-group">
                                    <input class="form-control" type="text" placeholder="Açıklama" name="aciklama" value="{{ $altkategoriler->aciklama }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="resim" class="col-sm-2 col-form-label">Resim</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="resim" id="resim">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="resimGoster" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" src="{{ !empty($altkategoriler->resim) ? url($altkategoriler->resim) : url('upload/resim-yok.png') }}" alt="" id="resimGoster">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Kategori Güncelle">
                        </form>
                    </div>
                </div>
            </div> 
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
