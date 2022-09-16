
        <section class="our-features section widget-style-9">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4 offset-lg-8 pull-right">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Enquiry Form</h5>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label mb0">Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter name" name="name" value="{{old('name')}}">
                                    <span class="text-danger">
                                        @error('name')
                                            {{$message}}
                                        @enderror
                                    </span>
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label mb0">Email address</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com"  name="email" value="{{old('email')}}">
                                    <span class="text-danger">
                                        @error('email')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label mb0">Mobile No.</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter mobile no."  name="phnum" value="{{old('phnum')}}">
                                    <span class="text-danger">
                                        @error('phnum')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label mb0">Say Hi!</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment" value="{{old('comment')}}"></textarea>
                                    <span class="text-danger">
                                        @error('comment')
                                            {{$message}}
                                        @enderror
                                    </span>
                
                                    <button type="submit" class="btn btn-1 mb-0">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
