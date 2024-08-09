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
                        <h4 class="card-title">Ürün Düzenle</h4>
                        <form method="post" action="{{ route('urun.guncelle.form') }}" enctype="multipart/form-data" id="myForm">
                            @csrf

                            
                                     <input type="hidden" name="id" value="{{ $urunler->id }}">
                                     <input type="hidden" name="onceki_resim" value="{{ $urunler->resim }}">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Başlık</label>
                                            <div class="col-sm-12 form-group">
                                                <input class="form-control" name="baslik" type="text" placeholder="Başlık" value="{{ $urunler->baslik }}">
                                                @error('baslik')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Tag</label>
                                            <div class="col-sm-12 form-group">
                                                <input class="form-control" name="tag" type="text" data-role="tagsinput" value="{{ $urunler->tag }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-12 form-group">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Metin</label>
                                                <textarea name="metin" id="elm1" type="text">{{ $urunler->metin }}</textarea>
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
                                                        <option value="{{ $kategori->id }}" {{ $kategori->id == $urunler->kategori_id ? 'selected' : '' }}>{{ $kategori->kategori_adi }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Alt Kategori Adı</label>
                                            <div class="col-sm-12 form-group">
                                                <select class="form-select" aria-label="default select example" name="altkategori_id">
                                                     
                                                <option></option>
                                                @foreach($altkategoriler as $altkategori)
                                                <option value="{{ $altkategori->id }}" {{ $altkategori->id == $urunler->altkategori_id ? 'selected' : '' }}>{{ $altkategori->altkategori_adi }}</option>
                                                @endforeach
                                                </select>
                                                @error('altkategori_adi')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Sıra No</label>
                                            <div class="col-sm-12 form-group">
                                                <input class="form-control" name="sirano" type="number" placeholder="Sıra No" value="{{ $urunler->sirano }}">
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
                                                    <img class="rounded avatar-lg" src="{{ (!empty($urunler->resim)) ? url($urunler->resim): url('upload/resim-yok.png') }}" alt="" id="resimGoster">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Anahtar</label>
                                            <div class="col-sm-12 form-group">
                                                <input class="form-control" name="anahtar" type="text" placeholder="Anahtar" value="{{ $urunler->anahtar }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-form-label">Açıklama</label>
                                            <div class="col-sm-12 form-group">
                                                <input class="form-control" name="aciklama" type="text" placeholder="Açıklama" value="{{ $urunler->aciklama }}">
                                            </div>
                                        </div>
                                    </div>

                                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Ürün Düzenle">
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
                altkategori_id: {
                    required: true,
                },
                sirano: {
                    required: true,
                },
            },
            messages: {
                altkategori_id: {
                    required: 'Alt Kategori Seçiniz.',
                },
                sirano: {
                    required: 'Sıra No Giriniz.',
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
   
<script>
     $(document).ready(
        function(params) {
            $('select[name="kategori_id"]').on('change', function() {
                var kategori_id = $(this).val();
                if (kategori_id) {
                    $.ajax({
                        url: "{{ url('/altkategoriler/ajax') }}/" + kategori_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="altkategori_id"]').html('');
                            var alt = $('select[name="altkategori_id"]').empty();
                            $.each(data,function(key, value) {
                                $('select[name="altkategori_id"]').append('<option value="'+ value.id +'"> '+ value.altkategori_adi +'</option>');
                            });
                        },
                    });
                }else{
                    alert('danger');
                }
            })
    })
</script>
@endsection
