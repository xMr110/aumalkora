@extends('admin.layouts.app')

@section('title')
    Jobs
@endsection

@section('bread')
    <li class="breadcrumb-item active">Jobs</li>
@endsection
@section('style')
    <link href="/assets/backend/css/pages/user-card.css" rel="stylesheet">
@endsection


@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if(!count($jobs))
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="text-danger">You Did,t Add Any Job Yet.. </h1><br>
                                    <a href="{{action('Admin\JobController@create')}}"><h4><i class="mdi mdi-plus"></i>Add</h4></a>
                                </div>
                            </div>
                        </div>
                    @else
                        <h4 class="card-title">Manage Jobs</h4>
                        <div class="table-responsive m-t-40">
                            <table id="table" class="table display table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($jobs as $job)
                                    <tr>
                                        <td>{{$job->id}}</td>
                                        <td>{{str_limit($job->translate('en')->title,10) }}</td>
                                        <td>{{str_limit($job->translate('en')->description,50) }}</td>
                                        <td>{{str_limit($job->translate('en')->name,10) }}</td>
                                        <td>{{$job->code }}</td>
                                        <td>
                                            <a href="{{ action('Admin\JobController@edit', $job) }}" data-toggle="tooltip"
                                               data-original-title="Edit"> <i
                                                        class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                            <a href="#" data-toggle="tooltip" data-delete data-original-title="Delete"> <i
                                                        class="fa fa-trash text-danger"></i> </a>
                                            <form method="post"
                                                  action="{{ action('Admin\JobController@destroy', $job) }}"
                                                  id="delete">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- This is data table -->
    <script src="/assets/backend/js/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });

    </script>
@endsection
