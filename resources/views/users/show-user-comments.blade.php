@include('layouts.header')

<div class="row container-sm m-auto w-75">

    @include('layouts.user-menu')

    <div class="col-sm-8 mt-3">
        <h3>Comments</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Post</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <th scope="row">{{ $comment->id }}</th>
                        <td>{{ $comment->comment }}</td>
                        <td><a href="{{ route('user.comment.post', $comment->id) }}">Go to post</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
	</div>
</div>

@include('layouts.footer')