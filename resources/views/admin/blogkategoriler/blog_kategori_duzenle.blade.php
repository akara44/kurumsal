@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Blog Kategori Düzenle</h4>

                        <form method="POST" action="{{ route('blog.kategori.guncelle') }}" class="mt-6 space-y-6">
                            @csrf

                            <input type="hidden" name="id" value="{{ $BlogKategoriDuzenle->id }}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Kategori Adı</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Kategori Adı" name="kategori_adi" id="example-text-input" value="{{ $BlogKategoriDuzenle->kategori_adi }}">
                                    @error('kategori_adi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Sıra Numarası</label>
                                <div class="col-sm-10">
                                    <div class="col-sm-12 form-group">
                                        <input class="form-control" name="sirano" type="number" placeholder="Sıra No" value="{{ $BlogKategoriDuzenle->sirano }}">
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Blog Kategori Güncelle">
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
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>
@endsection
