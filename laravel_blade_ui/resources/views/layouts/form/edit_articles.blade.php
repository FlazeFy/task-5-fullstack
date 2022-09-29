<div class="modal fade" id="edit-artikel-Modal-{{$ar->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/home/update_articles/{{$ar->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Artikel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="title" value="{{$ar->title}}" required>
                        <label for="floatingInput">Title</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="category" required>
                            @foreach($categories as $ct)
                                <option value="{{$ct->id}}" <?php if($ct->id == $ar->categories_id){ echo " selected ";} ?>>{{$ct->name}}</option>
                            @endforeach
                        </select>
                        <label for="floatingInput">Category</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="floatingTextarea2" style="height: 100px" name="content" required>{{$ar->content}}</textarea>
                        <label for="floatingTextarea2">Content</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>