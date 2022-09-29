<div class="modal fade" id="tambah-artikel-Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/home/add_articles" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Artikel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="title" required>
                        <label for="floatingInput">Title</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="category" required>
                            @foreach($categories as $ct)
                                <option value="{{$ct->id}}">{{$ct->name}}</option>
                            @endforeach
                        </select>
                        <label for="floatingInput">Category</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="floatingTextarea2" style="height: 100px" name="content" required></textarea>
                        <label for="floatingTextarea2">Content</label>
                    </div>
                    <div class="mb-3">
                        <span class="fw-bold text-secondary float-end">Optional</span>
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" id="formFile" name="image" accept="image/png, image/jpg, image/jpeg" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>