@extends('admin.layouts.dashboard')

@section('title', 'Social Media')

@section('settings')
    class="active active-menu"
@endsection

@section('showsSettings', 'show')

@section('showSocial')
    class="active"
@endsection

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Social Media</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{route('admin.settings.update.general')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="table-responsive">
                                            <table>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="url" name="facebook_url" class="form-control" id="facebook_url" value="{{old('', $social->facebook_url)}}">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('admin/js/input-file.min.js')}}"></script>
    <script>
        new InputFile({
            buttonText: 'Choose files'
        });
    </script>
@endsection
