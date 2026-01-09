@php
    use App\Models\Category;

    $categories = new Category();

    $categories = $categories->get();
@endphp
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{url('/')}}">Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

          @foreach ($categories as $item)
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{url('/category')}}/{{$item->id}}/{{$item->name}}">{{$item->name}}</a>
            </li>
          @endforeach
          
        </ul>
      </div>
    </div>
</nav>