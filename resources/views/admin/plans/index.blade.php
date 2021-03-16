@extends('admin.layouts.dashboard')

@section('title', 'Plans')

@section('classPlan')
    class="active active-menu"
@endsection

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            @include('admin.alerts.alert')
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Plan Lists</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <a href="{{route('admin.plan.create')}}" class="btn btn-primary">Add Plan</a>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="table-view">
                                <table class="data-tables table movie_table" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th style="width: 5%;">ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th style="width: 15%;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($plans as $plan)
                                        <tr>
                                            <td>{{$plan->id}}</td>
                                            <td>{{$plan->name}}</td>
                                            <td>{{$plan->description}}</td>
                                            <td>{{$plan->price}} / {{$plan->currency}}</td>
                                            <td>
                                                <div class="flex align-items-center list-user-action">
                                                    <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{route('admin.plan.delete', $plan->id)}}"><i class="ri-delete-bin-line"></i></a>
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
