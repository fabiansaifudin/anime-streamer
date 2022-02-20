@extends('layouts.anime.app')

@section('title', 'List Anime')

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
                        <h4 class="c-grey-900 mB-20">Table Anime</h4>
                        <button id="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAnimeModal">
                            <i class="ti-plus"></i>
                            <span>Add</span>
                        </button>
                        <table id="dataTableAnime" class="table table-striped mT-15 table-hover" cellspacing="0">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col" style="width: 300.094px;">Judul Anime</th>
                                    <th scope="col" style="width: 544.25px;">Deskripsi</th>
                                    <th scope="col">Episode</th>
                                    <th scope="col">Durasi</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
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
<div class="modal fade" id="addAnimeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Anime</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addModalAnimeForm" action="{{ route('save') }}" method="POST">
                    {{ csrf_field() }}
                    @php
                    use App\Anime\Anime;
                    $nime = Anime::get();
                    @endphp
                    @if (count($nime) == 0)
                    <input type="hidden" name="post_id" id="post_id" value="1">
                    @else
                    <input type="hidden" name="post_id" id="post_id" value="{{ $nime->last()->id+1 }}">
                    @endif
                    <div class="mb-3 row">
                        <label for="judelAnime" class="form-label col-sm-3 col-form-label">Judul Anime</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="judul_anime" id="judelAnime" placeholder="Masukan judul anime disini" required/>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="deskripsiAnime" class="form-label col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="deskripsi" id="deskripsiAnime" placeholder="Masukan deskripsi disini" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="durasiAnime" class="form-label col-sm-3 col-form-label">Durasi</label>
                        <div class="col-sm-9">
                            <input type="time" class="form-control" name="durasi" id="durasiAnime" step="1" required/>
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
<div class="modal fade" id="editAnimeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Update Anime</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="animeUpdateForm">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3 row">
                        <label for="updateJudelAnime" class="form-label col-sm-3 col-form-label">Judul Anime</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="judul_anime" id="updateJudelAnime" placeholder="Masukan judul anime disini" required/>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="updateDeskripsiAnime" class="form-label col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="deskripsi" id="updateDeskripsiAnime" placeholder="Masukan deskripsi disini" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="updateDurasiAnime" class="form-label col-sm-3 col-form-label">Durasi</label>
                        <div class="col-sm-9">
                            <input type="time" class="form-control" name="durasi" id="updateDurasiAnime" step="1" required/>
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
        $('#dataTableAnime').DataTable({paging: true});
        $('#dataTableAnime_info').remove();
        // $('nav ul.pagination li:first-child a').html('<i class="fas fa-angle-left" ></i>');
        // $('nav ul.pagination li:first-child span').html('<i class="fas fa-angle-left" ></i>');
        // $('nav ul.pagination li:last-child a').html('<i class="fas fa-angle-right"></i>');
        // $('nav ul.pagination li:last-child span').html('<i class="fas fa-angle-right"></i>');
    });
</script>
<?php 
$sto = null;
foreach($anime as $st) {
    $sto = $st->storage;
}
?>
<script>
    loadpage()
    function editPost(id) {
        $.get("{{ route('editAnime', '') }}"+id, function (anime) {
            $("#id").val(anime.id);
            $('#updateJudelAnime').val(anime.judul_anime);
            $('#updateDeskripsiAnime').val(anime.deskripsi);
            $('#updateDurasiAnime').val(anime.durasi);
            $("#editAnimeModal").modal("toggle");
        });

        $('#animeUpdateForm').submit(function(e) {
            e.preventDefault();
            const no = parseInt($('tbody tr th').last().text())+1;
            const updateId = $('#id').val();
            const updateJudelAnime = $('#updateJudelAnime').val();
            const updateDeskripsiAnime = $('#updateDeskripsiAnime').val();
            const updateDurasiAnime = $('#updateDurasiAnime').val();
            const _token = $("input[name=_token]").val();

            $.ajax({
                url:"{{route('change')}}",
                type:"PUT",
                data:{
                    id:updateId,
                    judul_anime:updateJudelAnime,
                    deskripsi:updateDeskripsiAnime,
                    durasi:updateDurasiAnime,
                    _token:_token,
                },
                success:function(response) {
                    $('#sid'+response.id+' td:nth-child(2)').text(response.judul_anime);
                    $('#sid'+response.id+' td:nth-child(3)').text(response.deskripsi);
                    $('#sid'+response.id+' td:nth-child(5)').text(response.durasi);
                    $('#editAnimeModal').modal("hide");
                    toastr.success("User berhasil dirubah");
                    $("#animeUpdateForm")[0].reset();
                },
            });
        });
    }

    function loadpage() {
        const anime = JSON.parse('<?php echo json_encode($anime) ?>');
        let no = 0;
        for (const data of anime) {
            no++;
            const action = "{{ route('deleteAnime', '') }}"+data.id;
            const buttonEdit = '<a href="javascript:void(0)" class="action c-red-500" data-toggle="modal" onclick="editPost('+data.id+')"><i class="ti-pencil" data-toggle="tooltip" title="Edit"></i></a>';
            const buttonDelete = '<a href="javascript:void(0)" data-id="'+data.id+'" class="action c-orange-500 swal-delete"><form action="'+action+'" id="delete'+data.id+'" method="POST">@csrf @method("delete")<i class="ti-trash" data-toggle="tooltip" title="Delete"></i></form></a>';
            $("#dataTableAnime tbody").append('<tr id="sid'+data.id+'"><th scope="row">'+no+'</th><td>'+data.judul_anime+'</td><td>'+data.deskripsi+'</td><td>'+data.storage.length+'</td><td>'+data.durasi+'</td><td><div class="row row-cols-2" style="width: fit-content">'+buttonEdit+' '+buttonDelete+'</div></td></tr>');
        }
    }
</script>
@endsection
