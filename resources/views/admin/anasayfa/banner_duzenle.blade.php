@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> <!-- end row -->
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Banner Düzenle</h4>

                        <form method="POST" action="{{ route('banner.guncelle') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $homebanner->id }}">
                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Başlık</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Başlık" name="baslik" id="example-text-input" value="{{ $homebanner->baslik }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Alt Başlık</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Alt Başlık" name="alt_baslik" id="example-text-input" value="{{ $homebanner->alt_baslik }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Url</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="url" placeholder="Url" name="url" id="example-text-input" value="{{ $homebanner->url }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Video Url</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="url" placeholder="Video Url" name="video_url" id="example-text-input" value="{{ $homebanner->video_url }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Resim</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="resim" id="resim" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" src="{{ (!empty($homebanner->resim)) ? url($homebanner->resim) : url('upload/resim-yok.png') }}" alt="" id="resimGoster">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Güncelle">
                        </form>
                        <!-- end row -->
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
@endsection
