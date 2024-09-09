@include('header')

<div class="container my-5">
    @if($blogs->isNotEmpty())
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-lg-6 mb-4">
                <div class="card h-100 shadow-sm d-flex flex-column">
                    <div class="row g-0 flex-grow-1">
                        <div class="col-md-6">
                            <img src="{{ asset('uploads/' . $blog->image) }}" class="img-fluid rounded-start" alt="{{ $blog->title }}">
                        </div>
                        <div class="col-md-6 d-flex flex-column">
                            <div class="card-body flex-grow-1">
                                <h5 class="card-title">{{ $blog->title }}</h5>
                                <p class="card-text"><small class="text-muted">{{ $blog->created_at->format('F Y') }}</small></p>
                                <p class="card-text">{{ Str::limit($blog->content, 100) }}</p>
                            </div>
                            <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center mt-auto">
                                <a href="{{ route('blog.show', $blog->id) }}" class="btn-link p-0">Read More</a>
                                <span class="text-orange"><i class="fa fa-comments"></i> {{ $blog->comments->count() }} comments</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info text-center">
            <i class="fa fa-info-circle fa-3x"></i>
            <h4>No Blogs Available</h4>
            <p>There are currently no blogs posted. Please check back later.</p>
        </div>
    @endif
</div>

@include('footer')

<style>
    .card-body h5.card-title {
        font-weight: bold;
        font-size: 1.2rem;
    }

    .card-body p.card-text {
        font-size: 0.9rem;
    }

    .card-body .btn-link {
        color: #007bff;
        text-decoration: none;
        font-weight: 600;
    }

    .card-body .btn-link:hover {
        text-decoration: underline;
    }

    .card-body .fa-heart {
        color: red;
    }

    .card-body .fa-comments {
        color: #6c757d;
    }

    img.img-fluid {
        height: 100%;
        object-fit: cover;
    }

    .card {
        border: none;
        display: flex;
        flex-direction: column;
    }

    .card .row {
        margin: 0;
        flex-grow: 1;
    }

    .card-body {
        padding: 15px;
        flex-grow: 1;
    }

    .card-footer {
        background-color: #fff;
        border-top: none;
        padding-top: 10px;
    }

    .card-footer a {
        text-decoration: none;
    }

    .card-footer a:hover {
        text-decoration: underline;
    }

    /* Styling for the alert when no blogs are available */
    .alert-info h4, .alert-info p {
        color: #333; /* Change the color to dark gray for readability */
    }

    .alert-info i {
        color: #007bff; /* Optional: style the info icon */
    }
</style>
