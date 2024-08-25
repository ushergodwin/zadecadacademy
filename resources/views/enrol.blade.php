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
                <h2 class="mb-4">Apply for <b style="color:#ff7900;">{{ $program->pg_name }}</b></h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif


                <form method="post" action="{{ route('enrol.store') }}" role="form">
                    @csrf
                    <input type="hidden" name="program" value="{{ $program->id }}">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="fullname" placeholder="Your Full Name" value="{{ old('fullname') }}" required>
                                <label for="fullname">Full Name</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" value="{{ old('email') }}" required>
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="phone" placeholder="Your Contact Number" value="{{ old('phone') }}" required>
                                <label for="phone">Contact Number</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="whatsapp" placeholder="Your Whatsapp Number" value="{{ old('whatsapp') }}">
                                <label for="whatsapp">Whatsapp Number</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <select name="gender" class="form-control" required>
                                    <option value="">--- Gender ---</option>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                                <label for="gender">Your Gender</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <select name="country" class="form-control" required>
                                    <option value="">--- Nationality ---</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country }}" {{ old('country') == $country ? 'selected' : '' }}>{{ $country }}</option>
                                    @endforeach
                                </select>
                                <label for="country">Your Nationality</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="occupation" placeholder="Your Occupation" value="{{ old('occupation') }}">
                                <label for="occupation">Occupation</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="field_of_study" placeholder="Field of Study" value="{{ old('field_of_study') }}">
                                <label for="field_of_study">Field of Study</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="company" placeholder="Company / University" value="{{ old('company') }}" required>
                                <label for="company">Company / University (State year of study if student)</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <select name="mode_of_class" class="form-control" required>
                                    <option value="">--- Select ---</option>
                                    <option value="Virtual" {{ old('mode_of_class') == 'Virtual' ? 'selected' : '' }}>Virtual</option>
                                    <option value="Physical" {{ old('mode_of_class') == 'Physical' ? 'selected' : '' }}>Physical</option>
                                    <option value="Hybrid" {{ old('mode_of_class') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                                </select>
                                <label for="mode_of_class">Mode of Class</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <select name="time_for_class" class="form-control" required>
                                    <option value="">--- Select ---</option>
                                    <option value="Week days" {{ old('time_for_class') == 'Week days' ? 'selected' : '' }}>Week days</option>
                                    <option value="Weekends" {{ old('time_for_class') == 'Weekends' ? 'selected' : '' }}>Weekends</option>
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
