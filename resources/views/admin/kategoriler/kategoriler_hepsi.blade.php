@extends('admin.admin_master')

@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Tüm Kategoriler</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Kategoriler</h4>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sıra</th>
                                    <th>Kategori Adı</th>
                                    <th>Resim</th>
                                    <th>Durum</th>
                                    <th>İşlem</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php 
                                    $s = 1;
                                @endphp
                                @foreach($kategorihepsi as $kategoriler)
                                <tr>
                                    <th>{{ $s++ }}</th>
                                    <th>{{ $kategoriler->kategori_adi }}</th>
                                    <th>
                                        <img src="{{ (!empty($kategoriler->resim)) ? url($kategoriler->resim) : url('upload/resim-yok.png') }}" style="height: 50px; width: 50px;" alt="">
                                    </th>
                                    <th>
                                        <input type="checkbox" class="kategoriler" data-id="{{ $kategoriler->id }}" id="{{ $kategoriler->id }}" switch="success" {{ $kategoriler->durum ? 'checked' : '' }}> 
                                        <label for="{{ $kategoriler->id }}" data-on-label="Yes" data-off-label="No"></label>
                                    </th>
                                    <th>
                                        <a href="{{ route('kategori.duzenle', $kategoriler->id) }}" class="btn btn-info sm m-2" title="Düzenle"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('kategori.sil', $kategoriler->id) }}" class="btn btn-danger sm" title="Sil" id="sil"><i class="fas fa-trash-alt"></i></a>
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
