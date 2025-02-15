<footer id="footer"><!--Footer-->
    {{--<div class="footer-top">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-sm-2">--}}
    {{--<div class="companyinfo">--}}
    {{--<h2><span>NAB</span></h2>--}}
    {{--<p>Get your desired liquors here</p>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Online Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Change Location</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Shop By Category</h2>
                        <ul class="nav nav-pills nav-stacked">
                            @foreach($category->where('parent_id','=',0) as $cat)
                                <li><a href="#">{{$cat->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privecy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">Billing System</a></li>
                            <li><a href="#">Ticket System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>Subscribe</h2>
                        <form action="{{route('subscribed_mail')}}" class="searchform">
                            {{csrf_field()}}
                            <input type="email" style="color: #0a0a0a" name="email" placeholder="Your email address"/>

                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i>
                            </button>
                        </form>
                        {{--<h2>Un-Subscribe</h2>--}}
                        {{--<form action="{{route('unsubscribe_mail')}}" class="searchform">--}}
                            {{--{{csrf_field()}}--}}
                            {{--<input type="email" style="color: #0a0a0a" name="email" placeholder="Your email address"/>--}}

                            {{--<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i>--}}
                            {{--</button>--}}

                        {{--</form>--}}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank"
                                                           href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->

