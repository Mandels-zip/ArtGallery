@include('layouts/header')
<body>
  
<div class="category-container">
    <div class="category-wrapper">
        <div class="category">
            <img src="{{asset('storage/images/contentimg/photo10.jpg')}}" alt="Описание изображения">
            <div class="category-overlay">
                <p class="category-text">Anime</p>
            </div>
        </div>

        <div class="category">
            <img src="{{asset('storage/images/contentimg/photo10.jpg')}}" alt="Описание изображения">
            <div class="category-overlay">
                <p class="category-text">Sci-fi</p>
            </div>
        </div>

        <div class="category">
            <img src="{{asset('storage/images/contentimg/photo10.jpg')}}" alt="Описание изображения">
            <div class="category-overlay">
                <p class="category-text">Fantasy</p>
            </div>
        </div>

        <div class="category">
            <img src="{{asset('storage/images/contentimg/photo10.jpg')}}" alt="Описание изображения">
            <div class="category-overlay">
                <p class="category-text">StreetArt</p>
            </div>
        </div>

        <!-- Дополнительные категории -->
        <div class="category">
            <img src="{{asset('storage/images/contentimg/photo10.jpg')}}" alt="Описание изображения">
            <div class="category-overlay">
                <p class="category-text">Category 5</p>
            </div>
        </div>

        <div class="category">
            <img src="{{asset('storage/images/contentimg/photo10.jpg')}}" alt="Описание изображения">
            <div class="category-overlay">
                <p class="category-text">Category 6</p>
            </div>
        </div>

        <div class="category">
            <img src="{{asset('storage/images/contentimg/photo10.jpg')}}" alt="Описание изображения">
            <div class="category-overlay">
                <p class="category-text">Category 7</p>
            </div>
        </div>

        <div class="category">
            <img src="{{asset('storage/images/contentimg/photo10.jpg')}}" alt="Описание изображения">
            <div class="category-overlay">
                <p class="category-text">Category 8</p>
            </div>
        </div>
    </div>
</div>

<div class="general-container">
    <div class="general-item">
        <img src="{{asset('storage/images/contentimg/photo1.jpg')}}" class="img-fluid" alt="Описание изображения">
        <div class="content">
        </div>
    </div>
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