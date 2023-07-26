  <!-- Modal -->
  <div class="modal fade" id="BookingModal" tabindex="-1" aria-labelledby="BookingModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="mb-0">Reserve a table</h3>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body d-flex flex-column justify-content-center">
                <div class="booking">
                    @if(Session::has('success'))
                    <p class="alert alert-sucess">{{Session::get('success')}}</p>
                    @endif
                    <form class="booking-form row" role="form" action="{{ route('frontend.reservation') }}" method="post">
                        @csrf
                        <div class="col-lg-6 col-12">
                            <label for="name" class="form-label">Full Name</label>

                            <input type="text" name="name" id="name" class="form-control" placeholder="Your Name">
                            @error('name')
                                <p>{{$message}}</p>
                            @enderror
                        </div>

                        <div class="col-lg-6 col-12">
                            <label for="email" class="form-label">Email Address</label>

                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="your@email.com">
                            @error('email')
                            <p>{{$message}}</p>
                        @enderror
                        </div>

                        <div class="col-lg-6 col-12">
                            <label for="phone" class="form-label">Phone Number</label>

                            <input type="number" name="phone" id="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control" placeholder="123-456-7890">
                            @error('phone')
                            <p>{{$message}}</p>
                        @enderror
                        </div>

                        <div class="col-lg-6 col-12">
                            <label for="num_persons" class="form-label">Number of persons</label>

                            <input type="text" name="num_persons" id="num_persons" class="form-control" placeholder="12 persons">
                            @error('num-persons')
                            <p>{{$message}}</p>
                        @enderror
                        </div>

                        <div class="col-lg-6 col-12">
                            <label for="date" class="form-label">Date</label>

                            <input type="date" name="date" id="date" value="" class="form-control">
                            @error('date')
                            <p>{{$message}}</p>
                        @enderror
                        </div>

                        <div class="col-lg-6 col-12">
                            <label for="time" class="form-label">Time</label>

                            <select class="form-select form-control" name="time" id="time">
                              <option value="5" selected>5:00 PM</option>
                              <option value="6">6:00 PM</option>
                              <option value="7">7:00 PM</option>
                              <option value="8">8:00 PM</option>
                              <option value="9">9:00 PM</option>
                            </select>
                            @error('time')
                            <p>{{$message}}</p>
                        @enderror
                        </div>

                        <div class="col-12">
                            <label for="request_msg" class="form-label">Special Request</label>

                            <textarea class="form-control" rows="4" id="request_msg" name="request_msg" placeholder=""></textarea>
                            @error('request-msg')
                            <p>{{$message}}</p>
                        @enderror
                        </div>
                        <div class="col-lg-4 col-12 ms-auto">
                            <button type="submit" class="form-control">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer"></div>  
        </div>
        
    </div>
</div>