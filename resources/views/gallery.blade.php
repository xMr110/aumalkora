@extends('layouts.app')
@section('title')
    Gallery
    @endsection

@section('style')
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/gallery.css') }}"  media="screen,projection"/>

    <style>
        #ninja-slider .caption {
            position:absolute;
            top:100%;
        }
        #ninja-slider .slider-inner {padding-bottom: 100px!important;}
        #ninja-slider li {margin-bottom: 100px!important;}
        #ninja-slider ul {overflow:visible!important;}
        #ninja-slider li {/*overflow:hidden;*/}
    </style>
@endsection
@section('content')
    <section class="photo-gallery">

        <div class="section-title center-align">
            <h1>Photos Gallery</h1>
        </div>
        <div class="container-fluid">

            <div class="row">
                <div style="display:none;">
                    <div id="ninja-slider">...(omitted for brevity)...</div>
                </div>

                @foreach($albums as $album)
                <div class="col l3 m6 s12">
                    <div class="gallery">
                        <div class="album_img">
                            <a target="_blank" class="Pass-Id modal-trigger"  data-id="{{$album}}"  href="#MyModal">
                                <img src="{{url('/storage/'.$album->image_path)}}" class="responsive-img"width="300" height="150">
                            </a>

                        </div>
                        <div class="desc">{{$album->title}}</div>
                    </div>
                </div>
                @endforeach
                <div id="MyModal" class="modal">
                    <div class="modal-content">
                        <h4 class="center-align" id="title"></h4>
                        <div class="row" id="Images" >

                                {{--<img src="{{url('/storage/'.$image->image_path)}} " class="responsive-img materialboxed" width="600" height="400">--}}
                                {{--<img src="' . url('/storage/'.$image->image_path) . '" class="responsive-img materialboxed" width="600" height="400">--}}
                            </div>

                        </div>
                        <!--<div class="modal-footer">
                          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
                        </div> -->
                    </div>
                </div>
            </div>

        <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Image preview</h4>
                    </div>
                    <div class="modal-body">
                        <img src="" id="imagepreview" style="width: 400px; height: 264px;" >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endsection


@section('script')

    <script>
        $("#pop").on("click", function() {
            $('#imagepreview').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
            $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
        });
    </script>
    <script>
        $(function(){
            $('.Pass-Id').click(function() {
                $.ajax({
                    url: '/gallery/{id}',
                    type: 'GET',
                    data: $(this).data('id'),
                    success: function(response)
                    {
                        $('#Images').html(response);
                    }
                });
            });
        });
    </script>

    <script>
        $('.Pass-Id').click(function () {
            // $('#description').attr('text',$(this).data('description').id)
            document.getElementById("title").innerText =$(this).data('id').title;

            // document.getElementById("description").innerText =   $(this).data('id').description;
        });
    </script>
@endsection