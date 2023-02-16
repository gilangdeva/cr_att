@extends('layouts.master')
@section('title')
    @lang('translation.basic-elements')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Forms
        @endslot
        @slot('title')
            Konfigurasi Website
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Konfigurasi Website</h4>
                    <div class="flex-shrink-0"></div>
                </div>
                <!-- end card header -->
                <div class="card-body">
                <form action="{{ route('storeconfigweb') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="live-preview">
                        <div>
                            <div class="row g-3" style="margin-bottom:20px;">
                                <div class="col-lg-4">
                                    <div>
                                        <label for="sys_name" class="form-label">System Name</label>
                                        <input type="text" class="form-control" name="sys_name" placeholder="Enter System Name" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div>
                                        <label for="sys_surname" class="form-label">System Surname</label>
                                        <input type="text" class="form-control" name="sys_surname" placeholder="Enter Surname" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div>
                                        <label for="footname" class="form-label">Footname</label>
                                        <input type="text" class="form-control" name="footname" placeholder="Enter Footname" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3" style="margin-bottom:20px;">
                                <div class="col-lg-12">
                                    <div>
                                        <label for="exampleFormControlTextarea5" class="form-label">System Description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea5" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3" style="margin-bottom:20px;">
                                <div class="col-lg-6">
                                    <div>
                                        <label for="icon_field" class="form-label">Icon</label>
                                        <div class="d-flex align-items-center">
                                            <input type="file" class="form-control" id="icon_field" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                            <button class="btn btn-outline-success" type="button" id="inputGroupFileAddon04">Review</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div>
                                        <label for="logo_field" class="form-label">Logo</label>
                                        <div class="d-flex align-items-center">
                                            <input type="file" class="form-control" id="logo_field" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                            <button class="btn btn-outline-success" type="button" id="inputGroupFileAddon04">Review</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" style="margin-bottom:20px;">
                                <div class="col-sm-12 text-end">
                                    <button type="submit" class="btn btn-light">Reset</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
