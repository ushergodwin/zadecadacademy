<!-- Footer Start -->
<div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s" style="background-color: #000">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-3 col-xs-12">
                <h5 class="text-white mb-4">Our Office</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>ZadeCAD Limited</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Plot 8 Wamala Avenue, Bukoto-Kisasi Road</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>P.O Box 109370, Kampala (Uganda)</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+256-705-233-210</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+256-785-941-415</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@zadecadacademy.com</p>
                <div class="d-flex pt-3">
                    <a class="btn btn-square btn-secondary rounded-circle me-2" href="https://www.facebook.com/ZadeCADAcademy" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-secondary rounded-circle me-2" href="https://www.twitter.com/ZadeCAD" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-secondary rounded-circle me-2" href="https://www.youtube.com/channel/UCEi1ik2oIXsxqIBgW-eVO_w" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-secondary rounded-circle me-2" href="https://www.instagram.com/ZadeCAD" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-square btn-secondary rounded-circle me-2" href="https://chat.whatsapp.com/G1I3wmQ2TF4GwgXMRhiaC4" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    <a class="btn btn-square btn-secondary rounded-circle me-2" href="https://www.linkedin.com/in/zadecad-academy-81292322a/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-12">
                <h5 class="text-white mb-4">Payment options</h5>
                <p>Account Number: <b>3100092562</b></p>
                <p>Account Name: <b>ZadeCAD LTD</b></p>
                <p>Bank Name: <b>CENTENARY BANK, NTINDA BRANCH</b></p>
                <p>Reference: <b>Student name - Name of course</b></p>
                <h5 class="text-white mb-4">Airtel Money</h5>
                <p>1. Dial *165# and follow prompts as follows</p>
                <p>2. Airtel Money pay</p>
                <p>3. Enter Merchant Code – <b>4302532</b></p>
                <p>4. Enter Amount</p>
                <p>5. Reference: <Student name - Name of course></p>
                <p>6. Enter your PIN</p>
                <p>7. Send</p>
            </div>
            <div class="col-lg-2 col-md-2 col-xs-12">
                <h5 class="text-white mb-4">Quick Links</h5>
                <a class="btn btn-link" href="{{ url('/') }}">Home</a>
                <a class="btn btn-link" href="{{ url('about') }}">About Us</a>
                <a class="btn btn-link" href="{{ url('courses') }}">Courses</a>
                <a class="btn btn-link" href="{{ url('downloads') }}">Downloads</a>
                <!-- <a class="btn btn-link" href="{{ url('payments') }}">Payments</a> -->
                <a class="btn btn-link" href="{{ url('gallery') }}">Gallery</a>
                <a class="btn btn-link" href="{{ url('contact') }}">Contact</a>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe width="400" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=ZadeCAD%20Academy%20&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        <br>
                        <style>.mapouter{position:relative;text-align:right;height:300px;width:100%;}</style>
                        <a href="https://www.embedgooglemap.net">google maps api html</a>
                        <style>.gmap_canvas {overflow:hidden;background:none!important;height:300px;width:100%;}</style>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-dark text-body copyright py-4" style="background-color:#000">
    <hr style="border:2px solid #fff;clear: both;" />
    <div class="container">
        <div class="row">
            <center><p style="color:#B0B9AE;">&copy; {{ date('Y') }} &middot; ZadeCAD Limited &middot; All Rights Reserved </p></center>
        </div>
    </div>
</div>  
<a href="#" class="btn btn-lg btn-secondary btn-lg-square rounded-circle back-to-top">
    <i class="bi bi-arrow-up"></i>
</a>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('lib/parallax/parallax.min.js') }}"></script>
<script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
<script src="{{ asset('js/lightgallery-all.min.js') }}"></script>
<script src="{{ asset('js/jquery.mousewheel.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('#lightgallery').lightGallery();
    });
</script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Custom script to handle alerts -->
<script>
        @if(session('swalError'))
            Swal.fire({
                text: "{{ session('swalError') }}",
                icon: "error",
            });
        @endif
        
        @if(session('swalSuccess'))
            Swal.fire({
                text: "{{ session('swalSuccess') }}",
                icon: "success",
            });
        @endif
</script>
<script>
    $(document).ready(function(){
        if($('.bbb_viewed_slider').length) {
            var viewedSlider = $('.bbb_viewed_slider');

            viewedSlider.owlCarousel({
                loop: true,
                margin: 30,
                autoplay: true,
                autoplayTimeout: 6000,
                nav: false,
                dots: true,
                responsive: {
                    0: { items: 1 },
                    575: { items: 2 },
                    768: { items: 3 },
                    991: { items: 4 },
                    1199: { items: 6 }
                }
            });

            if($('.bbb_viewed_prev').length) {
                var prev = $('.bbb_viewed_prev');
                prev.on('click', function() {
                    viewedSlider.trigger('prev.owl.carousel');
                });
            }

            if($('.bbb_viewed_next').length) {
                var next = $('.bbb_viewed_next');
                next.on('click', function() {
                    viewedSlider.trigger('next.owl.carousel');
                });
            }
        }
    });
</script>
</body>
</html>
