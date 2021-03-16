@extends('admin.layouts.dashboard')

@section('title', 'Categories')

@section('style')
    <link rel="stylesheet" href="{{asset('site/css/sweetalert2.min.css')}}">
@endsection

@section('categories')
    class="active active-menu"
@endsection

@section('CategoryShow', 'show')

@section('classCategoryList')
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
                                <h4 class="card-title">Category Lists</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <a href="{{route('admin.category.create')}}" class="btn btn-primary">Add Category</a>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            @include('admin.alerts.alert')
                            <div class="table-view">
                                <table class="data-tables table movie_table " style="width:100%">
                                    <thead>
                                    <tr>
                                        <th style="width:5%;">No</th>
                                        <th style="width:20%;">Name</th>
                                        <th style="width:30%;">Description</th>
                                        <th style="width:10%;">Videos</th>
                                        <th style="width:10%;">Show In Menu</th>
                                        <th style="width:5%;">Status</th>
                                        <th style="width:20%;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{$category->id}}</td>
                                                <td>{{$category->name}}</td>
                                                <td><p>{{$category->description}}</p></td>
                                                <td>{{count($category->videos)}}</td>
                                                <td>
                                                    <div class="custom-control custom-switch" data-value="{{$category->in_menu}}" data-id="{{$category->id}}">
                                                        <input type="checkbox" class="custom-control-input customSwitchClass" id="customSwitch{{$category->id}}" @if($category->in_menu == 1) checked @endif name="in_menu">
                                                        <label class="custom-control-label" for="customSwitch{{$category->id}}"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex align-items-center list-user-action">
                                                        @if($category->status == 1)
                                                            <span class="iq-bg-success" data-toggle="tooltip" data-placement="top" title="Active" data-original-title="Active"><i class="las la-check"></i></span>
                                                        @else
                                                            <span class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="UnActive" data-original-title="UnActive"><i class="las la-times"></i></span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex align-items-center list-user-action">
                                                        <a class="iq-bg-warning" data-toggle="tooltip" data-placement="top" title="View" data-original-title="View" href="#"><i class="lar la-eye"></i></a>
                                                        <a class="iq-bg-success" data-toggle="tooltip" data-placement="top" title="Edit" data-original-title="Edit" href="{{route('admin.category.edit', $category->id)}}"><i class="ri-pencil-line"></i></a>
                                                        <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete" href="{{route('admin.category.delete', $category->id)}}"><i class="ri-delete-bin-line"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('site/js/sweetalert2.all.min.js')}}"></script>
    <script>
        $(function () {
            $('.customSwitchClass').on('change', function () {
                if ($(this).parent().attr('data-value') === '1'){
                    var categoryId = $(this).parent().attr('data-id');
                    $.ajax({
                        type: 'post',
                        url: '{{route('admin.category.update.in.menu')}}',
                        data : {
                            '_token': "{{csrf_token()}}",
                            'id' : categoryId,
                            'in_menu' : 0
                        },
                        success: function (data) {
                            if(data.status === true){
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                })

                                Toast.fire({
                                    icon: 'success',
                                    title: 'In Menu Category Updated successfully'
                                })
                            }
                            $(this).parent().attr('data-value', '0');
                        }, error: function (reject) {
                        }
                    });
                }else if($(this).parent().attr('data-value') === '0'){
                    var categoryId = $(this).parent().attr('data-id');
                    $.ajax({
                        type: 'post',
                        url: '{{route('admin.category.update.in.menu')}}',
                        data : {
                            '_token': "{{csrf_token()}}",
                            'id' : categoryId,
                            'in_menu' : 1
                        },
                        success: function (data) {
                            if(data.status === true){
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                })

                                Toast.fire({
                                    icon: 'success',
                                    title: 'In Menu Category Updated successfully'
                                })
                            }
                            $(this).parent().attr('data-value', '1');
                        }, error: function (reject) {
                        }
                    });
                }
            });
        });
    </script>
@endsection
