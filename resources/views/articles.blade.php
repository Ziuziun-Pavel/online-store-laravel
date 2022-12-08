<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title  }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<header class="center">
    <ul class="nav nav-tabs navmenu">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/articles">Articles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/cart">Cart</a>
        </li>
    </ul>
</header>

<div class="container mt-5">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="cardList">
                    @foreach($products as $key => $value)

                        @if ($value->getType() === 2)
                    <div class="card m-2" style="width: 20rem;height: 20rem;">
                        <div class="card-body">
                            <h5 class="card-title">Service name: {{$value->getName()}} </h5>
                            <h6 class="card-subtitle mb-2 text-muted">Deadline: {{$value->getDeadline()}} </h6>
                            <h6 class="card-subtitle mb-2 text-muted">Cost: {{$value->getCost()}}  $</h6>

                            <div class="buttons">
                                <a href="/articles/page/?id={{$value->getId()}}" class=" card-link"><button type="button" class="btn btn-danger" >Read</button></a>

                                <form class="d-inline-block" action="/cart/addToCart" method="post">
                                    @csrf
                                    <input type="hidden" name="article_id" value="<?=$value->getId()?>">
                                    <input class="btn btn-primary {{$isCartEmpty? 'disabled' : ''}}" type="submit" value="Add To Cart">
                                </form>
                            </div>

                        </div>
                    </div>
                    @endif

                        @if ($value->getType() === 1)
                    <div class="card m-2" style="width: 20rem;height: 20rem;">
                        <div class="card-body">
                            <h5 class="card-title">Product name: {{ $value->getName()}} </h5>
                            <h6 class="card-subtitle mb-2 text-muted">Manufacture: {{$value->getManufacture()}}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">Release Date: {{$value->getReleaseDate()}}</h6>
                            <h6 class="card-subtitle mb-2 text-muted">Cost: {{ $value->getCost() }} $</h6>

                            <div class="buttons">
                                <a href="/articles/page/?id={{$value->getId()}}" class="d-block card-link"><button type="button" class="btn btn-danger" >Read</button></a>
                                <form action="/cart/addToCart" method="post">
                                    @csrf
                                    <input type="hidden" name="article_id" value="{{$value->getId()}}">
                                    <label>
                                        Choose a number of products:
                                        <input class="mt-1" type="number" name="quantity" value="1" min="1" placeholder="Quantity" required>
                                    </label>
                                    <input class="btn btn-primary" type="submit" value="Add To Cart">
                                </form>
                            </div>

                        </div>
                    </div>
                    @endif
                    @endforeach


                </div>

                <nav class="d-flex justify-content-center mt-4" aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item {{$pageNum <= 1 ? 'disabled' : ''}}"><a class="page-link" href="/articles/?page={{$pageNum - 1}}">Previous</a></li>

                        @for ($i = 1; $i <= 3; $i++)
                            <li class="page-item {{$pageNum == $i ? 'active' : ''}}">
                            <a class="page-link" href="/articles/?page={{$i}}"> {{$i}} </a>
                        </li>
                            @endfor

                        <li class="page-item {{$pageNum >= $pages ? 'disabled' : ''}}" ><a class="page-link" href="/articles/?page={{$pageNum + 1}}">Next</a></li>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
