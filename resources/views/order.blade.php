<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    @foreach($orders as $order)
    <div class="container">
        <div class="row">
            <div class="col-md ">
                <div class="card text-center">\
                    <div class="card-header">
                      Featured
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">{{$order->billing_firstname}}</h5>
                      <p>{{$order->billing_email}}</p>
                       <p>{{$order->billing_country}}</p>
                        <p></p>{{$order->billing_total}}</p>
                         <p>{{$order->billing_payment_gateway}}</p>
                          <p>{{$order->billing_payment_status}}</p>
                          {{-- <p>{{$order->orderproduct->product_id}}</p> --}}
                      <a href="#" class="btn btn-primary">{{$order->billing_email}}</a>
                    </div>
                    <div class="card-footer text-muted mb-6">
                      2 days ago
                    </div>
                  </div>
            </div>
        </div>
    </div>

      @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
