<!DOCTYPE html>
<html class="no-js" lang="zxx">
    @include('common/header')
    <body>

        <!-- Book Preloader -->
        <div class="book_preload">
            <div class="book">
                <div class="book__page"></div>
                <div class="book__page"></div>
                <div class="book__page"></div>
            </div>
        </div>
        <!--/ End Book Preloader -->
        <!-- Header -->
        @include('common/menu')
        <!--/ End Header Menu -->

        <section class="our-features section widget-style-9">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4 offset-lg-1 widget-style-10">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Contact Us</h5>
                                <p class="font-18"><img src="images/whatsapp-icon.svg" width="24" alt=""> <a href="https://api.whatsapp.com/send?phone=9832044990" class="color-black">+91 98320 44990</a> <i class="fas fa-phone-alt ml20"></i> <a href="tel:9832044990" class="color-black">+91 98320 44990</a></p>
                                <p class="font-18 mb0"><b>Address</b></p>
                                <p class="font-16 mb0 color-black"><b>Kolkata:</b></p>
                                <p class="font-16">225, Block A, Laketown Near Swimming Pool, Kolkata - 700089</p>
                                <p class="font-16 mb0 color-black"><b>Siliguri:</b></p>
                                <p class="font-16">96, Nazrul Sarani, Ashrampara, Siliguri - 734001</p>
                                <p class="font-18 mb0"><b>Email</b></p>
                                <p><i class="far fa-paper-plane"></i> <a href="mailto:livingspacekolkata@gmail.com" class="color-black">livingspacekolkata@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-12">
                        <form action="{{route('enquiry')}}" method="POST">
                            @csrf
                            @include('common\enquiryform')
                        </form>
                    </div>
                </div>
            </div>
        </section>

<!-- Footer -->
    @include('common/footer')
        <!--/ End Footer -->

        <!-- Jquery JS-->

    </body>
</html>