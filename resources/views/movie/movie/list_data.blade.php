@extends('layouts.anime.app')

@section('title', 'List Movie')

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
                        <h4 class="c-grey-900 mB-20">Table Movie</h4>
                        <button id="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMovieModal">
                            <i class="ti-plus"></i>
                            <span>Add</span>
                        </button>
                        <table id="dataTableMovie" class="table table-striped mT-15 table-hover" cellspacing="0">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col" style="width: 300.094px;">Judul Movie</th>
                                    <th scope="col" style="width: 544.25px;">Deskripsi</th>
                                    <th scope="col">Durasi</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Tambah data Anime&Movie Streaming online -->
<div class="modal fade" id="addMovieModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Movie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addModalAnimeForm" action="{{ route('saveMovie') }}" method="POST">
                    {{ csrf_field() }}
                    @php
                    use App\Anime\Movie;
                    $movi = Movie::get();
                    @endphp
                    @if (count($movi) == 0)
                    <input type="hidden" name="post_id" id="post_id" value="1">
                    @else
                    <input type="hidden" name="post_id" id="post_id" value="{{ $movi->last()->id+1 }}">
                    @endif
                    <div class="mb-3 row">
                        <label for="judelMovie" class="form-label col-sm-3 col-form-label">Judul Movie</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="judul_movie" id="judelMovie" placeholder="Masukan judul anime disini" required/>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="deskripsiMovie" class="form-label col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="deskripsi" id="deskripsiMovie" placeholder="Masukan deskripsi disini" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="durasiMovie" class="form-label col-sm-3 col-form-label">Durasi</label>
                        <div class="col-sm-9">
                            <input type="time" class="form-control" name="durasi" id="durasiMovie" step="1" required/>
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

<!-- Edit Anime&Movie Jika terjadi perubahan -->
<div class="modal fade" id="editMovieModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Movie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="movieUpdateForm">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3 row">
                        <label for="updateJudelMovie" class="form-label col-sm-3 col-form-label">Judul Movie</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="judul_anime" id="updateJudelMovie" placeholder="Masukan judul anime disini" required/>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="updateDeskripsiMovie" class="form-label col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="deskripsi" id="updateDeskripsiMovie" placeholder="Masukan deskripsi disini" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="updateDurasiMovie" class="form-label col-sm-3 col-form-label">Durasi</label>
                        <div class="col-sm-9">
                            <input type="time" class="form-control" name="durasi" id="updateDurasiMovie" step="1" required/>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
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
        $('.swal-delete').on('click',function() {
            id = this.dataset.id;
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
        $('#dataTableMovie').DataTable({paging: true});
        $('#dataTableMovie_info').remove();
        // $('nav ul.pagination li:first-child a').html('<i class="fas fa-angle-left" ></i>');
        // $('nav ul.pagination li:first-child span').html('<i class="fas fa-angle-left" ></i>');
        // $('nav ul.pagination li:last-child a').html('<i class="fas fa-angle-right"></i>');
        // $('nav ul.pagination li:last-child span').html('<i class="fas fa-angle-right"></i>');
    });
</script>
<script>
    loadpage()
    function editPost(id) {
        $.get("{{ route('editMovie', '') }}"+id, function (anime) {
            $("#id").val(anime.id);
            $('#updateJudelMovie').val(anime.judul_movie);
            $('#updateDeskripsiMovie').val(anime.deskripsi);
            $('#updateDurasiMovie').val(anime.durasi);
            $("#editMovieModal").modal("toggle");
        });

        $('#movieUpdateForm').submit(function(e) {
            e.preventDefault();
            const no = parseInt($('tbody tr th').last().text())+1;
            const updateId = $('#id').val();
            const updateJudelMovie = $('#updateJudelMovie').val();
            const updateDeskripsiMovie = $('#updateDeskripsiMovie').val();
            const updateDurasiMovie = $('#updateDurasiMovie').val();
            const _token = $("input[name=_token]").val();

            $.ajax({
                url:"{{route('movieChange')}}",
                type:"PUT",
                data:{
                    id:updateId,
                    judul_movie:updateJudelMovie,
                    deskripsi:updateDeskripsiMovie,
                    durasi:updateDurasiMovie,
                    _token:_token,
                },
                success:function(response) {
                    $('#sid'+response.id+' td:nth-child(2)').text(response.judul_anime);
                    $('#sid'+response.id+' td:nth-child(3)').text(response.deskripsi);
                    $('#sid'+response.id+' td:nth-child(4)').text(response.durasi);
                    $('#editMovieModal').modal("hide");
                    toastr.success("User berhasil dirubah");
                    $("#movieUpdateForm")[0].reset();
                },
            });
        });
    }
    function loadpage() {
        const movie = JSON.parse('<?php echo json_encode($movie) ?>');
        let no = 0;
        for (const data of movie) {
            no++;
            const action = "{{ route('deleteMovie', '') }}"+data.id;
            const buttonEdit = '<a href="javascript:void(0)" class="action c-red-500" data-toggle="modal" onclick="editPost('+data.id+')"><i class="ti-pencil" data-toggle="tooltip" title="Edit"></i></a>';
            const buttonDelete = '<a href="javascript:void(0)" data-id="'+data.id+'" class="action c-orange-500 swal-delete"><form action="'+action+'" id="delete'+data.id+'" method="POST">@csrf @method("delete")<i class="ti-trash" data-toggle="tooltip" title="Delete"></i></form></a>';
            $("#dataTableMovie tbody").append('<tr id="sid'+data.id+'"><th scope="row">'+no+'</th><td>'+data.judul_movie+'</td><td>'+data.deskripsi+'</td><td>'+data.durasi+'</td><td><div class="row row-cols-2" style="width: fit-content">'+buttonEdit+' '+buttonDelete+'</div></td></tr>');
        }
    }
</script>
@endsection
