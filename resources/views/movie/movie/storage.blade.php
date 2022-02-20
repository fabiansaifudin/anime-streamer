@extends('layouts.anime.app')

@section('title', 'Storage Movie')

@section('style')
<link href="{{ asset('module/filepond/dist/filepond.css') }}" rel="stylesheet" />
<link href="{{ asset('module/filepond-plugin-media-preview/dist/filepond-plugin-media-preview.css') }}" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
@endsection

@section('content')

@include('layouts.anime.header')
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">Movie</h4>
                        <div class="row mt-3">
                            <div class="mb-3 col-md-2">
                                <h5>Tambah Movie</h5>
                            </div>
                            <div class="mb-3 col-md-4">
                                <select id="inputState" class="form-control">
                                    <option disabled selected>Pilih judul film</option>
                                    @foreach ($movie as $select)
                                    <option value="{{ $select->id }}">{{ $select->judul_movie }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2" id="btnCover">
                                <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#uploadCover">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span>Upload Cover Anime</span>
                                </button>
                            </div>
                            <div class="col-md-2" id="button">
                                <button  class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#uploadVideo">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span>Upload Anime</span>
                                </button>
                            </div>
                        </div>
                        <div class="row row-cols-auto" id="row">
                            @foreach ($storage as $data)
                            <div class="col me-0">
                                <div class="card m-0" style="width: 10.5rem;">
                                    <img src="{{ url('/').$data->movie[0]->cover->cover }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $data->movie[0]->judul_movie }}</h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{-- <div class="row row-cols-auto">
                            @foreach ($movie as $data)
                            <div class="col me-0">
                                <div class="card m-0" style="width: 10.5rem;">
                                    @if (empty($data->cover->cover))
                                    <script>alert("Cover {{$data->judul_movie}} tidak ada tolong upload cover dulu")</script>
                                    @else
                                    <img src="{{ url('/').$data->cover->cover }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $data->judul_movie }}</h5>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="uploadCover" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Anime</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="uploadCoverForm" action="{{ route('coverUploadMovie') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="cover_post_id" id="cover_post_id">
                    @if (count($cover) == 0)
                    <input type="text" name="cover_id" id="cover_id" value="1" hidden>
                    @else
                    <input type="text" name="cover_id" id="cover_id" value="{{ $cover->last()->id+1 }}" hidden>
                    @endif
                    <div class="mb-3 row">
                        <label for="updateJudelAnime" class="form-label col-sm-3 col-form-label">Upload Cover</label>
                        <div class="col-sm-9">
                            <input type="file" name="cover" id="cover">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" style="color: white" class="btn btn-primary" data-bs-dismiss="modal" value="Upload">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Tambah data Anime&Movie Streaming online -->
<div class="modal fade" id="uploadVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Anime</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="uploadVideoForm" action="{{ route('movieUpload') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="post_id" id="post_id">
                    @if (count($storage) == 0)
                    <input type="text" name="id" id="id" value="1" hidden>
                    @else
                    <input type="text" name="id" id="id" value="{{ $storage->last()->id+1 }}" hidden>
                    @endif
                    <div class="mb-3 row">
                        <label for="updateJudelAnime" class="form-label col-sm-3 col-form-label">Upload Video</label>
                        <div class="col-sm-9">
                            <input type="file" name="video" id="video">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" style="color: white" class="btn btn-primary" data-bs-dismiss="modal" value="Upload">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('module/filepond/dist/filepond.js') }}"></script>
<script src="{{ asset('module/filepond-plugin-media-preview/dist/filepond-plugin-media-preview.js') }}"></script>
<script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
@if (Session::has('error'))
<script>
    $(function() {
        toastr.options.timeOut = 2000;
        toastr.error("{!! Session::get('error') !!}");
    });
</script>
@endif
@if (Session::has('message'))
<script>
    $(function() {
        toastr.options.timeOut = 2000;
        toastr.warning("{!! Session::get('message') !!}");
    });
</script>
@endif
@if (Session::has('success'))
<script>
    $(function() {
        toastr.options.timeOut = 2000;
        toastr.success("{!! Session::get('success') !!}");
    });
</script>
@endif
<script>
    var to = document.getElementById('inputState');
    btnCover = $('#btnCover');
    btnAdd = $('#button');
    btnCover.hide();
    btnAdd.hide();
    to.addEventListener('change', show);
    function show() {
        $('#row').html("");
        $.get("{{ route('findmovsto', '') }}"+to.value, function(movie) {
            if (movie.cover == null) {
                btnCover.show('slow');
                btnAdd.hide();
            } else {
                btnAdd.show('slow');
                btnCover.hide();
                console.log(movie);
                for (const store of movie.storage) {
                    $('#row').append(`<div class="col my-2 me-0">
                        <div class="card m-0" style="width: 10.5rem;">
                            <img src="{{ url('/') }}`+movie.cover.cover+`" class="card-img-top" alt="`+movie.judul_anime+`">
                            <div class="card-body">
                                <h6 class="card-title">`+movie.judul_anime+`</h6>
                            </div>
                        </div>
                    </div>`);
                }
            }
        })
        document.getElementById('cover_post_id').value = to.value;
        document.getElementById('post_id').value = to.value;
        // Get a reference to the file input element
        const inputCover = document.querySelector('input[name="cover"]');
        const inputVideo = document.querySelector('input[name="video"]');

        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginMediaPreview,
            FilePondPluginImageEdit,
            FilePondPluginFileValidateType
        );

        // Create a FilePond instance
        const cover = FilePond.create(inputCover, {
            acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
            fileValidateTypeDetectType: (source, type) =>
                new Promise((resolve, reject) => {
                    // Do custom type detection here and return with promise

                    resolve(type);
                }),
        });
        const video = FilePond.create(inputVideo, {
            acceptedFileTypes: ['video/mp4', 'video/avi', 'video/webm'],
            fileValidateTypeDetectType: (source, type) =>
                new Promise((resolve, reject) => {
                    // Do custom type detection here and return with promise

                    resolve(type);
                }),
        });
        FilePond.setOptions({
            server: {
                url: "{{route('upload')}}",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
        });
    }
    // const fileInput = document.querySelector("#file")
    // const upload = document.querySelector("#button")
    // upload.addEventListener('click', ()=>{
    //     swal({
    //         title: 'Apa kamu yakin?',
    //         text: 'Data yang anda hapus tidak dapat dikembalikan',
    //         icon: 'warning',
    //         buttons: true,
    //         dangerMode: true,
    //     }).then((willDelete) => {
    //         if (willDelete) {
    //             swal('Data berhasil dihapus', {
    //                 icon: 'success'
    //             });
    //         } else {
    //             swal('Menghapus data dibatalkan');
    //         }
    //     });
    // });
    // var divInputFile = document.createElement("iframe");
    // divInputFile.setAttribute("src", "{{asset('include/index.html')}}");
    // divInputFile.setAttribute("width", "100%");
    // divInputFile.setAttribute("height", "75");
    // swal({
    //     content: divInputFile,
    // });
</script>
@endsection
