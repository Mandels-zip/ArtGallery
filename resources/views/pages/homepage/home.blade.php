@include('layouts/header')
<body>

<div class="category-container">

    <div class="category-wrapper">
    @if(Auth::check() &&(Auth::user()->role == 'admin'))
          <a href="{{route('category.create')}}" type="button" class="btn btn-success" > Create Category </a>
@endif
        @foreach($categories as $category)
        <div class="category">
         <a href="{{route('sort.category', ['categoryId' => $category->id]) }}">
            <img src="{{asset('storage/images/categoryimg/' . $category->img)}}" alt="Описание изображения">
        
            <div class="category-overlay">
                <p class="category-text">{{$category->name}}</p>
                <p> @if(Auth::Check() && Auth::user()->role == 'admin')
                    <form action="{{ route('category.destroy', $category->id, ) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger"> Delete Category </button> 
                    </form>
                @endif</p>
            </div>
            
            
        </div>
</a>
        @endforeach
    </div>
</div>

<div class="general-container">
@foreach ($content as $cont)
    <div class="general-item">
    <a href="{{route('content.details', ['id' => $cont->id]) }}"><img src="{{asset('storage/images/contentimg/'. $cont->img)}}" class="img-fluid" alt="Описание изображения">
        <div class="content">
            
        </div>
    </div>
    @endforeach
</div>

</body>

<script>
    const categoryContainer = document.querySelector('.category-container');

    categoryContainer.addEventListener('wheel', (event) => {
        event.preventDefault();
        categoryContainer.scrollLeft += event.deltaY;
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>