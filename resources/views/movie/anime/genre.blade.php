@extends('layouts.anime.app')

@section('title', 'Genre Anime')

@section('style')

<style>
    .action {
        font-size: 14pt;
    }
    .genre {
        overflow: hidden;
        margin-bottom: 5px;
        border: 2px solid;
        border-color:blue;
        background-color:transparent;
        width:fit-content;
        height:25px;
        text-align: center;
        color:blue;
        border-radius:7px;
    }
    .text-genre {
        font-size:12px;
        letter-spacing:0;
        margin-left: 10px;
        margin-right: 10px;
    }
    #button {
        position: relative;
        display: inline-block;
        margin: 10px 0;
        color: #fff;
        font-size: 16px;
        width: 6rem;
    }
    #button:focus {
        box-shadow: none;
    }
    .star {
        color: yellow;
        font-size: 18pt;
    }
    a:hover,
    a:focus {
        text-decoration: none;
        outline: none
    }
    .pagination {
        width: fit-content;
        display: inline-flex;
        position: relative;
        overflow: hidden;
        font-family: 'Poppins', sans-serif;
        border-radius: 50px;
        background: #fff;
    }
    .pagination li a.page-link {
        border: none;
        height: 45px;
        width: 45px;
        line-height: 35px;
        border-radius:50%;
        color: #20B2AA;
        text-align: center;
        padding: 6px 0 0 0;
        font-size: 20px;
        font-weight: 700;
        position: relative;
        overflow: hidden;
        letter-spacing: 1px;
        text-transform: uppercase;
        z-index: 1;
        margin: 0 8px 0 0;
    }

    .pagination li a.page-link:before,
    .pagination li:first-child a.page-link:before,
    .pagination li:last-child a.page-link:before {
        content:"";
        position: absolute;
        top:0;
        left:0;
        width: 100%;
        height: 100%;
        border: 2px solid #fff;
        border-radius:50%;
        opacity: 0;
        transform:scaleY(0);
        transition:all 0.3s ease 0s;
    }
    .pagination li a.page-link:hover:before,
    .pagination li.active a.page-link:before {
        opacity: 1;
    }
    .pagination li:last-child a.page-link {
        margin-right: 0;
    }
    .pagination li.active a.page-link,
    .pagination li a.page-link:hover,
    .pagination li.active a.page-link:hover {
        color: #fff;
        background: #20B2AA;
        border:none;
    }
</style>
@endsection

@section('content')

@include('layouts.anime.header')

<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20">Kategori Anime</h4>
                        <button id="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAnimeGenreModal">
                            <i class="ti-plus"></i>
                            <span>Add</span>
                        </button>
                        <div class="row mt-3">
                            <div class="mb-3 col-md-4">
                                <select id="inputState" class="form-control">
                                    <option disabled selected>All Anime Genre</option>
                                    @foreach ($anime as $select)
                                    <option value="{{ $select->id }}">{{ $select->judul_anime }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <table id="dataTableGenre" class="table table-striped mT-15 table-hover" cellspacing="0">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Judul Anime</th>
                                    <th scope="col">Genre</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anime as $data)
                                <tr id="sid{{ $data->id }}">
                                    <th scope="row">{{ $data->judul_anime }}</th>
                                    <td>
                                        <div class="row row-cols-auto">
                                            @foreach ($data->genre as $genre)
                                            <div class="col col-genre">
                                                <div class="genre">
                                                    <span class="text-genre">{{$genre->genre}}</span>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- @if (isset($anime) && $anime->lastPage() > 1)
                        <nav style="float: right">
                            <ul class="pagination">
                                @php
                                $interval = isset($interval) ? abs(intval($interval)) : 3 ;
                                $from = $anime->currentPage() - $interval;
                                if($from < 1){
                                    $from = 1;
                                }

                                $to = $anime->currentPage() + $interval;
                                if($to > $anime->lastPage()){
                                    $to = $anime->lastPage();
                                }
                                @endphp

                                @if ($anime->currentPage() > 1)
                                <li class="page-item">
                                    <a href="{{ $anime->url($anime->currentPage() - 1) }}" class="page-link" aria-label="Previous">
                                        <span aria-hidden="true"><i class="fas fa-angle-left"></i></span>
                                    </a>
                                </li>
                                @endif

                                @for ($i = $from; $i <= $to; $i++)
                                @php
                                $isCurrentPage = $anime->currentPage() == $i;
                                @endphp
                                <li class="page-item {{ $isCurrentPage ? 'active' : '' }}">
                                    <a href="{{ !$isCurrentPage ? $anime->url($i) : '#' }}" class="page-link">
                                        {{ $i }}
                                    </a>
                                </li>
                                @endfor

                                @if ($anime->currentPage() < $anime->lastPage())
                                <li class="page-item">
                                    <a href="{{ $anime->url($anime->currentPage() + 1) }}" class="page-link" aria-label="Next">
                                        <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </nav>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Tambah data Anime&Movie Streaming online -->
<div class="modal fade" id="addAnimeGenreModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Anime</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addModalAnimeForm" action="{{ route('saveGenre') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="post_id" id="post_id">
                    <div class="mb-3 row">
                        <label for="" class="form-label col-sm-3 col-form-label">Genre Anime</label>
                        <div class="col-sm-9">
                            <select class="form-select" aria-label="Default select example" name="genre[]" id="genreAnime" multiple required>
                                <option disabled selected>Select Genre</option>
                                @php
                                use App\Anime\Genre;
                                $genre = Genre::get();
                                foreach ($genre as $value) {
                                    echo "<option value='$value->id'>$value->genre</option>";
                                }
                                @endphp
                              </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" style="color: white" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
    $('#dataTableGenre').DataTable({paging: true});
    $('#dataTableGenre_info').remove();
    var to = document.getElementById('inputState');
    btnAdd = $('#button');
    btnAdd.hide();
    to.addEventListener('change', show);
    function show() {
        btnAdd.show('slow');
        document.getElementById('post_id').value = to.value;
        $('thead tr').html('<th scope="col">Judul Anime</th><th scope="col">Genre</th><th scope="col">Action</th>');
        $('tbody').html('');
        $.get("{{ route('findGenre', '') }}"+to.value, function (params) {
            // for (const par of params.genre) {
            //     $('tbody').append('<tr><th scope="row">'+params.judul_anime+'</th><td><div class="col col-genre"><div class="genre"><span class="text-genre">'+par.genre+'</span></div></div></td><td><a href="javascript:void(0);" class="action c-orange-500 swal-delete"><i class="ti-trash" data-toggle="tooltip" title="Delete"></i></a></td></tr>');
            // }

            $.get("{{ route('whereAnimeGenre', '') }}"+to.value, function (p) {
                // console.log(p[0]);
                // for (const par of params.genre) {
                //     $('tbody').append('<tr><th scope="row">'+params.judul_anime+'</th><td><div class="col col-genre"><div class="genre"><span class="text-genre">'+par.genre+'</span></div></div></td><td><a href="javascript:void(0);" class="action c-orange-500 swal-delete"><i class="ti-trash" data-toggle="tooltip" title="Delete"></i></a></td></tr>');
                // }
                for (let i = 0; i < params.genre.length; i++) {
                    $('tbody').append('<tr><th scope="row">'+params.judul_anime+'</th><td><div class="col col-genre"><div class="genre"><span class="text-genre">'+params.genre[i].genre+'</span></div></div></td><td><a href="javascript:void(0);" data-id="'+p[i].id+'" class="action c-orange-500 swal-delete"><form action="{{ route("deleteGenre", "") }}'+p[i].id+'" id="delete'+p[i].id+'" method="POST">@csrf @method("delete")<i class="ti-trash" data-toggle="tooltip" title="Delete"></i></form></a></td></tr>');
                }
                // <a href="#" data-id="" class="action c-orange-500 swal-delete"><form action="" id="delete" method="POST">@csrf @method('delete')<i class="ti-trash" data-toggle="tooltip" title="Delete"></i></form></a>
                $('.swal-delete').on('click', function() {
                    var id = (this.dataset.id);
                    swal({
                        title: 'Apa kamu yakin?',
                        text: 'Data yang anda hapus tidak dapat dikembalikan',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            swal('Data berhasil dihapus', {
                                icon: 'success'
                            });
                            $('#delete'+id).submit();
                        } else {
                            swal('Menghapus data dibatalkan');
                        }
                    });
                });
            });
        });
    }
</script>

@endsection
