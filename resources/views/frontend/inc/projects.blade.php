<section>
    <div class="container mt-5 project-main-div">
        <div class="row">
            <div class="col py-4">
                <h1 class="text-center text-primary font-weight-bolder">Projects</h1>
                <hr class="text-center border border-primary" width="120px">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($ProjectData as $item)
            <div class="col-md-6 mt-4">
                <div class="text-md-right">
                    <h5 class="mb-1 bg-primary text-white p-2 text-center">{{$item->title}}</h5>
                </div>
                <p class="mt-4">
                    {{ Str::of($item->desc)->limit(650) }}
                </p>
                <div class="text-right">
                    <a href="{{route('projectpage')}}" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-md-5 mt-4">
                <div class="text-md-right">
                    <h5 class="mb-1 bg-primary text-white p-2 text-center">Public Health</h5>
                </div>
                <p class="mt-4">
                    {{ Str::of('Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus, at quibusdam! Accusamus quae, commodi, aut modi enim tempora nemo corporis sequi similique dignissimos amet? Perferendis labore debitis quas quaerat ab. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis voluptatum enim officiis corrupti fugiat qui accusantium non! Delectus, cum! Laboriosam adipisci eum sed ullam aliquam molestias magnam autem voluptatum iusto? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis architecto esse, nostrum minus ea mollitia provident dicta, dolorum libero doloremque consectetur deserunt quae, assumenda odio impedit eius repudiandae maxime soluta!')->limit(650) }}
                </p>
                <div class="text-right">
                    <a href="{{route('projectpage')}}" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
            <div class="col-md-2 hide-768 mt-4">
                <div class="horizontal-divider mx-auto"></div>
            </div>
            <div class="col-md-5 mt-4">
                <div class="text-sm-right">
                    <h5 class="mb-1 bg-primary text-white p-2 text-center">Social Science</h5>
                </div>
                <p class="mt-4">
                    {{ Str::of('Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus, at quibusdam! Accusamus quae, commodi, aut modi enim tempora nemo corporis sequi similique dignissimos amet? Perferendis labore debitis quas quaerat ab. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis voluptatum enim officiis corrupti fugiat qui accusantium non! Delectus, cum! Laboriosam adipisci eum sed ullam aliquam molestias magnam autem voluptatum iusto? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis architecto esse, nostrum minus ea mollitia provident dicta, dolorum libero doloremque consectetur deserunt quae, assumenda odio impedit eius repudiandae maxime soluta!')->limit(650) }}
                </p>
                <div class="text-right">
                    <a href="{{route('projectpage')}}" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div> --}}
        </div>
    </div>
</section>