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

<div class="container mt-5">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="cardList ">
                    @if ($article->getName())
                    <h6 class="col-lg-12">Name: {{$article->getName()}}</h6>
                    @endif
                    @if ($article->getType() === 2)
                    <h6 class="col-lg-12">Deadline: {{$article->getDeadline()}}</h6>
                    @endif
                    @if ($article->getCost())
                    <h6 class="col-lg-12">Cost: {{$article->getCost()}} $</h6>
                    @endif
                    @if ($article->getType() === 1)
                    <h6 class="col-lg-12">Manufacture: {{$article->getManufacture()}}</h6>
                    @endif
                    @if ($article->getType() === 1)
                    <h6 class="col-lg-12">Release Date: {{$article->getReleaseDate()}}</h6>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
