@extends('layouts.master')
@section('title') Konfigurasi  @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Konfigurasi @endslot
        @slot('title') Konfigurasi Jam  @endslot
    @endcomponent

    <!-- Start Content -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Data Konfigurasi</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <form class="row g-3" action="{{ route('store.configatt') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-lg-12">
                                <p class="text-muted">Input nilai dalam satuan Menit sebagai range toleransi jam kehadiran.</p>
                                <div class="input-group">
                                    <input type="number" class="form-control" 
                                        aria-label="Recipient's username" aria-describedby="basic-addon2" name="check_in_before" value="{{ $data->check_in_before }}">
                                    <span class="input-group-text" id="basic-addon2">Menit</span>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="text-end">
                                    <button type="reset" class="btn btn-light">Reset</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                            <!--end col-->
                        </form>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <!-- End Content -->
@endsection

@section('script')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
