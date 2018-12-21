@extends('layouts.app')
@section('title')
    Gallery
    @endsection

@section('style')
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/gallery.css') }}"  media="screen,projection"/>
@endsection
@section('content')
    <section class="photo-gallery">
        <div class="section-title center-align">
            <h1>Photos Gallery</h1>
        </div>
        <div class="container-fluid">
            <div class="row">


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
                        <div class="row">

                            @foreach($album->images as $image)
                            <div class="col l3 m6 s12">
                                <img src="#" class="responsive-img materialboxed" width="300" height="200">
                            </div>
                                @endforeach


                        </div>
                        <!--<div class="modal-footer">
                          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
                        </div> -->
                    </div>
                </div>
            </div>


        </div>
    </section>

    @endsection

@section('script')


    <script>
        $('.Pass-Id').click(function () {
            // $('#description').attr('text',$(this).data('description').id)
            document.getElementById("title").innerText =$(this).data('id').title;

            // document.getElementById("description").innerText =   $(this).data('id').description;
        });
    </script>
@endsection