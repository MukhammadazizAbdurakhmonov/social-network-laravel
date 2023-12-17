@include('layouts.header')

<div class="row container-sm m-auto w-75">

    @include('layouts.profile-menu')

    <div class="col-sm-8 mt-3">
        <h3>Comments</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Comment</th>
                <th scope="col">Actions</th>
                <th scope="col">Post</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <th scope="row">{{ $comment->id }}</th>
                        <td>{{ $comment->comment }}</td>
                        <td class="d-flex">
                            <a href="{{ route('comment.edit', $comment->id) }}" class="btn btn-sm btn-primary me-2 d-inline">Edit</a>
                            <form action="{{ route('comment.destroy', $comment->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="#" class="btn btn-sm btn-danger">Delete</a>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('comment.post', $comment->id) }}">
                                Go to post
                            </a>
                        </td>
                    </tr>
                @endforeach

                
            </tbody>

            
        </table>
	</div>
</div>

@include('layouts.footer')