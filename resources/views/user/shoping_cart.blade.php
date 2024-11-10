@extends('user.layout_user')
@section('main_content')
    <form class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart">
                                <thead>
                                    <tr class="table_head">
                                        <th class="column-1">Product</th>
                                        <th class="column-2">Name</th>
                                        <th class="column-3">Size and color</th>
                                        <th class="column-price">Price</th>
                                        <th class="column-4">Quantity</th>
                                        <th class="column-price">discount</th>
                                        <th class="column-5">Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody class="table_body">
                                    <!-- Rows will be dynamically added here by JavaScript -->
                                </tbody>
                            </table>
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div class="flex-w flex-m m-r-20 m-tb-5">
                                <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                    name="coupon" id="coupon_code" placeholder="Coupon Code">

                                <div id="apply_coupon"
                                    class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    Apply coupon
                                </div>
                            </div>

{{--                            <div--}}
{{--                                class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">--}}
{{--                                Update Cart--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Cart Totals
                        </h4>

                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Subtotal:
                                </span>
                            </div>

                            <div class="size-209">
                                <span class="mtext-110 cl2 sub_total_price_cart" name="cart_total">

                                </span>
                            </div>
                            <!-- Discount -->
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Discount:
                                </span>
                            </div>
                            <div class="size-209">
                                <span class="mtext-110 cl2 discount_total" name="">
0
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    Shipping:
                                </span>
                            </div>

                            <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                <p class="stext-111 cl6 p-t-2">
                                    There are no shipping methods available. Please double check your address, or contact us
                                    if you need any help.
                                </p>

                                <div class="p-t-15">
                                    <span class="stext-112 cl8">
                                        Calculate Shipping
                                    </span>

                                    <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                        <select class="js-select2" name="time">
                                            <option>Select a country...</option>
                                            <option>USA</option>
                                            <option>UK</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>

                                    <div class="bor8 bg0 m-b-12">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state"
                                            placeholder="State /  country">
                                    </div>

                                    <div class="bor8 bg0 m-b-22">
                                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode"
                                            placeholder="Postcode / Zip">
                                    </div>

{{--                                    <div class="flex-w">--}}
{{--                                        <div--}}
{{--                                            class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">--}}
{{--                                            Update Totals--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Total:
                                </span>
                            </div>

                            <div class="size-209 p-t-1">
                                <span class="mtext-110 cl2 total_price_cart">
                                    $0.00
                                </span>
                            </div>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            Proceed to Checkout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@section('new_js')
    <script>
        let appliedDiscount = 0; // Global variable to store coupon discount

        function fetchShoppingCartToTable() {
            function ucfirst(str) {
                return str.charAt(0).toUpperCase() + str.slice(1);
            }

            $.ajax({
                url: "http://127.0.0.1:8000/show_shopping_cart",
                method: "GET",
                dataType: "json",
                success: function(data) {
                    $('.table_body').empty();
                    let total_cart = 0;

                    if (data.cart) {
                        data.cart.forEach(function(item) {
                            const itemSubtotal = ((item.base_price + item.color_additional_price + item.size_additional_price)
                                * item.quanity) * (1 - item.discount / 100);
                            total_cart += itemSubtotal;

                            let tableItemHtml = `
                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="storage/images/${item.product_image}" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">${ucfirst(item.product_name)}</td>
                                <td class="column-price">${ucfirst(item.color_name)}, ${ucfirst(item.size_name)}</td>
                                <td class="column-3">$ ${(item.base_price + item.color_additional_price + item.size_additional_price)}</td>
                                <td class="column-4">
                                    <input type="number" class="quantity-input" value="${item.quanity}" min="1" max="100" data-base-price="${item.base_price}" data-color-price="${item.color_additional_price}" data-size-price="${item.size_additional_price}" data-discount="${item.discount}" />
                                </td>
                                <td class="column-price" style="color:green; text-align: center">${item.discount} %</td>
                                <td class="column-5 item-subtotal">$${itemSubtotal.toFixed(2)}</td>
                            </tr>
                        `;
                            $('.table_body').append(tableItemHtml);
                        });

                        updateTotals(total_cart);
                    } else {
                        console.error("Response data does not contain 'cart' property");
                    }

                    // Event listener for updating subtotal on quantity change
                    $(document).on('input', '.quantity-input', function() {
                        const quantity = parseInt($(this).val());
                        const basePrice = parseFloat($(this).data('base-price'));
                        const colorPrice = parseFloat($(this).data('color-price'));
                        const sizePrice = parseFloat($(this).data('size-price'));
                        const discount = parseFloat($(this).data('discount'));

                        const itemSubtotal = ((basePrice + colorPrice + sizePrice) * quantity) * (1 - discount / 100);
                        $(this).closest('tr').find('.item-subtotal').text(`$${itemSubtotal.toFixed(2)}`);

                        let totalCart = 0;
                        $('.item-subtotal').each(function() {
                            totalCart += parseFloat($(this).text().replace('$', ''));
                        });

                        updateTotals(totalCart);
                    });

                    // Apply Coupon Logic
                    $('#apply_coupon').click(function() {
                        var couponCode = $('#coupon_code').val();
                        var cartTotal = parseFloat($('.sub_total_price_cart').text().replace('$', '').trim());

                        if ($('#coupon_code').prop('disabled')) {
                            swal({
                                icon: 'info',
                                title: 'Coupon Already Applied!',
                                text: 'You have already applied this coupon.',
                                confirmButtonText: 'Okay'
                            });
                            return;
                        }

                        $.ajax({
                            url: '/apply_coupon',
                            method: 'POST',
                            data: {
                                coupon_code: couponCode,
                                cart_total: cartTotal,
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.success) {
                                    swal({
                                        icon: 'success',
                                        title: 'Coupon Applied!',
                                        text: 'You got a discount of $' + response.discount,
                                        confirmButtonText: 'Great!'
                                    });

                                    $('#coupon_code').prop('disabled', true);
                                    $('#apply_coupon').prop('disabled', true);

                                    appliedDiscount = response.discount; // Store the discount amount
                                    updateTotals(cartTotal);
                                } else {
                                    swal({
                                        icon: 'error',
                                        title: 'Oops!',
                                        text: response.message,
                                        confirmButtonText: 'Okay'
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                swal({
                                    icon: 'error',
                                    title: 'Something went wrong!',
                                    text: 'Please try again later.',
                                    confirmButtonText: 'Okay'
                                });
                            }
                        });
                    });
                },
                error: function(xhr, status, error) {
                    console.error("There was a problem with the AJAX request:", error);
                }
            });
        }

        // Helper function to update all totals
        function updateTotals(subtotal) {
            $('.mtext-110.cl2.subtotal_price_cart').text(`$${subtotal.toFixed(2)}`);
            $('.sub_total_price_cart').text(`$${subtotal.toFixed(2)}`);

            // Apply the stored discount if it exists
            const finalTotal = subtotal - appliedDiscount;
            $('.total_price_cart').text(`$${finalTotal.toFixed(2)}`);
            if (appliedDiscount > 0) {
                $('.discount_total').text(`$${appliedDiscount.toFixed(2)}`);
            }
        }

        $(document).ready(function() {
            fetchShoppingCartToTable();
        });
    </script>

@endsection
@endsection
