@extends('user.master')
@section('content')

    <!-- ========================= SECTION PAGETOP ========================= -->
    <section class="section-pagetop bg-secondary">
        <div class="container clearfix">
            <h2 class="title-page">Reach Us 24/7</h2>
        </div> <!-- container //  -->
    </section>

    <!--================Contact Area =================-->
    <section class="contact_area p_100">
        <div class="container">
            <div class="card mb-4 mt-4">
                <div class="card-body">
                    <div class="container contact-form">
                        <div class="contact-image">
                            <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
                        </div>
                        <form method="post" action="{{route('user.contact.send')}}">
                            <h3>Drop Us a Message</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Your Name *" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="Your Email *"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" placeholder="Your Phone Number *"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="btnSubmit" class="btnContact" value="Send Message" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Contact Area =================-->

@endsection