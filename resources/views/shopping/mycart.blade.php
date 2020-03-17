@extends('layouts.shopping')
@section('title','Cart')
@section('content')

<!--section start-->
<section class="cart-section section-b-space">
<div class="container card p-10 m-t-10">
    <div class="row">
        <div class="col-sm-12">
            <table class="table cart-table table-responsive-xs">
                <thead class="p-10">
                <tr class="table-head">
                    <th scope="col">View</th>
                    <th scope="col">Item</th>
                    <th scope="col">Price</th>
                    <!-- <th scope="col">quantity</th> -->
                    <th scope="col">Total</th>
                </tr>
                </thead>
                @if($data)
                    	@foreach($data as $da)
                   @php
    $images = DB::table("product_images")->where('product_id',$da['item']['id'])->first();
    if($images){
    	if($images->image_small == ""){
            $image = 'http://placehold.it/246x368/ffffff&text=Image Coming Soon';
        }else{
            $image = $images->image_small;
        }

    }else{
        $image = 'http://placehold.it/246x368/ffffff&text=Image Coming Soon';
    }
                   @endphp
                <tbody>
                <tr>
                    <td>
                        <a href="{{url('product/'.$da['item']['pid'].'/'.$da['item']['slug'])}}"><img src="{{ $image }}" alt=""></a>
                    </td>
                    <td><a href="#">{{$da['item']['product_name']}}</a>
                        <div class="mobile-cart-content row">
                            <div class="col-xs-3">
                                <div class="qty-box">
                                    <div class="input-group">
                                        <input type="text" name="quantity" class="form-control input-number" value="1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <h2 class="td-color">
									@if($da['item']['sale_price'])
								${{number_format($da['item']['sale_price'],2)}}
							@else
								@if($da['item']['price'] == 0) FREE @else 
								${{number_format($da['item']['price'],2)}} 
								@endif
                        	@endif
                                </h2></div>
                            <div class="col-xs-3">
                                <h2 class="td-color"><a href="#" class="icon"><i class="ti-close"></i></a></h2></div>
                        </div>
                    </td>
                    <td>
                        <h5 class="text-muted">
							@if($da['item']['sale_price'])
								${{number_format($da['item']['sale_price'],2)}}
							@else
								@if($da['item']['price'] == 0) FREE @else 
								${{number_format($da['item']['price'],2)}} 
								@endif
                        	@endif
                        </h5></td>
                    <!-- <td>
                        <div class="qty-box">
                            <div class="input-group">
                                <input type="number" name="quantity" class="form-control input-number" value="1">
                            </div>
                        </div>
                    </td> -->
                    
                    <td>
                        <h5 class="text-muted">
                        	@if($da['item']['sale_price'])
								${{number_format($da['item']['sale_price'],2)}}
							@else
								@if($da['item']['price'] == 0) FREE @else 
								${{number_format($da['item']['price'],2)}} 
								@endif
                        	@endif

                        
                    	</h5></td>
                </tr>
                </tbody>
				@endforeach
				<tbody>
					<tr>
						<td></td><td>Total</td><td></td>
						<td>${{number_format($totalPrice,2)}}</td>
					</tr>
				</tbody>
				@endif
            </table>
        </div>
    </div>
    <div class="row cart-buttons text-center m-b-10">
        <div class="col-6"><a href="{{url('shop-patterns')}}" class="btn theme-outline-btn pull-right waves-effect waves-light">Continue shopping</a></div>
        <div class="col-6"><a href="{{url('checkout')}}" class="btn theme-btn pull-left waves-effect waves-light">Checkout</a></div>
    </div>
</div>
</section>
<!--section end-->
@endsection
@section('footerscript')

@endsection