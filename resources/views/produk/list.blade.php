@extends('layouts/master')

@section('title', 'Produk List')

@section('heading')
    
@endsection

@section('content')
<button type="button" id="deleteAllChecked" disabled onclick="nonAktifkan()" class="d-none d-sm-inline-block btn btn-m btn-danger shadow-sm mb-3" style="float: right;">
    <i class="fas fa-trash-alt fa-sm text-white-50"></i>  Hapus Pilihan</button>
<a href="{{ route('produk-tambah') }}" class="d-none d-sm-inline-block btn btn-m btn-info shadow-sm mb-3 mr-2" style="float: right;">
    + Tambah Produk</a>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">Berikut adalah daftar produk dari perusahaan. Anda diberikan fitur untuk dapat menambahkan, mengurangi, serta menghapus produk.</p>

        <!-- DataTables Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                <h6 class="m-0 font-weight-bold text-primary d-flex">List Produk</h6>
                    @include('layouts/navbar_atas')
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="head_cb"></th>
                                <th class="border-top-0" style="text-align: center">No</th>
                                <th class="border-top-0" style="text-align: center">Supplier</th>
                                <th class="border-top-0" style="text-align: center">Kode Barang</th>
                                <th class="border-top-0" style="text-align: center">Kategori</th>
                                <th class="border-top-0" style="text-align: center">Nama Barang</th>
                                <th class="border-top-0" style="text-align: center">Stok</th>
                                <th class="border-top-0" style="text-align: center">Satuan</th>
                                <th class="border-top-0" style="text-align: center">Harga Beli</th>
                                <th class="border-top-0" style="text-align: center">Harga Jual</th>
                                <th class="border-top-0" style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th class="border-top-0" style="text-align: center">No</th>
                                <th class="border-top-0" style="text-align: center">Supplier</th>
                                <th class="border-top-0" style="text-align: center">Kode Barang</th>
                                <th class="border-top-0" style="text-align: center">Kategori</th>
                                <th class="border-top-0" style="text-align: center">Nama Barang</th>
                                <th class="border-top-0" style="text-align: center">Stok</th>
                                <th class="border-top-0" style="text-align: center">Satuan</th>
                                <th class="border-top-0" style="text-align: center">Harga Beli</th>
                                <th class="border-top-0" style="text-align: center">Harga Jual</th>
                                <th class="border-top-0" style="text-align: center">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($produk as $item)                    
                            <tr>
                                <td><input type="checkbox" class="cb_child" value="{{ $item->id }}"></td>
                                <td>{{ $loop->index + 1}}</td>
                                <td>{{ $item->supplier->nama_supplier }}</td>
                                <td>{{ $item->kode }}</td>
                                <td>{{ $item->category->category_name }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->stok }}</td>
                                <td>{{ $item->satuan->satuan }}</td>
                                <td style="text-align: right">Rp.{{ $item->harga_beli }}</td>
                                <td style="text-align: right">Rp.{{ $item->harga_jual }}</td>
                                <td width="160px">
                                    <form action="{{ route('produk-delete', $item->id) }}" method="POST">
                                        <div class="" role="group" aria-label="Basic example">
                                        @csrf
                                        <a type="button" class="btn btn-success" href="{{ route('produk-edit', $item->id) }}">Edit</a>
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('apakah kamu yakin menghapus data ini ?')">Hapus</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
            </div>
            </div>
        </div>

        @section('js')
        <script src="{{ asset('assets/datatables/datatables.min.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#table').DataTable();
            });

            let isChecked = 0;
            const table = $('#table').DataTable({
                "processing": true,
                "order": [[ 1, 'asc']],     
                    

                columnDefs: [
                {
                    "targets": 0,
                    "class":"text-nowrap",
                    "sortable": false,
                },
                {
                    "targets": 10,
                    "sortable": false,
                },
                ]
            })

            // JQUERY DETECT CHECKED CHECKBOX
            // $(this)->elemen yang dimaksud untuk diambil atau digunakan
            $("#head_cb").on('click', function(){
                var isChecked = $('#head_cb').prop('checked')
                $('.cb_child').prop('checked', isChecked)
                
                // STEP PER STEP
                // if($(this).prop('checked') == true){
                //     $('.cb_child').prop('checked', true)
                // }else{
                //     $('.cb_child').prop('checked', false)
                // }

                $('#deleteAllChecked').prop('disabled', !isChecked)
            })

            $('#table tbody').on('click', '.cb_child', function(){                
                if($(this).prop('checked') != true){
                    $('#head_cb').prop('checked', false)
                }

                let allChecked = $('#table tbody .cb_child:checked')
                let button_non_aktif_status = (allChecked.length>0)
                $('#deleteAllChecked').prop('disabled', !button_non_aktif_status)
            })

            function nonAktifkan(){
                let checkbox_terpilih = $('#table tbody .cb_child:checked')
                let all_ids = []
                $.each(checkbox_terpilih, function(index,elm){
                    all_ids.push(elm.value);
                })
                $.ajax({
                    url: "{{ route('produk-delete-checked') }}",
                    method: 'post',
                    data: {ids:all_ids},
                    success:function(){
                        location.reload(true);
                    }
                })
            }
        </script>
            
        @endsection
@endsection