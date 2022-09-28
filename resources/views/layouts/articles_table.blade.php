<h5 class="fw-bold">Articles</h5>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col" width="140">Title</th>
            <th scope="col">Category</th>
            <th scope="col" width="200">Content</th>
            <th scope="col">Image</th>
            <th scope="col">Updated At</th>
            <th scope="col" width="25">Edit</th>
            <th scope="col" width="25">Delete</th>
        </tr>
    </thead>
    <tbody>
        @php($i = 1)
        @foreach($articles as $ar)
            <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$ar->title}}</td>
                <td>...</td>
                <td>{{$ar->content}}</td>
                <td>{{$ar->image}}</td>
                <td>{{$ar->updated_at}}</td>
                <td>
                    <button class='btn btn-warning text-white py-1' title='Edit' data-bs-toggle='modal' data-bs-target=''>
                        <i class='fa-solid fa-pen-to-square'></i></button>
                </td>
                <td>
                    <button class='btn btn-danger text-white py-1' title='Delete' data-bs-toggle='modal' data-bs-target=''>
                        <i class='fa-solid fa-trash'></i></button>
                </td>
            </tr>
            @php($i++)
        @endforeach
    </tbody>
</table>