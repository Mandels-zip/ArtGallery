@include('\layouts\header')

<body>
  
<div class="category-container">
    <div class="category-wrapper">
        <div class="category-current">
            <img src="{{asset('storage/images/categoryimg/'. $categoryImg)}}" alt="Описание изображения">
            <div class="category-overlay">
                <p class="category-text">{{$categoryName}}</p>
            </div>
        </div>
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
</div>

</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>