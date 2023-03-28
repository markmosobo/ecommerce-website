@extends('layouts.branch')

@section('title', 'Your Cart')

@section('content')

<div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                	<!-- <div class="alert alert-success text-uppercase" role="alert">
						<i class="icon anm anm-truck-l icon-large"></i> &nbsp;<strong>Congratulations!</strong> You've got free shipping!
					</div> -->
                	<form action="#" method="post" class="cart style2">
                		<table>
                            <thead class="cart__row cart__header">
                                <tr>
                                    <th colspan="2" class="text-center">Product</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-right">Total</th>
                                    <th class="action">&nbsp;</th>
                                </tr>
                            </thead>
                            <?php $total = 0 ?>
                            @foreach((array) session('cart') as $id => $details)
                                <?php $total += $details['price'] * $details['quantity'] ?>
                            @endforeach
                    		<tbody>
                                @if (session('cart'))
                                 @foreach(session('cart') as $id => $details)

                                    <tr class="cart__row border-bottom line1 cart-flex border-top">
                                        <td class="cart__image-wrapper cart-flex-item">
                                            <a href="#"><img class="cart__image" src="{{Storage::url($details['image_path'])}}" alt="Elastic Waist Dress - Navy / Small"></a>
                                        </td>
                                        <td class="cart__meta small--text-left cart-flex-item">
                                            <div class="list-view-item__title">
                                                <a href="#">{{$details['name']}} </a>
                                            </div>
                                        </td>
                                        <td class="cart__price-wrapper cart-flex-item">
                                            <span class="money">KSH{{$details['price']}}</span>
                                        </td>
                                        <td class="cart__update-wrapper cart-flex-item text-right">
                                            <div class="cart__qty text-center">
                                                <div class="qtyField">
                                                    <a class="qtyBtn minus" href="javascript:void(0);"><i class="icon icon-minus"></i></a>
                                                    <input class="cart__qty-input qty" type="text" name="updates[]" id="qty" value="{{$details['quantity']}}" pattern="[0-9]*">
                                                    <a class="qtyBtn plus" href="javascript:void(0);"><i class="icon icon-plus"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right small--hide cart-price">
                                            <div><span class="money">KSH{{ $details['price'] * $details['quantity'] }}</span></div>
                                        </td>
                                        <td class="text-center small--hide">
                                            <a href="#" class="btn btn--secondary cart__remove" title="Remove product"><i class="icon icon anm anm-times-l"></i></a>
                                        </td>
                                    </tr>
                                 @endforeach
                                @endif
                            </tbody>
                    		<tfoot>
                                <tr>
                                    <td colspan="3" class="text-left"><a href="{{url('/')}}" class="btn btn-secondary btn--small cart-continue">Continue shopping</a></td>
                                    <td colspan="3" class="text-right">
	                                    <button type="submit" name="clear" class="btn btn-secondary btn--small  small--hide">Clear Cart</button>
                                    	<button type="submit" name="update" class="btn btn-secondary btn--small cart-continue ml-2">Update Cart</button>
                                    </td>
                                </tr>
                            </tfoot>
                    </table> 
                    </form>                   
               	</div>
                
                
                <div class="container mt-4">
                    <div class="row">
                        
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 cart__footer">
                            <div class="solid-border">	
                              <div class="row border-bottom pb-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title">Subtotal</span>
                                <span class="col-12 col-sm-6 text-right"><span class="money">KSH{{$total}}</span></span>
                              </div>
                              <div class="row border-bottom pb-2 pt-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title">Shipping</span>
                                <span class="col-12 col-sm-6 text-right">Free shipping</span>
                              </div>
                              <div class="row border-bottom pb-2 pt-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Grand Total</strong></span>
                                <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="money">KSH{{$total}}</span></span>
                              </div>
                              <div class="cart__shipping">Shipping &amp; taxes calculated at checkout</div>
                              <p class="cart_tearm">
                                <label>
                                  <input type="checkbox" name="tearm" class="checkbox" value="tearm" required="">
                                  I agree with the terms and conditions
								</label>
                              </p>
                              <form>
                              <input formaction="{{url('checkout')}}" type="submit" name="checkout" id="cartCheckout" class="btn btn--small-wide checkout" value="Proceed To Checkout">
                              </form>
                              <div class="paymnet-img"><img src="assets/images/payment-img.jpg" alt="Payment"></div>
                              <p><a href="#;">Checkout with Multiple Addresses</a></p>
                            </div>
        
                        </div>
                    </div>
                </div>
                
            </div>
</div>

@endsection

@section('scripts')

    <script type="text/javascript">

        $(".update-cart").click(function (e) {
           e.preventDefault();

           var ele = $(this);

            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>

@endsection