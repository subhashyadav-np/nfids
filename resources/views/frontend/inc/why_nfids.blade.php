<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <div class="bg-primary text-white pt-2 px-2">
                    <h1>Why NFIDS</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <div class="media-body">
                    <h4 class="mt-0 mb-1 text-primary p-2 pr-5">Who We Are - About Us</h4>
                    {{-- <h5 class="mb-2 mt-2 px-2 text-primary">About Us</h5> --}}
                    <p class="px-1 py-2">
                        {{ Str::of('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, labore. Odit voluptas exercitationem omnis dolorem unde nulla, architecto ducimus, repellendus doloremque dolorum sequi autem iste eum veniam debitis cumque nobis! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos aperiam obcaecati deleniti facere placeat harum facilis quia recusandae iste saepe, cum delectus hic earum a. Quam ullam assumenda incidunt nam. Donec lacinia congue felis in faucibus. Lorem ipsum dolor sit amet consectetur adipisicing elit.')->limit(700) }}
                    </p>
                </div>
            </div>
            <div class="col-sm-5">
                <img class="mb-4" src="{{asset('frontend/images/about1.jpg')}}" alt="" width="100%">
            </div>
        </div>
        <div class="row mt-4 why-nfids-second-row">
            <div class="col-sm-5 img">
                <img class="mb-4" src="{{asset('frontend/images/about2.jpeg')}}" alt="" width="100%">
            </div>
            <div class="col-sm-7 texts">
                <div class="media-body text-right">
                    <h4 class="mt-0 mb-1 text-primary p-2" style="margin-right: 0">What We Do - About Our Work</h4>
                    {{-- <h5 class="mb-2 mt-2 px-2 text-primary">About Our Work</h5> --}}
                    <p class="px-1 py-2 text-left">
                        {{ Str::of('Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, labore. Odit voluptas exercitationem omnis dolorem unde nulla, architecto ducimus, repellendus doloremque dolorum sequi autem iste eum veniam debitis cumque nobis! Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos aperiam obcaecati deleniti facere placeat harum facilis quia recusandae iste saepe, cum delectus hic earum a. Quam ullam assumenda incidunt nam. Donec lacinia congue felis in faucibus. Lorem ipsum dolor sit amet consectetur adipisicing elit.')->limit(700) }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>