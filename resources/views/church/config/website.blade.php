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
                    <div class="live-preview">
                        <form action="{{ route('storeconfigweb') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
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
                                        <label for="sys_desc" class="form-label">System Description</label>
                                        <textarea class="form-control" name="sys_desc" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3" style="margin-bottom:20px;">
                                <div class="col-lg-6">
                                    <div>
                                        <label for="icon" class="form-label">Icon</label>
                                        <div class="d-flex align-items-center">
                                            <input type="file" class="form-control" id="icon" name="icon" aria-describedby="icon" aria-label="Upload">
                                            {{-- <input type="file" id="input-file-now-custom-2" name="picture_1" style="margin-bottom:5px;" /> --}}
                                            <button class="btn btn-outline-success" type="button" id="icon_review">Review</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div>
                                        <label for="logo" class="form-label">Logo</label>
                                        <div class="d-flex align-items-center">
                                            <input type="file" class="form-control" id="logo" name="logo" aria-describedby="logo" aria-label="Upload">
                                            <button class="btn btn-outline-success" type="button" id="logo_review">Review</button>
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
