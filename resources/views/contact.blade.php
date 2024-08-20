@include('header')

<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h3 class="text-white mb-4 animated slideInDown">Contact Us</h3>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
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
                <form method="post" action="{{ route('contact.store') }}" role="form">
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
                    <div class="flex-shrink-0 btn-square bg-secondary rounded-circle">
                        <i class="fa fa-map-marker-alt text-body"></i>
                    </div>
                    <div class="ms-3">
                        <h6>Head Office</h6>
                        <span>ZadeCAD Limited</span><br>
                        <span>Plot 8 Wamala Avenue Bukoto-Kissasi Road</span><br>
                        <span>P.O Box 109370, Kampala (Uganda)</span>
                    </div>
                </div>
                <div class="d-flex border-bottom pb-3 mb-3">
                    <div class="flex-shrink-0 btn-square bg-secondary rounded-circle">
                        <i class="fa fa-phone-alt text-body"></i>
                    </div>
                    <div class="ms-3">
                        <h6>Call Us</h6>
                        <span>+256-705-233-210</span><br>
                        <span>+256-785-941-415</span>
                    </div>
                </div>
                <div class="d-flex border-bottom-0 pb-3 mb-3">
                    <div class="flex-shrink-0 btn-square bg-secondary rounded-circle">
                        <i class="fa fa-envelope text-body"></i>
                    </div>
                    <div class="ms-3">
                        <h6>Mail Us</h6>
                        <span>info@zadecadacademy.com</span>
                    </div>
                </div>

                <!--<iframe class="w-100 rounded"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                    frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0">
				</iframe>-->
            </div>
        </div>
    </div>
</div>

@include('footer')
