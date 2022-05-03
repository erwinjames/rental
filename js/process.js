$(document).ready(function() {
    setTimeout(function() {
        fetch_costume();
    }, 100);

    function fetch_costume() {
        var get_action = "fetch_costume";
        $.ajax({
            url: "./modules/process.php",
            method: "POST",
            data: { action: get_action },
            success: function(response) {
                $("#fetch_costume").html(response);
            }
        });
    }

});

$(document).ready(function() {
    // Send product details in the server
    $(".add_cart").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submits");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var dis = $form.find(".discription").val();
      var pqty = 1;

      $.ajax({
        url: './modules/cart.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          dis: dis
        },
        success: function(response) {
            alert(response);
          //$("#message").html(response);
         // window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  