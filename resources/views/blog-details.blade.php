@include('header')

<style>
    .comment-item {
        background-color: #f8f9fa; 
        border: 1px solid #ddd; 
        border-radius: 5px; 
        padding: 15px; 
        margin-bottom: 10px; 
    }

    .comment-item strong {
        color: #333; 
    }

    .comment-item p {
        color: #555; 
    }

    .comment-item .text-muted {
        font-size: 0.9rem; 
    }
</style>

<div class="container my-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h1 class="mb-4">{{ $blog->title }}</h1>
            <img src="{{ asset('uploads/' . $blog->image) }}" class="img-fluid rounded mb-4" alt="{{ $blog->title }}">
            <p class="lead">{!! $blog->content !!}</p>

            <hr class="my-4">

            <h3 class="mb-4">Comments</h3>
            @if($blog->comments->isNotEmpty())
                <ul class="list-group mb-4">
                    @foreach($blog->comments as $comment)
                    <li class="list-group-item comment-item">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <strong>{{ $comment->name }}</strong>
                            <span class="text-muted small">{{ $comment->created_at->format('M d, Y h:i A') }}</span>
                        </div>
                        <p class="mb-1">{{ $comment->comment }}</p>
                    </li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">No comments yet. Be the first to comment!</p>
            @endif

            <hr class="my-4">

            <h3 class="mb-4">Add a Comment</h3>
            <form action="{{ route('blogs.comment', $blog->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="name">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="email">Your Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="comment">Your Comment</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit Comment</button>
            </form>
        </div>
    </div>
</div>

@include('footer')
