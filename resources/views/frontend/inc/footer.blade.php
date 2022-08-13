<div class="pt-5"></div>
<section class="bg-primary">
    <div class="pt-5"></div>
    <div class="container footer">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <h3 class="text-warning"></i> About Us</h3>
                <hr class="border" width="120px" align="left">
                <p class="text-white">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, dolorum ipsam? Nesciunt, molestiae
                    Voluptas.
                </p>
                <p class="text-white">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium tempore, maxime nihil ab alias
                </p>
                <h3 class="text-warning">Connect With Us</h3>
                <hr class="border" width="120px" align="left">
                <div class="row social-media-rows mb-4">
                    <div class="col-1"><a href="#"><i class="fab fa-facebook-f"></i></a></div>
                    <div class="col-1"><a href="#"><i class="fab fa-instagram"></i></a></div>
                    <div class="col-1"><a href="#"><i class="fab fa-twitter"></i></a></div>
                    <div class="col-1"><a href="#"><i class="fab fa-youtube"></i></a></div>
                    <div class="col-1"><a href="#"><i class="fab fa-linkedin"></i></a></div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <h3 class="text-warning">Training And Consulting</h3>
                <hr class="border" width="120px" align="left">
                <ul style="list-style: none;" class="mx-0 px-0">
                    @foreach ($tcData as $item)
                        <li class="py-2"><a class="links"
                                href="{{ route('training_consulting_single', $item->slug) }}"><i
                                    class="fa fa-angle-right"></i> {{ $item->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xl-2 col-md-6">
                <h3 class="text-warning">Orginazation</h3>
                <hr class="border" width="120px" align="left">
                <ul style="list-style: none;" class="mx-0 px-0">
                    <li class="py-2"><a class="links" href="#" data-toggle="modal" data-target="#ppModal"><i
                                class="fa fa-angle-right"></i> Privacy & Policy</a></li>
                    <li class="py-2"><a class="links" href="#" data-toggle="modal" data-target="#tcModal"><i
                                class="fa fa-angle-right"></i> Terms & Conditions</a></li>
                </ul>
            </div>
            <div class="col-xl-3 col-md-6">
                <h3 class="text-warning">Corporate Office</h3>
                <hr class="border" width="120px" align="left">
                <ul style="list-style: none;" class="mx-0 px-0">
                    <li class="py-2"><a class="links" href="#"><i class="fa fa-map-marker-alt"></i> Bhatbhateni,
                            Kathmandu, Nepal</a></li>
                    <li class="py-2"><a class="links" href="#"><i class="fa fa-phone-alt"></i> Nepal:
                            +977-9813242071</a></li>
                    <li class="py-2"><a class="links" href="#"><i class="fa fa-phone-alt"></i> USA: +1-9736262823</a>
                    </li>
                    <li class="py-2"><a class="links" href="#"><i class="fa fa-envelope"></i> Email: info@nfids.com</a>
                    </li>
                </ul>
                <h3 class="text-warning">Office Hours</h3>
                <hr class="border" width="120px" align="left">
                <ul style="list-style: none;" class="mx-0 px-0">
                    <li class="py-2"><a class="links" href="#"><i class="fa fa-clock"></i> Mon - Fri, 9AM - 5PM
                            (NPT)</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5" style="background: #fbf8f83b">
        <div class="container">
            <div class="row">
                <div class="col text-sm-right py-2">
                    <p class="my-auto text-light">
                        &copy; 2021 All Rights Reserved | Powered By <a target="_blank" class="text-warning"
                            href="htps://www.hostbala.com">HostBala Technologies</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Privacy & Policy Modal -->
<div class="modal fade" id="ppModal" tabindex="-1" role="dialog" aria-labelledby="ppModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ppModalLabel">Privacy & Policy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Terms & Condition Modal -->
<div class="modal fade" id="tcModal" tabindex="-1" role="dialog" aria-labelledby="tcModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tcModalLabel">Terms & Conditions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
