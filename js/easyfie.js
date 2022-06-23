
$(document).ready(function () {

    (function ($) {
        if (localStorage.getItem("items") > 0) {

            $(".cart-small").show();
            var totalCart = localStorage.getItem('cartTotal');
            var items = localStorage.getItem('items');
            var products = localStorage.getItem('saveProduct');
            $(".itemCount").text(items);

            products = JSON.parse(products);
            products.forEach(function (value) {
                var productName = value.product_name
                var pName = productName.substr(0, 45) + "...";
                var pPrice = value.product_price
                var pQuantity = value.product_quantity
                var pTotal = value.product_total
                var pId = value.product_id

                var row = "<tr><td class='readmore'>" + pName + "</td><td>" + pPrice + "</td><td>" + pQuantity + "</td><td>" + pTotal + "</td><td><button type='button' class='close itemRemove' aria-label='Close'><span aria-hidden='true'>&times;</span></button></td><td style='display:none'>" + pId + "</td></tr>";
                $(".cartList").append(row);
            });

            $(".cartTotal").text(totalCart);
        } else {
            $(".cart-small").show();
        }
    }(jQuery));


    $(".cartHide").click(function () {
        $(".cart").hide(500);
    })

    $(".cart-small").click(function () {
        $(".cart").show(500);
    })

    $('body').on('click', 'button.itemRemove', function () {
        $(this).parent().parent().remove();
        cartTotal();
    });


    $(".itemBtn").click(function () {
        var minus = $(this).hasClass('minus');

        var productName = $(this).parent().parent().find(".h2").text();
        var productPrice = $(this).parent().parent().find(".price").text().replace(/[^\d.-]/g, '');
        productPrice = Number(productPrice).toFixed(2);

        if (productPrice <= 0.00) {
            productPrice = $(this).parent().parent().parent().parent().parent().find(".price-main").find('.price-sub').find('.product-price').text().replace(/[^\d.-]/g, '');
            productPrice = Number(productPrice).toFixed(2);
        }

        var productId = $(this).parent().parent().find(".product-id").val();   // product id
        if (typeof (productId) == 'undefined') {
            productId = $(this).parent().parent().parent().parent().parent().find(".price-main").find('.price-sub').find('.product-id').val();      //product id
        }

        var a = "<tr><td>" + productName + "</td><td>" + productPrice + "</td><td>1</td><td>" + productPrice + "</td><td><button type='button' class='close itemRemove' aria-label='Close'><span aria-hidden='true'>&times;</span></button></td><td style='display:none'>" + productId + "</td></tr>";
        var flag = 0;
        var myCol = 0;
        var quantity = 0;
        var total = 0;
        var i = 0;
        if (minus == true) {
            $(".cartList tr").each(function () {
                var id = $(this).find("td").eq(5).text();
                if (id == productId) {
                    quantity = Number($(this).find("td").eq(2).text());
                    if (quantity > 1) {
                        quantity--;
                    } else {
                        $(this).remove();

                    }
                    flag = 1;
                    myCol = $(this).index();
                } else {
                    a = "";
                }
                i++;
            });

            if (i == 1) {
                a = "";
            } else if (flag == 0) {
                a = "";
            }
        } else {
            $(".cartList tr").each(function () {
                var id = $(this).find("td").eq(5).text();
                if (id == productId) {
                    quantity = Number($(this).find("td").eq(2).text());
                    quantity++;
                    flag = 1;
                    myCol = $(this).index();
                }
            });
        }


        total = productPrice * quantity;
        total = total.toFixed(2);

        if (flag == 1) {
            $(".cartList tr").eq(myCol).find('td').eq(2).text(quantity);
            $(".cartList tr").eq(myCol).find('td').eq(3).text(total);
            $(this).parent().find(".additionBtn").show();
        } else {
            $(".cartList").append(a);
            $(this).parent().find(".additionBtn").show();
        }

        cartTotal();

    })

    function cartTotal() {
        var total = 0;
        var items = 0;
        var products = [];
        var productData = []
        $(".cartList tr").each(function () {
            var pName = $(this).find("td").eq(0).text();
            var pPrice = $(this).find("td").eq(1).text();
            var pQuantity = $(this).find("td").eq(2).text();
            var pTotal = Number($(this).find("td").eq(3).text());
            var pId = $(this).find("td").eq(5).text();

            total = total + pTotal;
            if (items > 0) {
                products[items] = ["'" + pName + "'", "'" + pPrice + "'", "'" + pQuantity + "'", "'" + pTotal + "'", "'" + pId + "'"];

                var productDetails = {
                    product_id: pId,
                    product_name: pName,
                    product_price: pPrice,
                    product_quantity: pQuantity,
                    product_total: pTotal
                }

                productData.push(productDetails);

            }
            localStorage.setItem("items", items);
            items++;


        });

        localStorage.setItem('saveProduct', JSON.stringify(productData));
        total = total.toFixed(2);
        localStorage.setItem("cartTotal", total);
        $(".cartTotal").text(total);
        $(".itemCount").text(items - 1);
    }
})