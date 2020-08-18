<table class="table table-centered mb-0">
  <tbody>

  @if($product_num = $products->count() > 0)
    @foreach($products as $product)
      <tr>
        <td>
          <img src="{{ asset('storage/avatars/'.$product->store->attachementStore()->first()['file_name']) }}"
               alt="contact-img" title="contact-img" class="rounded mr-2" height="90" width="120">
          <p class="m-0 d-inline-block align-middle mt-2">
            <a href="apps-ecommerce-products-details.html"
               class="text-body font-weight-semibold ">{{ $product->store->description }}</a>
            <br>
          </p>
        </td>
        <td class="text-right">
          <span class="badge badge-success">{{ $product->store->price }}$</span>
        </td>
      </tr>
    @endforeach
  @else

    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">Be attention!</h4>
      <p>If you’ve had a damaged delivery or it didn’t arrive at all, your rights are protected by the Consumer Rights
        Act and the Consumer Contracts Regulations.</p>
      <hr>
      <p class="mb-0">Consumer rights is a division of Which? that provides clear information on your rights offering
        simple solutions to solve your everyday consumer problems</p>
    </div>

  @endif

  {{ $slot }}

  <tr class="text-right">
    <td>
      <h5 class="m-0">Total:</h5>
    </td>
    <td class="text-right font-weight-semibold">
      {{ \yal\laraveldash\Helper\Helper::amount() }}$
    </td>
  </tr>

  </tbody>

</table>
