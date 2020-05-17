<script>
$('#title').text('Products');      
$("#cover-spin").show();
$(document).ready(function(){
    var pro_id_after_load ; /*for load product_id in url when scrolling event work*/
    var sub_cat_id , last_pro_id ;
    //to load list of product-list
    $.ajax({
        type: 'GET',
        url: "@php route('apps.category.sub.product.list', $sub_cat_id ) @endphp",
        cache: false,
        dataType: 'json',
        beforeSend: function () {
            $("#shop-list").load(window.location + " #shop-list");
        },
        success: function (data) {

            last_pro_id = data.last_pro_id.product_id;
            
            sub_cat_id = data.products[0].sub_cat_id;

            $("#cover-spin").hide();

            if (data.success == 1) {

                for (var count = 0; count < data.products.length; count++) {
                    /*Active and In hand Stoc Products */
                    if (data.products[count].product_in_hand_stock > 0) {

                        if (data.products[count].product_offers > 0) {
                            $("#product-list").append('<div class="cat-each">'
                                + '<div class="product"><div class="product-header">'
                                + '<a href={{ url(' / apps / show - single - product')}}/' + data.products[count].product_id + '>'
                                + '<img class="img-fluid" src="http://grofie.in/' + data.products[count].product_image_main + '" alt=""></a>'
                                + '</div><div class="product-body">'
                                + '<h5>' + data.products[count].product_name + '</h5>'
                                + '<h6><span class="mdi mdi-approval"></span> Unite - <span>' + data.products[count].unit_name_sm + '</span></h6>'
                                + '</div>'
                                + '<div class="product-footer">'
                                + '<p class="offer-price mb-0">'
                                + '<span class="regular-price">Rs. ' + data.products[count].product_sell_price + '</span>'
                                + '<span class="badge badge-danger">' + data.products[count].product_offers + '% OFF</span>'
                                + '</p>'
                                + '<p class="price">Rs. ' + data.products[count].product_sell_price_after_offer + '</p>'
                            + '<button type="button" class="btn add-to-cart" data-url={{url('apps / single / add - to - cart')}}/' + data.products[count].product_id + '/1><i class="mdi mdi-cart-outline"></i> buy</button><div class="clearfix"></div></div></div></div>');
                        }
                        else {
                            $("#product-list").append('<div class="cat-each">'
                                + '<div class="product"><div class="product-header">'
                                + '<a href={{ url(' / apps / show - single - product')}}/' + data.products[count].product_id + '>'
                                + '<img class="img-fluid" src="http://grofie.in/' + data.products[count].product_image_main + '" alt=""></a>'
                                + '</div><div class="product-body">'
                                + '<h5>' + data.products[count].product_name + '</h5>'
                                + '<h6><span class="mdi mdi-approval"></span> Unite - <span>' + data.products[count].unit_name_sm + '</span></h6>'
                                + '</div>'
                                + '<div class="product-footer">'
                                + '<p class="offer-price mb-0">'

                                + '</p>'
                                + '<p class="price">Rs. ' + data.products[count].product_sell_price + '</p>'
                                + '<span class="regular-price"></span>'
                                + '<span class="badge badge-danger"></span>'
                            + '<button type="button" class="btn add-to-cart" data-url={{url('apps / single / add - to - cart')}}/' + data.products[count].product_id + '/1><i class="mdi mdi-cart-outline"></i> buy</button><div class="clearfix"></div></div></div></div>');
                        }
                    }
                    /*Active and In hand Stoc Products */
                    else {
                        if (data.products[count].product_offers > 0) {
                            $("#product-list").append('<div class="cat-each not-aviable">'
                                + '<div class="product"><div class="product-header">'
                                + '<a href={{ url(' / apps / show - single - product')}}/' + data.products[count].product_id + '>'
                                + '<img class="img-fluid" src="http://grofie.in/' + data.products[count].product_image_main + '" alt=""></a>'
                                + '</div><div class="product-body">'
                                + '<h5>' + data.products[count].product_name + '</h5>'
                                + '<h6><span class="mdi mdi-approval"></span> Unite - <span>' + data.products[count].unit_name_sm + '</span></h6>'
                                + '</div>'
                                + '<div class="product-footer">'
                                + '<p class="offer-price mb-0">'
                                + '<span class="regular-price">Rs. ' + data.products[count].product_sell_price + '</span>'
                                + '<span class="badge badge-danger">' + data.products[count].product_offers + '% OFF</span>'
                                + '</p>'
                                + '<p class="price">Rs. ' + data.products[count].product_sell_price_after_offer + '</p>'
                            + '<button type="button" class="btn add-to-cart" data-url={{url('apps / single / add - to - cart')}}/' + data.products[count].product_id + '/1><i class="mdi mdi-cart-outline"></i> buy</button><div class="clearfix"></div></div></div></div>');
                        }
                        else {
                            $("#product-list").append('<div class="cat-each not-aviable">'
                                + '<div class="product"><div class="product-header">'
                                + '<a href={{ url(' / apps / show - single - product')}}/' + data.products[count].product_id + '>'
                                + '<img class="img-fluid" src="http://grofie.in/' + data.products[count].product_image_main + '" alt=""></a>'
                                + '</div><div class="product-body">'
                                + '<h5>' + data.products[count].product_name + '</h5>'
                                + '<h6><span class="mdi mdi-approval"></span> Unite - <span>' + data.products[count].unit_name_sm + '</span></h6>'
                                + '</div>'
                                + '<div class="product-footer">'
                                + '<p class="offer-price mb-0">'

                                + '</p>'
                                + '<p class="price">Rs. ' + data.products[count].product_sell_price + '</p>'
                                + '<span class="regular-price"></span>'
                                + '<span class="badge badge-danger"></span>'
                            + '<button type="button" class="btn add-to-cart" data-url={{url('apps / single / add - to - cart')}}/' + data.products[count].product_id + '/1><i class="mdi mdi-cart-outline"></i> buy</button><div class="clearfix"></div></div></div></div>');
                        }
                    }
                    pro_id_after_load = data.products[count].product_id;  

                }//loop end

            }//if success end

        },//Ajax Success end
    });//ajax function end

    /*On Scroll event*/
    $(window).scroll(function(event){
        event.preventDefault();        
        
        if($(window).scrollTop() + $(window).height() > $(".load-more").height()){
            
            if(last_pro_id == pro_id_after_load){

                function preventDefault(e) {
                    e.preventDefault();
                }

                function disableScroll(){
                    document.body.addEventListener('touchmove', preventDefault, { passive: false });
                }

                $('.load-spin').remove();
                $('#_enpx').show();
            }
            else{
                $('.load-spin').show();
                loadmore();
            }
        
        }
    });

    function loadmore(){

        $.ajax({
        type:'GET',
        url:"{{ url('apps/product/loadmore/') }}/"+sub_cat_id+'/'+pro_id_after_load,
        dataType: 'json',

            success:function(data){  

                for(var count=0; count < data.moreProducts.length && last_pro_id != pro_id_after_load ; count++){ 
                  
                    //Prodcut has stock > 0
                    if(data.moreProducts[count].product_in_hand_stock > 0){ 

                        if(data.moreProducts[count].product_offers > 0){

                            $("#product-list").append('<div class="cat-each">'
                            +'<div class="product"><div class="product-header">'
                            +'<a href={{ url('/apps/show-single-product')}}/'+data.moreProducts[count].product_id+'>'
                            +'<img class="img-fluid" src="http://grofie.in/'+data.moreProducts[count].product_image_main+'" alt=""></a>'
                            +'</div><div class="product-body">'
                            +'<h5>'+data.moreProducts[count].product_name+'</h5>'
                            +'<h6><span class="mdi mdi-approval"></span> Unite - <span>'+data.moreProducts[count].unit_name_sm+'</span></h6>'
                            +'</div>'
                            +'<div class="product-footer">'
                            +'<p class="offer-price mb-0">'
                            +'<span class="regular-price">Rs. '+data.moreProducts[count].product_sell_price+'</span>'
                            +'<span class="badge badge-danger">'+data.moreProducts[count].product_offers+' OFF</span>'
                            +'</p>'
                            +'<p class="price">Rs. '+data.moreProducts[count].product_sell_price_after_offer+'</p>'
                            +'<button type="button" class="btn add-to-cart" data-url={{url('apps/single/add-to-cart')}}/'+data.moreProducts[count].product_id+'/1><i class="mdi mdi-cart-outline"></i> </button><div class="clearfix"></div></div></div></div>');
                        } // END [Prodcut has stock > 0 && offers >0] 
                        else{ 

                            $("#product-list").append('<div class="cat-each">'
                            +'<div class="product"><div class="product-header">'
                            +'<a href={{ url('/apps/show-single-product')}}/'+data.moreProducts[count].product_id+'>'
                            +'<img class="img-fluid" src="http://grofie.in/'+data.moreProducts[count].product_image_main+'" alt=""></a>'
                            +'</div><div class="product-body">'
                            +'<h5>'+data.moreProducts[count].product_name+'</h5>'
                            +'<h6><span class="mdi mdi-approval"></span> Unite - <span>'+data.moreProducts[count].unit_name_sm+'</span></h6>'
                            +'</div>'
                            +'<div class="product-footer">'
                            +'<p class="price">Rs. '+data.moreProducts[count].product_sell_price+'</p>'
                            +'<p class="offer-price mb-0">'
                            +'<span class="regular-price"></span>' 
                            +'<span class="badge badge-danger"></span></p>' 
                            +'<button type="button" class="btn add-to-cart" data-url={{url('apps/single/add-to-cart')}}/'+data.moreProducts[count].product_id+'/1><i class="mdi mdi-cart-outline"></i> </button><div class="clearfix"></div></div></div></div>');

                        } // END [Prodcut has stock > 0 && offers <0 ] 

                    } // END [Prodcut has stock > 0 ] 

                    //Prodcut has stock < 0         
                    else{

                        if(data.moreProducts[count].product_offers > 0){
                            $("#product-list").append('<div class="cat-each not-aviable">'
                            +'<div class="product"><div class="product-header">'
                            +'<a href={{ url('/apps/show-single-product')}}/'+data.moreProducts[count].product_id+'>'
                            +'<img class="img-fluid" src="http://grofie.in/'+data.moreProducts[count].product_image_main+'" alt=""></a>'
                            +'</div><div class="product-body">'
                            +'<h5>'+data.moreProducts[count].product_name+'</h5>'
                            +'<h6><span class="mdi mdi-approval"></span> Unite - <span>'+data.moreProducts[count].unit_name_sm+'</span></h6>'
                            +'</div>'
                            +'<div class="product-footer">'
                            +'<p class="offer-price mb-0">'
                            +'<span class="regular-price">Rs. '+data.moreProducts[count].product_sell_price+'</span>'
                            +'<span class="badge badge-danger">'+data.moreProducts[count].product_offers+' OFF</span>'
                            +'</p>'
                            +'<p class="price">Rs. '+data.moreProducts[count].product_sell_price_after_offer+'</p>'
                            +'<button type="button" class="btn add-to-cart" data-url={{url('apps/single/add-to-cart')}}/'+data.moreProducts[count].product_id+'/1><i class="mdi mdi-cart-outline"></i> </button><div class="clearfix"></div></div></div></div>');

                        }// END [Prodcut has stock < 0 && offers > 0 ] 
                        else{ 
                            $("#product-list").append('<div class="cat-each not-aviable">'
                            +'<div class="product"><div class="product-header">'
                            +'<a href={{ url('/apps/show-single-product')}}/'+data.moreProducts[count].product_id+'>'
                            +'<img class="img-fluid" src="http://grofie.in/'+data.moreProducts[count].product_image_main+'" alt=""></a>'
                            +'</div><div class="product-body">'
                            +'<h5>'+data.moreProducts[count].product_name+'</h5>'
                            +'<h6><span class="mdi mdi-approval"></span> Unite - <span>'+data.moreProducts[count].unit_name_sm+'</span></h6>'
                            +'</div>'
                            +'<div class="product-footer">'
                            +'<p class="price">Rs. '+data.moreProducts[count].product_sell_price+'</p>'
                            +'<p class="offer-price mb-0">'
                            +'<span class="regular-price"></span>' 
                            +'<span class="badge badge-danger"></span></p>' 
                            +'<button type="button" class="btn add-to-cart" data-url={{url('apps/single/add-to-cart')}}/'+data.moreProducts[count].product_id+'/1><i class="mdi mdi-cart-outline"></i> </button><div class="clearfix"></div></div></div></div>');

                        }// END [Prodcut has stock < 0 && offers < 0 ] 

                    }// END [Prodcut has stock < 0 ] 
                  
                    pro_id_after_load = data.moreProducts[count].product_id;

                }//for loop end

            }, //function end

        });//ajax end

    }// Loadmore Function End

    /*Add to cart*/
    $(document).on('click' ,'.add-to-cart',function(event){
        event.preventDefault()
        $("#cover-spin").show();
        $.ajax({
            type:'GET',
            url: $(this).data("url"),
            dataType: 'json',
            statusCode:{
                401: function() {
                    window.location = "{{route('apps.login')}}"
                }
            },
            success:function(data){
                $("#cover-spin").hide();
                if(data.success == 1){
                    $('.lara-shown').hide();
                        $('.ajax_shown').show();
                        $("#_cart_item").text(data.i);
                        $("#cover-spin").hide();
                }//data success end   
                if(data.tmessage){
                    toastr.options.positionClass = "toast-bottom-center";
                    toastr.options.timeOut = 5000;
                    toastr.success(data.tmessage);
                    $("#cover-spin").hide();

                }//tMessage end

            },//Ajax success end

        });//Ajax End

    });//Add to cart function end
  
});
</script>