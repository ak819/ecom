/*
 * jQuery myCart - v1.7 - 2018-03-07
 * http://asraf-uddin-ahmed.github.io/
 * Copyright (c) 2017 Asraf Uddin Ahmed; Licensed None
 */

(function ($) {

  "use strict";

  var OptionManager = (function () {
    var objToReturn = {};

    var _options = null;
    var DEFAULT_OPTIONS = {
      currencySymbol: '$',
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      classProductQuantity: 'my-product-quantity',
      classProductRemove: 'my-product-remove',
      classCheckoutCart: 'my-cart-checkout',
      affixCartIcon: true,
      showCheckoutModal: true,
      numberOfDecimals: 2,
      cartItems: null,
      clickOnAddToCart: function ($addTocart) {},
      afterAddOnCart: function (products, totalPrice, totalQuantity) {},
      clickOnCartIcon: function ($cartIcon, products, totalPrice, totalQuantity) {},
      checkoutCart: function (products, totalPrice, totalQuantity) {
        return false;
      },
      getDiscountPrice: function (products, totalPrice, totalQuantity) {
        return null;
      }
    };


    var loadOptions = function (customOptions) {
      _options = $.extend({}, DEFAULT_OPTIONS);
      if (typeof customOptions === 'object') {
        $.extend(_options, customOptions);
      }
    };
    var getOptions = function () {
      return _options;
    };

    objToReturn.loadOptions = loadOptions;
    objToReturn.getOptions = getOptions;
    return objToReturn;
  }());

  var MathHelper = (function () {
    var objToReturn = {};
    var getRoundedNumber = function (number) {
      if (isNaN(number)) {
        throw new Error('Parameter is not a Number');
      }
      number = number * 1;
      var options = OptionManager.getOptions();
      return number.toFixed(options.numberOfDecimals);
    };
    objToReturn.getRoundedNumber = getRoundedNumber;
    return objToReturn;
  }());

  var ProductManager = (function () {
    var objToReturn = {};

    /*
    PRIVATE
    */
    localStorage.products = localStorage.products ? localStorage.products : "";
    var getIndexOfProduct = function (id) {
      var productIndex = -1;
      var products = getAllProducts();
      $.each(products, function (index, value) {
        if (value.name == id) {
          productIndex = index;
          return;
        }
      });
      return productIndex;
    };
 //////////////////////////////    My script  //////////////////////////////////////////////// 
    var setAllProducts = function (products) {
      localStorage.products = JSON.stringify(products);

     //console.log(localStorage.products);
       $.post(appRoot+"storecart", {products:localStorage.products}, function(data){ 
        
       //var flag=$('#flag').attr('data-id');
               if(data)
               {
                 window.location.href = appRoot+"cart";
                 /*if(flag=="products")
                 {


                 }else{

                    window.location.href = appRoot+"cart";
                 }*/
            
               }
            });


    };
    var updatecart = function (products) {
      localStorage.products = JSON.stringify(products);

     console.log(localStorage.products);
       $.post(appRoot+"updatecart", {products:localStorage.products}, function(data){ 
           //var flag=$('#flag').attr('data-id');
               if(data)
               {
                   window.location.href = appRoot+"cart";  
                 /*if(flag=="products")
                 {


                 }else{

                    window.location.href = appRoot+"cart";
                 }*/

                  
               }
            });


    };
    var addProduct = function (id, packid, name, price, quantity, image) {
      var products = getAllProducts();
      products.push({
        id: id,
        packid:packid,
        name: name,
        price: price,
        quantity: quantity,
        image: image
      });
      setAllProducts(products);
    };

    /*
    PUBLIC
    */
    var getAllProducts = function () {
      try {
        var products = JSON.parse(localStorage.products);
        return products;
      } catch (e) {
        return [];
      }
    };
    var updateProduct = function (id, quantity) {

     // alert(id);

      var addqty=$('#spinner').val();

      var productIndex = getIndexOfProduct(id);
      if (productIndex < 0) {

        return false;

      }
      var products = getAllProducts();
      products[productIndex].quantity = typeof quantity === "undefined" ? parseInt(products[productIndex].quantity) + parseInt(addqty)  : quantity;
      updatecart(products);
      return true;
    };
    var setProduct = function (id,packid, name, price, quantity, image) {
      if (typeof id === "undefined") {
        console.error("id required");
        return false;
      }
      if (typeof packid === "undefined") {
        console.error("packid required");
        return false;
      }
      if (typeof name === "undefined") {
        console.error("name required");
        return false;
      }
      if (typeof image === "undefined") {
        console.error("image required");
        return false;
      }
      if (!$.isNumeric(price)) {
        console.error("price is not a number");
        return false;
      }
      if (!$.isNumeric(quantity)) {
        console.error("quantity is not a number");
        return false;
      }

      if (!updateProduct(name)) {

       
        addProduct(id, packid, name, price, quantity, image);
      }
    };
    var clearProduct = function () {
      setAllProducts([]);
    };
    var removeProduct = function (id) {
      var products = getAllProducts();
      products = $.grep(products, function (value, index) {
        return value.id != id;
      });
      updatecart(products);
    };
    var getTotalQuantity = function () {
      var total = 0;
      var products = getAllProducts();
      $.each(products, function (index, value) {
        total += value.quantity * 1;
      });
      return total;
    };
    var getTotalPrice = function () {
      var products = getAllProducts();
      var total = 0;
      $.each(products, function (index, value) {
        total += value.quantity * value.price;
        total = MathHelper.getRoundedNumber(total) * 1;
      });
      return total;
    };

    objToReturn.getAllProducts = getAllProducts;
    objToReturn.updateProduct = updateProduct;
    objToReturn.setProduct = setProduct;
    objToReturn.clearProduct = clearProduct;
    objToReturn.removeProduct = removeProduct;
    objToReturn.getTotalQuantity = getTotalQuantity;
    objToReturn.getTotalPrice = getTotalPrice;
    return objToReturn;
  }());


  var loadMyCartEvent = function (targetSelector) {

    var options = OptionManager.getOptions();
    var $cartIcon = $("." + options.classCartIcon);
    var $cartBadge = $("." + options.classCartBadge);
    var classProductQuantity = options.classProductQuantity;
    var classProductRemove = options.classProductRemove;
    var classCheckoutCart = options.classCheckoutCart;

    var idCartModal = 'my-cart-modal';
    var idCartTable = 'my-cart-table';
    var idGrandTotal = 'my-cart-grand-total';
    var idEmptyCartMessage = 'my-cart-empty-message';
    var idDiscountPrice = 'my-cart-discount-price';
    var classProductTotal = 'my-product-total';
    var classAffixMyCartIcon = 'my-cart-icon-affix';


    if (options.cartItems && options.cartItems.constructor === Array) {
      ProductManager.clearProduct();
      $.each(options.cartItems, function () {
        ProductManager.setProduct(this.id, this.packid, this.name, this.price, this.quantity, this.image);
      });
    }

    $cartBadge.text(ProductManager.getTotalQuantity());

    if (!$("#" + idCartModal).length) {
      $('body').append(
        '<div class="modal fade" id="' + idCartModal + '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">' +
        '<div class="modal-dialog" role="document">' +
        '<div class="modal-content">' +
        '<div class="modal-header">' +
        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
        '<h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</h4>' +
        '</div>' +
        '<div class="modal-body">' +
        '<table class="table table-hover table-responsive" id="' + idCartTable + '"></table>' +
        '</div>' +
        '<div class="modal-footer">' +
        '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>' +
        '<button type="button" class="btn btn-primary ' + classCheckoutCart + '">Checkout</button>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>'
      );
    }

    var drawTable = function () {
      var $cartTable = $("#" + idCartTable);
      $cartTable.empty();

      var products = ProductManager.getAllProducts();
      $.each(products, function () {
        var total = this.quantity * this.price;
        $cartTable.append(
          '<tr title="' + this.summary + '" data-id="' + this.id + '" data-price="' + this.price + '">' +
          '<td class="text-center" style="width: 30px;"><img width="30px" height="30px" src="' + this.image + '"/></td>' +
          '<td>' + this.name + '</td>' +
          '<td title="Unit Price" class="text-right">' + options.currencySymbol + MathHelper.getRoundedNumber(this.price) + '</td>' +
          '<td title="Quantity"><input type="number" min="1" style="width: 70px;" class="' + classProductQuantity + '" value="' + this.quantity + '"/></td>' +
          '<td title="Total" class="text-right ' + classProductTotal + '">' + options.currencySymbol + MathHelper.getRoundedNumber(total) + '</td>' +
          '<td title="Remove from Cart" class="text-center" style="width: 30px;"><a href="javascript:void(0);" class="btn btn-xs btn-danger ' + classProductRemove + '">X</a></td>' +
          '</tr>'
        );
      });

      $cartTable.append(products.length ?
        '<tr>' +
        '<td></td>' +
        '<td><strong>Total</strong></td>' +
        '<td></td>' +
        '<td></td>' +
        '<td class="text-right"><strong id="' + idGrandTotal + '"></strong></td>' +
        '<td></td>' +
        '</tr>' :
        '<div class="alert alert-danger" role="alert" id="' + idEmptyCartMessage + '">Your cart is empty</div>'
      );

      var discountPrice = options.getDiscountPrice(products, ProductManager.getTotalPrice(), ProductManager.getTotalQuantity());
      if (products.length && discountPrice !== null) {
        $cartTable.append(
          '<tr style="color: red">' +
          '<td></td>' +
          '<td><strong>Total (including discount)</strong></td>' +
          '<td></td>' +
          '<td></td>' +
          '<td class="text-right"><strong id="' + idDiscountPrice + '"></strong></td>' +
          '<td></td>' +
          '</tr>'
        );
      }

      showGrandTotal();
      showDiscountPrice();
    };
    var showModal = function () {
      drawTable();
      $("#" + idCartModal).modal('show');
    };
    var updateCart = function () {
      $.each($("." + classProductQuantity), function () {
        var id = $(this).attr('data-name');
        ProductManager.updateProduct(id, $(this).val());
      });
    };
    var showGrandTotal = function () {
      $("." + idGrandTotal).text(MathHelper.getRoundedNumber(ProductManager.getTotalPrice()));
    };
    var showDiscountPrice = function () {
      $("#" + idDiscountPrice).text(options.currencySymbol + MathHelper.getRoundedNumber(options.getDiscountPrice(ProductManager.getAllProducts(), ProductManager.getTotalPrice(), ProductManager.getTotalQuantity())));
    };

    /*
    EVENT
    */
    if (options.affixCartIcon) {
      var cartIconBottom = $cartIcon.offset().top * 1 + $cartIcon.css("height").match(/\d+/) * 1;
      var cartIconPosition = $cartIcon.css('position');
      $(window).scroll(function () {
        $(window).scrollTop() >= cartIconBottom ? $cartIcon.addClass(classAffixMyCartIcon) : $cartIcon.removeClass(classAffixMyCartIcon);
      });
    }

    $cartIcon.click(function () {
      //options.showCheckoutModal ? showModal() : options.clickOnCartIcon($cartIcon, ProductManager.getAllProducts(), ProductManager.getTotalPrice(), ProductManager.getTotalQuantity());
    });

    $(document).on("input", "." + classProductQuantity, function () {
      if($(this).val() < 0)
      {
        return false;
      }

      var price = $(this).attr('data-price');
      var id = $(this).attr('data-name');
      var quantity = $(this).val();

      $(this).parent("td").next("." + classProductTotal).html("<p>Rs."+MathHelper.getRoundedNumber(price * quantity)+"</p>");
      ProductManager.updateProduct(id, quantity);

      $cartBadge.text(ProductManager.getTotalQuantity());
      showGrandTotal();
      showDiscountPrice();
    });

    $(document).on('keypress', "." + classProductQuantity, function (evt) {
      if (evt.keyCode == 38 || evt.keyCode == 40) {
        return;
      }
      evt.preventDefault();
    });

    $(document).on('click', "." + classProductRemove, function () {

      var $tr = $(this).attr('data-div');
      var id = $(this).attr('data-id');
      $('#'+$tr).hide();
        ProductManager.removeProduct(id);
        showGrandTotal();
        $cartBadge.text(ProductManager.getTotalQuantity());
        var qty=ProductManager.getTotalQuantity();
      /*if(qty <= 0)
      {

       window.location.replace(appRoot+"cart");

      }*/
     

      
    });

    $(document).on('click', "." + classCheckoutCart, function () {
      var products = ProductManager.getAllProducts();
      if (!products.length) {
        $("#" + idEmptyCartMessage).fadeTo('fast', 0.5).fadeTo('fast', 1.0);
        return;
      }
      updateCart();
      var isCheckedOut = options.checkoutCart(ProductManager.getAllProducts(), ProductManager.getTotalPrice(), ProductManager.getTotalQuantity());

      if (isCheckedOut !== false) {
        //ProductManager.clearProduct();
        $cartBadge.text(ProductManager.getTotalQuantity());
        //$("#" + idCartModal).modal("hide");
      }
    });

    $(document).on('click', targetSelector, function () {
      var $target = $(this);
      options.clickOnAddToCart($target);

     var id = $(this).attr('data-pid');
     var packid=$(this).attr('data-packid');
      var name = $(this).attr('data-name');
      var price = $(this).attr('data-price');
      var quantity =$('#spinner').val();
      var image = $(this).attr('data-image');

      console.log(id);
      console.log(packid);
       console.log(name);
        console.log(price);
         console.log(quantity);
          console.log(image);

          //return false;
       //var popup= $(this).attr('data-popup');

      ProductManager.setProduct(id, packid, name, price, quantity, image);
      $cartBadge.text(ProductManager.getTotalQuantity());
      /* if(popup)
       {
             $('#'+popup).text("Added to cart !");
             $('#'+popup).css('display','block');
             $('#'+popup).delay(1000).fadeOut();
       }*/

      options.afterAddOnCart(ProductManager.getAllProducts(), ProductManager.getTotalPrice(), ProductManager.getTotalQuantity());
    });

  };


  $.fn.myCart = function (userOptions) {
    OptionManager.loadOptions(userOptions);
    loadMyCartEvent(this.selector);
    return this;
  };


})(jQuery);