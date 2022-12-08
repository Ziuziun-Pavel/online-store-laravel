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
                @if (!empty($cartItems))

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Qty</th>
                            <th>Total Cost($)</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $key => $value)
                            @if ($value->getProductId())
                        <tr>
                            <td>{{$value->getProductId()}}</td>
                            <td>{{$value->getQty()}}</td>
                            <td>{{$value->getItemTotalPrice()}}</td>
                            <td>
                                <form action="/cart/deleteFromCart/?id={{$value->getCartItemId()}}" method="post">
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach

                        </tbody>
                    </table>
                </div>
                @else
                <h1>The cart is empty</h1>
                @endif
            </div>
            <h1 class="ml-5">Total price: {{ $totalPrice }} $</h1>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

