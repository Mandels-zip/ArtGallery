@include('\layouts\header')
        <ul class="list-group col-12"  >
          <li class="list-group-item"> {{$news -> title}} </a>
           {{$news -> text}} </b>
           {{$news -> img}}
           {{$news -> post_date}}
          </li>