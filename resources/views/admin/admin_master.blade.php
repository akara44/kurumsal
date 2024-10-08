<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Dashboard | Upcube - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">

        <!-- jquery.vectormap css -->
        <link href="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <!-- bildiri -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- bildiri -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body data-topbar="dark">
        <!-- Begin page -->
        <div id="layout-wrapper">
            <!-- Header -->
            @include('admin.sabit.header')
            <!-- Header -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.sabit.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                @yield('admin')
                <!-- End Page-content -->

                <!-- Footer -->
                @include('admin.sabit.footer')
                <!-- Footer -->
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>

        <!-- apexcharts -->
        <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <!-- jquery.vectormap map -->
        <script src="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Responsive examples -->
        <script src="{{ asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

        <script src="{{ asset('backend/assets/js/pages/dashboard.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('backend/assets/js/app.js') }}"></script>

        <!-- Datatable init js -->
        <script src="{{ asset('backend/assets/js/pages/datatables.init.js') }}"></script>

        <!-- bildiri -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
        @if(Session::has('bildirim'))
        var type = "{{ Session::get('alert-type', 'info') }}"

        switch(type) {
            case 'info':
                toastr.info(" {{ Session::get('bildirim') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('bildirim') }} ");
                break;
            case 'warning':
                toastr.warning(" {{ Session::get('bildirim') }} ");
                break;
            case 'error':
                toastr.error(" {{ Session::get('bildirim') }} ");
                break;
        }
        @endif
        </script>
        <!-- bildiri -->

        <!-- sweetalert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="{{ asset('backend/assets/js/sweet.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- validate -->
        <script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>

        <!-- tinymce js -->
        <script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>

        <!-- init js -->
        <script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }}"></script>

        <script>
        $(document).ready(function(){
            $('#myform').validate({
                rules: {
                    kategori_adi: { required: 'Kategori Adı Giriniz.' },
                    anahtar: { required: 'Anahtar Giriniz' },
                    aciklama: { required: 'Açıklama Giriniz' },
                    resim: { required: 'Resim Giriniz' },
                    baslik: { required: 'Başlık Giriniz' },
                },
                messages: {
                    kategori_adi: { required: true },
                    anahtar: { required: true },
                    aciklama: { required: true },
                    resim: { required: true },
                    baslik: { required: true },
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
        </script>

        <!-- <script>
        $(function() {
            $('.urunler').change(function(){
                var durum = $(this).prop('checked') == true ? 1 : 0;
                var urun_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/urun/durum',
                    data: {'durum': durum, 'urun_id': urun_id},
                    success: function(data){
                        console.log(data.success);
                    }
                });
            });
        });
        </script>

        
        <script>
        $(function() {
            $('.icerikler').change(function(){
                var durum = $(this).prop('checked') == true ? 1 : 0;
                var urun_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/blog/kategori/durum',
                    data: {'durum': durum, 'urun_id': urun_id},
                    success: function(data){
                        console.log(data.success);
                    }
                });
            });
        });
        </script>

        <script>
        $(function() {
            $('.altkategoriler').change(function(){
                var durum = $(this).prop('checked') == true ? 1 : 0;
                var urun_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/altkategoriler/durum',
                    data: {'durum': durum, 'urun_id': urun_id},
                    success: function(data){
                        console.log(data.success);
                    }
                });
            });
        });
        </script>   

        <script>
        $(function() {
            $('.kategoriler').change(function(){
                var durum = $(this).prop('checked') == true ? 1 : 0;
                var urun_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/kategori/durum',
                    data: {'durum': durum, 'urun_id': urun_id},
                    success: function(data){
                        console.log(data.success);
                    }
                });
            });
        });
        </script> -->

        <script>
    $(function() {
        function handleCheckboxChange(className, url) {
            $(className).change(function(){
                var durum = $(this).prop('checked') ? 1 : 0;
                var urun_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: url,
                    data: {'durum': durum, 'urun_id': urun_id},
                    success: function(data){
                        console.log(data.success);
                    }
                });
            });
        }
        // Kullanım
        handleCheckboxChange('.urunler', '/urun/durum');
        handleCheckboxChange('.icerikler', '/blog/kategori/durum');
        handleCheckboxChange('.altkategoriler', '/altkategoriler/durum');
        handleCheckboxChange('.kategoriler', '/kategori/durum');
        handleCheckboxChange('.metinler', '/blog/icerik/durum');
    });
</script>
    </body>
</html>
