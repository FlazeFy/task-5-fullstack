<div class="modal fade" id="hapus-kategori-Modal-{{$ct->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin untuk menghapus kategori "{{$ct->name}}"?</p>
            </div>
            <div class="modal-footer">
                <form action="/home/delete_categories/{{$ct->id}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>