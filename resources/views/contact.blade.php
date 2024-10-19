@include('header')

<div class="container-fluid page-header py-1 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-2">
        <h3 class="text-white mb-4 animated slideInDown">Contact Us</h3>
    </div>
</div>

<div class="container-xxl py-5 card">
    <div class="container card-body">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <p class="mb-4">Fill the form below so we can get to know you..</p>
                <form method="post" action="{{ route('contact.store') }}" role="form" class="text-orange">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="subject" placeholder="Subject">
                                <label for="subject">Subject</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a message here" name="message"
                                    style="height: 250px" required></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-secondary py-3 px-5">
                                Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <h3 class="mb-4">Contact Details</h3>
                <div class="d-flex border-bottom pb-3 mb-3">
                    <div class="flex-shrink-0 btn-square bg-secondary text-dark  rounded-circle">
                        <i class="fa fa-map-marker-alt text-body"></i>
                    </div>
                    <div class="ms-3">
                        <h6>Head Office</h6>
                        <span>{{ $companyAddress?->office_name }}</span><br>
                        <span>{{ $companyAddress?->office_address }}</span><br>
                        <span>{{ $companyAddress?->office_po_box }}</span>
                    </div>
                </div>
                <div class="d-flex border-bottom pb-3 mb-3">
                    <div class="flex-shrink-0 btn-square bg-secondary text-dark  rounded-circle">
                        <i class="fa fa-phone-alt text-body"></i>
                    </div>
                    <div class="ms-3">
                        <h6>Call Us</h6>
                        <span>{{ $companyAddress?->office_line1 }}</span><br>
                        <span>{{ $companyAddress?->office_line2 }}</span><br/>
                        <span>{{ $companyAddress?->office_line3 }}</span>
                    </div>
                </div>
                <div class="d-flex border-bottom-0 pb-3 mb-3">
                    <div class="flex-shrink-0 btn-square bg-secondary text-dark  rounded-circle">
                        <i class="fa fa-envelope text-body"></i>
                    </div>
                    <div class="ms-3">
                        <h6>Mail Us</h6>
                        <span>{{ $companyAddress?->office_email }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <iframe class="w-100 rounded"
    src="https://maps.google.com/maps?q=ZadeCAD%20Academy%20&t=&z=13&ie=UTF8&iwloc=&output=embed" 
    frameborder="0" 
    style="min-height: 300px; border:0;" 
    allowfullscreen="" 
    aria-hidden="false" 
     tabindex="0"> </iframe>
</div>

@include('footer')
