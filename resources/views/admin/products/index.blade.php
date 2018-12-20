@extends('admin.layouts.app')

@section('title')
    Products
    @endsection

@section('bread')
    <li class="breadcrumb-item active">Products</li>
@endsection
@section('style')
    <link href="/assets/backend/css/pages/user-card.css" rel="stylesheet">
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12">
               <div class="card">
                   <div class="card-body">
                       <h4 class="card-title">Products Table</h4>
                       @if(!count($products))
                           <h1 class="text-danger">You didn't Add Any Products Yet..</h1><br>
                       @else
                           <div class="table-responsive m-t-40">
                               <table id="Rtable" class="table table-bordered table-striped">
                                   <thead>
                                   <tr>
                                       <th>Title</th>
                                       <th>Description</th>
                                       <th>Price</th>
                                       <th>Quantity</th>
                                       <th>Image</th>
                                       <th>Action</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   @foreach($products as $product)
                                           <tr>
                                               <td>{{$product->title}}</td>
                                               <td>{{strip_tags(str_limit($product->description,15))}}</td>
                                               <td>{{$product->price}}</td>
                                               <td>{{$product->quantity}}</td>
                                               <td><img src="{{'/storage/'.$product->image_path}}" width="40px" alt=""></td>
                                               <td>
                                                   <a href="{{ action('Admin\ProductController@edit', $product) }}" data-toggle="tooltip"
                                                                                                                    data-original-title="تعديل"> <i
                                                               class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                   <a class="btn default btn-outline"
                                                      href="javascript:void(0);" data-editable
                                                      data-action="{{ action('Admin\ProductController@active', $product) }}"><i
                                                               class="mdi {{ $product->active ? 'mdi-eye-off' : 'mdi-eye' }}"></i></a>
                                                 <a class="btn default btn-outline" data-delete href="javascript:void(0);"><i
                                                                   class="icon-trash"></i></a>
                                                       <form action="{{ action('Admin\ProductController@destroy', $product) }}"
                                                             method="post" id="delete">
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
            $('#Rtable').DataTable();
        });


    </script>
@endsection