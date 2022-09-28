<h5 class="fw-bold">Categories</h5>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col" width="120">Total Articles</th>
            <th scope="col" width="25">Edit</th>
            <th scope="col" width="25">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $ct)
            <tr>
                <td>{{$ct->name}}</td>
                <td>...</td>
                <td>
                    <button class='btn btn-warning text-white py-1' title='Edit' data-bs-toggle='modal' data-bs-target=''>
                        <i class='fa-solid fa-pen-to-square'></i></button>
                </td>
                <td>
                    <button class='btn btn-danger text-white py-1' title='Delete' data-bs-toggle='modal' data-bs-target='#hapus-kategori-Modal-{{$ct->id}}'>
                        <i class='fa-solid fa-trash'></i></button>
                </td>
            </tr>
            
            <!--Modal action.-->
            @include('layouts.form.delete_categories')
        @endforeach
    </tbody>
</table>