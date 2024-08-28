@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Bloglar</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Blog Kategori Liste</h4>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Kategori Adı</th>
                                    <th>Durum</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($blogliste as $bloglar)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <th>{{ $bloglar->kategori_adi }}</th>
                                    <th>
                                        <input type="checkbox" class="icerikler" data-id="{{ $bloglar->id }}" id="{{ $bloglar->id }}" switch="success" {{ $bloglar->durum ? 'checked' : '' }}> 
                                        <label for="{{ $bloglar->id }}" data-on-label="Yes" data-off-label="No"></label>
                                    </th>
                                    <th>
                                        <a href="{{ route('urun.duzenle', $bloglar->id) }}" class="btn btn-info sm m-2" title="Düzenle"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('urun.sil', $bloglar->id) }}" class="btn btn-danger sm" title="Sil" id="sil"><i class="fas fa-trash-alt"></i></a>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>
@endsection