@extends('layout.application')

@section('content')
    <h2 class="mb-5">
        All Blogs
        <a href="{{ route('blogs.create') }}" class="btn btn-success">Create Blog</a>
    </h2>
    <table id="blogs_table">
        <thead>
        <th>id</th>
        <th>title</th>
        <th>created at</th>
        <th>Action</th>
        </thead>
    </table>

@endsection

@section('scripts')
    <script>
        const deleteBlog = function (id) {
            let check= confirm("Are you sure delete blog")
            if(check != true) return ;
            $.ajax({
                url: '{{ route('blogs.index') }}/' + id,
                method: 'delete',
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: () => {
                    alert('delete blog successfully');
                    table.draw();
                }
            })
        }
        var table = new DataTable('#blogs_table', {
            serverSide: true,
            pageLength: 10,
            ajax: '{{ route('blogs.index') }}',
            columns: [
                {data: 'id'},
                {data: 'title'},
                {
                    data: 'created_at', render: (data) => {
                        // return `<img src="${data}" />`
                        return `${new Date(data).toLocaleString()}`
                    }
                },
                {
                    data: 'id',
                    render: (data) => {
                        return `<a class="btn btn-success" href="{{ route('blogs.index') }}/${data}"> Show</a>
                        <a class="btn btn-warning" href="{{ route('blogs.index') }}/${data}/edit"> Edit</a>
                        <button class="btn btn-danger" onclick="deleteBlog(${data})"> Delete</button>`
                    }
                }
            ]
        })

    </script>
@endsection
