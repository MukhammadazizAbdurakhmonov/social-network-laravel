@include('layouts.header')

<div class="row container-sm m-auto w-75">

    @include('layouts.profile-menu')

    <div class="col-sm-8 mt-3">
        <div class="d-flex justify-content-between align-items-center">
            <h3>Edit post</h3>
            <a href="{{ route('post.index') }}" class="btn btn-primary">Cancel</a>
        </div>
        <form action="{{ route('post.update', $post->id) }}" method="post" class="row g-3 mb-2" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="col-form-label">Title:</label>
                <input name="title" type="text" class="form-control" id="title" value="{{ $post->title }}">
            </div>
            <div>
                <label for="content" class="col-form-label">Content:</label>
                <textarea name="content" class="form-control" id="content"> {{ $post->content }} </textarea>
            </div>
            <div>
                @if ($post->image)
                    <img src="{{ asset('storage/'.$post->image) }}" style="width: 16rem;">
                @endif
            </div>
            <div>
                <label for="image" class="col-form-label">Image:</label>
                <input name="image" type="file" class="form-control" id="image">
            </div>

            <div class="col-12">
                <button class="btn btn-primary">Save</button>
            </div>

        </form>
	</div>
</div>

@include('layouts.footer')