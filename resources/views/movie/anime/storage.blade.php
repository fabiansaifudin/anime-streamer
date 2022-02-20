@extends('layouts.anime.app')

@section('title', 'Storage Anime')

@section('style')
<link href="{{ asset('module/filepond/dist/filepond.css') }}" rel="stylesheet" />
<link href="{{ asset('module/filepond-plugin-media-preview/dist/filepond-plugin-media-preview.css') }}" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
@endsection

@section('content')

@include('layouts.anime.header')
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" display="none" aria-hidden="true" width="0" height="0" hidden>
  <defs>
    <symbol id="sprite-close" viewBox="0 0 24 24">
      <title>Remove chip</title>
      <path d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z"/>
    </symbol>
  </defs>
</svg>
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">Anime</h4>
                        <div class="row mt-3">
                            <div class="mb-3 col-md-2">
                                <h5>Tambah Anime</h5>
                            </div>
                            <div class="col-md-4">
                                <select id="inputState" class="form-control">
                                    <option disabled selected>Pilih judul anime</option>
                                    @foreach ($anime as $select)
                                    <option value="{{ $select->id }}">{{ $select->judul_anime }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2" id="btnCover">
                                <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#uploadCover">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span>Upload Cover Anime</span>
                                </button>
                            </div>
                            <div class="col-md-2" id="buttonAnime">
                                <button class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#uploadVideo">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span>Upload Anime</span>
                                </button>
                            </div>
                        </div>
                        <div class="row row-cols-auto" id="row">
                            @foreach ($storage as $data)
                            <div class="col my-2 me-0">
                                <div class="card m-0" style="width: 10.5rem;">
                                    <img src="{{ url('/').$data->anime[0]->cover->cover }}" class="card-img-top" alt="{{ $data->anime[0]->judul_anime }}">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $data->anime[0]->judul_anime }}</h6>
                                        <p>Episode {{ $data->episode }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        {{-- <div class="row row-cols-auto">
                            <div class="col my-2 me-0">
                                <div class="card m-0" style="width: 10.5rem;">
                                    <img src="https://cdn.myanimelist.net/images/anime/9/84460l.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h6 class="card-title">Card title</h6>
                                        <p>Episode 2</p>
                                    </div>
                                </div>
                            </div>
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
                <form id="uploadCoverForm" action="{{ route('coverUpload') }}" method="POST">
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
                <form id="uploadVideoForm" action="{{ route('animeUpload') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="post_id" id="post_id">
                    @if (count($storage) == 0)
                    <input type="text" name="id" id="id" value="1" hidden>
                    @else
                    <input type="text" name="id" id="id" value="{{ $storage->last()->id+1 }}" hidden>
                    @endif
                    <div class="mb-3 row">
                        <label for="updateJudelAnime" class="form-label col-sm-3 col-form-label">Episode</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="epsod" id="epsod" placeholder="Masukan episode" required/>
                        </div>
                    </div>
                    {{-- <input type="text" name="uploadcover" id="uploadcover" hidden> --}}
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
    btnAdd = $('#buttonAnime');
    btnCover.hide();
    btnAdd.hide();
    to.addEventListener('change', show);
    function show() {
        $('#row').html("");
        $.get("{{ route('findanisto', '') }}"+to.value, function(anime) {
            // console.log(anime);
            if (anime.cover == null) {
                btnCover.show('slow');
                btnAdd.hide();
            } else {
                btnCover.hide();
                btnAdd.show('slow');
                for (const store of anime.storage) {
                    $('#row').append(`<div class="col my-2 me-0">
                        <div class="card m-0" style="width: 10.5rem;">
                            <img src="{{ url('/') }}`+anime.cover.cover+`" class="card-img-top" alt="`+anime.judul_anime+`">
                            <div class="card-body">
                                <h6 class="card-title">`+anime.judul_anime+`</h6>
                                <p>Episode `+store.episode+`</p>
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
            acceptedFileTypes: ['video/mp4', 'video/avi', 'video/webm', '.mkv'],
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
