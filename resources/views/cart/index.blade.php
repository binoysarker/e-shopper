@extends('layouts.cartMaster')
@section('title')
    Cart Page
@endsection
@section('cartSection')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div>
                @include('partials.successMessage')
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-responsive" >
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody id="loop">
                    {{--@foreach($carts as $cart)--}}
                        <tr >
                            <td class="cart_product">
                                <a href=""><img src="{{asset(''.$carts->options['image'])}}" class="img-responsive" style="width: 200px;height: 130px" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$carts->name}}</a></h4>
                                <p>Web ID: {{$carts->rowId}}</p>
                            </td>
                            <td class="cart_price">
                                <p>${{$carts->price}}</p>
                            </td>
                            <td class="cart_quantity" >
                                <div class="form-group">
                                    <input type="number" name="Quantity"  id="Quantity" class="form-control small" value="{{$carts->qty}}" aria-describedby="helpId">
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">US: ${{$carts->subtotal}}</p>
                            </td>
                            <td class="cart_delete">
                                <a href="{{url('/addToCart/'.$carts->id)}}" onclick="event.preventDefault();document.getElementById('deleteCart').submit()">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>
                                <form id="deleteCart" action="{{url('/addToCart/'.$carts->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                </form>
                            </td>
                        </tr>
                    {{--@endforeach--}}
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <label for=""></label>
                                <input type="checkbox">
                                <label>Use Coupon Code</label>
                            </li>
                            <li>
                                <label for=""></label>
                                <input type="checkbox">
                                <label>Use Gift Voucher</label>
                            </li>
                            <li>
                                <label for=""></label>
                                <input type="checkbox">
                                <label>Estimate Shipping & Taxes</label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <label for=""></label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>$59</span></li>
                            <li>Eco Tax <span>$2</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>$61</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
@endsection