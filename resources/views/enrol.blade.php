@include('header')

<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h3 class="text-white mb-4 animated slideInDown">{{ $program->pg_name }}</h3>
    </div>
</div>
<div class="container-xxl py-5" style="background-color:#fff">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <!-- Additional content can be added here -->
        </div>
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <img src="{{ asset('uploads/' . $program->pg_image) }}" style="width: 80%;" />
                <p style="text-align: justify;">{{ $program->description }}</p>
                <b>Software used:</b><br/>
                @foreach(explode('#', $program->software) as $software)
                    <p style="line-height: 1em"><i class="fa fa-angle-right"></i> {{ $software }}</p>
                @endforeach
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="mb-4">Enrol for <b style="color:#ff7900;">{{ $program->pg_name }}</b></h2>
                <form method="post" action="{{ route('enrol.store') }}" role="form">
                    @csrf
                    <input type="hidden" name="program" value="{{ $program->id }}">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="firstname" placeholder="Your Name" required>
                                <label for="firstname">First Name</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="lastname" placeholder="Your Name" required>
                                <label for="lastname">Last Name</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="phone" placeholder="Your Contact Number" required>
                                <label for="phone">Contact Number</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="whatsapp" placeholder="Your Whatsapp Number">
                                <label for="whatsapp">Whatsapp Number</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <select name="gender" class="form-control" required>
                                    <option value="">--- Gender ---</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <label for="gender">Your Gender</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <select name="country" class="form-control" required>
                                    <option value="">--- Nationality ---</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country }}">{{ $country }}</option>
                                    @endforeach
                                </select>
                                <label for="country">Your Nationality</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="occupation" placeholder="Your Occupation">
                                <label for="occupation">Occupation</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="field_of_study" placeholder="Field of Study">
                                <label for="field_of_study">Field of Study</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="company" placeholder="Company / University" required>
                                <label for="company">Company / University (State year of study if student)</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <select name="mode_of_class" class="form-control" required>
                                    <option value="">--- Select ---</option>
                                    <option value="Virtual">Virtual</option>
                                    <option value="Physical">Physical</option>
                                </select>
                                <label for="mode_of_class">Mode of Class</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <select name="time_for_class" class="form-control" required>
                                    <option value="">--- Select ---</option>
                                    <option value="Week days">Week days</option>
                                    <option value="Weekends">Weekends</option>
                                </select>
                                <label for="time_for_class">Time for Class</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="confirm" class="btn btn-secondary py-3 px-5">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('footer')
