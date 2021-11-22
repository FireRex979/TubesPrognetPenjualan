@extends('layouts/master')

@section('title', 'First')

@section('content')
<h4 class="card-title">Contoh Tabel</h4>
        <div class="table-responsive">
            <table class="table user-table no-wrap">
                <thead>
                    <tr>
                        <th class="border-top-0">NO</th>
                        <th class="border-top-0">DATA BARANG</th>
                        <th class="border-top-0">JUMLAH</th>
                        <th class="border-top-0">HARGA</th>
                        <th class="border-top-0">KETERANGAN</th>
                        <th class="border-top-0">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border-top-0">1.</td>
                        <td class="border-top-0">XXXXXX</td>
                        <td class="border-top-0">100</td>
                        <td class="border-top-0">Rp.xxxxxx</td>
                        <td class="border-top-0">XXXXXX</td>
                        <td class="border-top-0">ACTION</td>
                    </tr>
                </tbody>
            </table>
        </div>
@endsection
