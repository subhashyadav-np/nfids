<div class="col-md-4">
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action active">
          Training & Consulting <span class="badge badge-warning">All</span>
        </a>
        @foreach ($tcData as $item)
        <a href="{{route('training_consulting_single', $item->slug)}}" class="list-group-item list-group-item-action"><i class="fa fa-angle-right"></i> {{$item->title}}</a>
        @endforeach
      </div>
</div>