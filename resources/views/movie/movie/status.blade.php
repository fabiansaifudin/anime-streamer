@extends('layouts.anime.app')

@section('title', 'Status Movie')

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
        border-top-left-radius:20px;
        border-top-right-radius:20px;
        border-bottom-left-radius:20px;
        border-bottom-right-radius:20px;
    }
    .text-genre {
        font-size:12px;
        letter-spacing:0;
        margin-left: 20px;
        margin-right: 20px;
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
    input[type="radio"]:checked+label {font-weight: bold}
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
                        <h4 class="c-grey-900 mB-20">Status Anime</h4>
                        {{-- <button id="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAnimeModal">
                            <i class="ti-plus"></i>
                            <span>Add</span>
                        </button> --}}
                        <table id="dataTableAnime" class="table table-striped mT-15 table-hover" cellspacing="0">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Judul Anime</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($movie as $no => $data)
                                <tr id="sid{{ $data->id }}">
                                    <th scope="row">{{ $movie->firstItem()+$no }}</th>
                                    <td>{{ $data->judul_movie }}</td>
                                    <td>
                                        @foreach ($data->status as $status)
                                        <span style="font-size: 9pt" class="d-inline-block lh-base py-0 px-1 border border-1 border-white text-white rounded rounded-3 bg-{{ ($status->status == 'Complate') ? 'success' : 'primary' }}">
                                            {{ $status->status }}
                                        </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="row row-cols-2" style="width: fit-content">
                                            <a href="javascript:void(0)" class="action c-red-500" data-bs-toggle="modal" onclick="editStatus({{$data->id}})">
                                                <i class="ti-pencil" data-bs-toggle="tooltip" title="Edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (isset($movie) && $movie->lastPage() > 1)
                        <nav style="float: right">
                            <ul class="pagination">
                                @php
                                $interval = isset($interval) ? abs(intval($interval)) : 3 ;
                                $from = $movie->currentPage() - $interval;
                                if($from < 1){
                                    $from = 1;
                                }

                                $to = $movie->currentPage() + $interval;
                                if($to > $movie->lastPage()){
                                    $to = $movie->lastPage();
                                }
                                @endphp

                                @if ($movie->currentPage() > 1)
                                <li class="page-item">
                                    <a href="{{ $movie->url($movie->currentPage() - 1) }}" class="page-link" aria-label="Previous">
                                        <span aria-hidden="true"><i class="fas fa-angle-left"></i></span>
                                    </a>
                                </li>
                                @endif

                                @for ($i = $from; $i <= $to; $i++)
                                @php
                                $isCurrentPage = $movie->currentPage() == $i;
                                @endphp
                                <li class="page-item {{ $isCurrentPage ? 'active' : '' }}">
                                    <a href="{{ !$isCurrentPage ? $movie->url($i) : '#' }}" class="page-link">
                                        {{ $i }}
                                    </a>
                                </li>
                                @endfor

                                @if ($movie->currentPage() < $movie->lastPage())
                                <li class="page-item">
                                    <a href="{{ $movie->url($movie->currentPage() + 1) }}" class="page-link" aria-label="Next">
                                        <span aria-hidden="true"><i class="fas fa-angle-right"></i></span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </nav>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="editAnimeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Anime</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="statusUpdateForm" action="{{ route('saveMovieStatus') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3 row">
                        <label for="updateJudelMovie" class="form-label col-sm-3 col-form-label">Judul Anime</label>
                        <div class="col-sm-9">
                            <label id="updateJudelMovie" class="form-label col-form-label" style="font-style: normal; font-weight: bold;">Judul table anime</label>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="form-label col-sm-3 col-form-label">Status Anime</label>
                        <div class="col-sm-9" id="radio"></div>
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
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $('#dataTableAnime').DataTable({paging: false});
        $('#dataTableAnime_info').remove();
    });
</script>
<script>
    function editStatus(id) {
        $.get("{{ route('findMovieStatus', '') }}"+id, function(status) {
            $("#id").val(status.id);
            $('#updateJudelMovie').html(status.judul_movie);
            if (status.status.length == 0) {
                $("#radio").html('<div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="status" id="status1" value="1"><label class="form-check-label" for="status1">Complate</label></div>');
                $("#radio").append('<div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="status" id="status2" value="2"><label class="form-check-label" for="status2">Ongoing</label></div>');
            }
            if (status.status.length == 1 && status.status[0].id == 1) {
                $("#radio").html('<div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="status" id="status1" value="1" checked><label class="form-check-label" for="status1">Complate</label></div>');
                $("#radio").append('<div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="status" id="status2" value="2"><label class="form-check-label" for="status2">Ongoing</label></div>');
            }
            if (status.status.length == 1 && status.status[0].id == 2) {
                $("#radio").html('<div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="status" id="status1" value="1"><label class="form-check-label" for="status1">Complate</label></div>');
                $("#radio").append('<div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="status" id="status2" value="2" checked><label class="form-check-label" for="status2">Ongoing</label></div>');
            }
            $("#editAnimeModal").modal("toggle");
        });
    }
</script>
@endsection
