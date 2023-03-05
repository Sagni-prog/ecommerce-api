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
            <section class="h-100 h-custom" style="background-color: #eee;">
                <div class="container py-5 h-100">
                  <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-8 col-xl-6">
                      <div class="card border-top border-bottom border-3" style="border-color: #f37a27 !important;">
                        <div class="card-body p-5">

                          <p class="lead fw-bold mb-5" style="color: #f37a27;">Purchase Reciept</p>
                          @php $i = 0; @endphp
                            @foreach ($product->photo as $photo)
                            @php $i++; @endphp
                            @if ($i == 1)
                          <div class="row">
                            <div class="col mb-3">
                              <p class="small text-muted mb-1">Date</p>
                              <p>{{$order->createdAt}}</p>
                            </div>
                            <div class="col mb-3">
                              <p class="small text-muted mb-1">Order No.</p>
                              <p>{{$order->order->billing_email}}</p>
                            </div>
                          </div>

                          <div class="mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
                            <div class="row">
                              <div class="col-md-8 col-lg-9">
                                <p>quantity</p>
                              </div>
                              <div class="col-md-4 col-lg-3">
                                <p>{{$order->quantity}}</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-8 col-lg-9">
                                <p class="mb-0">address</p>
                              </div>
                              <div class="col-md-4 col-lg-3">
                                <p class="mb-0">{{$order->order->billing_country}}</p>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-9">
                                  <p class="mb-0">address</p>
                                </div>
                                <div class="col-md-4 col-lg-3">
                                  <p class="mb-0">{{$order->products->price}}</p>
                                </div>
                              </div>
                          </div>

                          <div class="row my-4">
                            <div class="col-md-4 offset-md-8 col-lg-3 offset-lg-9">
                              <p class="lead fw-bold mb-0" style="color: #f37a27;">£262.99</p>
                            </div>
                          </div>

                          <p class="lead fw-bold mb-4 pb-2" style="color: #f37a27;">Tracking Order</p>

                          <div class="row">
                            <div class="col-lg-12">

                              <div class="horizontal-timeline">

                                <ul class="list-inline items d-flex justify-content-between">
                                  <li class="list-inline-item items-list">
                                    <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Ordered</p
                                      class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                  </li>
                                  <li class="list-inline-item items-list">
                                    <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Shipped</p
                                      class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                  </li>
                                  <li class="list-inline-item items-list">
                                    <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">On the way
                                    </p>
                                  </li>
                                  <li class="list-inline-item items-list text-end" style="margin-right: 8px;">
                                    <p style="margin-right: -8px;">Delivered</p>
                                  </li>
                                </ul>

                              </div>

                            </div>
                          </div>

                          <p class="mt-4 pt-2 mb-0">Want any help? <a href="#!" style="color: #f37a27;">Please contact
                              us</a></p>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
      </div>
        </div>
    </div>

      @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
