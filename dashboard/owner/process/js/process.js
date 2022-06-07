$(document).ready(function() {
    setTimeout(function() {
        view_cat();
    }, 100);

    function view_cat() {
        var get_action = "view_category";
        $.ajax({
            url: "./process/modules/process.php",
            method: "POST",
            data: { action: get_action},
            success: function(response) {
                $("#view_category").html(response);
            }
        });
    }

});




$(document).ready(function() {
    setTimeout(function() {
        fetch_cat();
    }, 100);

    function fetch_cat() {
        var fep_action = "fetch_categories";
        $.ajax({
            url: "./process/modules/process.php",
            method: "POST",
            data: { action: fep_action },
            success: function(response) {
                $("#fetch_categories").html(response);
            }
        });
    }
        $(document).on('click', '.rl_btn_delete', function() {
        $(this).prop("disabled", true);
        var dlt_role_id = $(this).attr("id");
        var action_dlt = "delete_inventorys";
        $.ajax({
            url: "./process/modules/process.php",
            method: "POST",
            data: { action: action_dlt, delete_invetory_id: dlt_role_id },
            success: function(response) {
                alert(response);
                setTimeout(function() {
                    fetch_cat();
                }, 100);
                setTimeout(function() {
                    $(this).prop("disabled", false);
                }, 100);
            }
        });
    });

    $("#edit_inventory_form").submit(function(e) {
            e.preventDefault();
            $("#edit_inventory_form").validate();
            $("#edit_inventory_btn").prop("disabled", true);
            $.ajax({
                url: "./process/modules/process.php",
                method: "POST",
                data: $(this).serialize() + '&action=edit_inventory_forms',
                success: function(response) {
                    if (response == "Updated successfully!") {
                        console.log(response);
                        $('#edit_costume').val('');
                    }
                    setTimeout(function() {
                        $("#edit_inventory_btn").prop("disabled", false);
                    }, 100);
                    setTimeout(function() {
                                fetch_cat();
                      }, 100);
                      setTimeout(function() {
                                  location.reload();
                        }, 100);
                }
            });
        });

        $('#add_category').validate();
        $('#add_category_btn').click(function(e) {
            if (document.querySelector('#add_category').checkValidity()) {
                e.preventDefault();
                //$(':button[type="button"]').prop('disabled', true);
                $('#add').prop('disabled', true);
                $.ajax({
                    url: './process/modules/process.php',
                    method: 'post',
                    data: $('#add_category').serialize() + '&action=add_category',
                    success: function(res) {
                        alert(res);
                        setTimeout(function() {
                            fetch_cat();
                        }, 100);
                        setTimeout(function() {
                            $(':button[type="button"]').prop('disabled', false);
                        }, 1000);
                    }
                });
            }
        });
        });


$(document).ready(function(){
  setTimeout(function() {
      fetch_return_costume();
  }, 100);

  function fetch_return_costume() {
      var fcrs_action = "fetch_return_rented";
      $.ajax({
          url: "./process/modules/process.php",
          method: "POST",
          data: { action: fcrs_action },
          success: function(response) {
              $("#returneditems").html(response);
          }
      });
  }

  });


$(document).ready(function(){

    setTimeout(function() {
        fetch_rented_costume();
    }, 100);

    function fetch_rented_costume() {
        var fcr_action = "fetch_costume_rented";
        $.ajax({
            url: "./process/modules/process.php",
            method: "POST",
            data: { action: fcr_action },
            success: function(response) {
                $("#rentedInfo").html(response);
            }
        });
    }
    $(document).on('click', '.returnItem', function() {
        $(".returnItem").prop("disabled", true);
        var returned_id = $(this).attr("id");
        var returned_action = "returnedcostume";
        $.ajax({
            url: "./process/modules/process.php",
            method: "POST",
            dataType: "json",
            data: { action: returned_action, returnId: returned_id },
            success: function(response) {
              console.log(response);

              $("#costName").val(response[8]);
              $("#orderID").val(response[1]);
              $("#pid").val(response[8]);
                  setTimeout(function() {
                      $(".returnItem").prop("disabled", false);
                  }, 100);
          }
        });
    });

    $("#returned_form").submit(function(e) {
        e.preventDefault();
        $("#returned_form").validate();
        $("#returned_btn").prop("disabled", true);
        $.ajax({
            url: "./process/modules/process.php",
            method: "POST",
            data: $(this).serialize() + '&action=edit_returned_forms',
            success: function(response) {
                    alert(response);
                setTimeout(function() {
                    $("#returned_btn").prop("disabled", false);
                }, 100);
                setTimeout(function() {
                    fetch_rented_costume();
                  }, 100);
                  setTimeout(function() {
                              location.reload();
                    }, 100);
            }
        });
    });
});

$(document).ready(function() {
    setTimeout(function() {
        fetch_costume();
    }, 100);

    function fetch_costume() {
        var f_costume_action = "fetch_costumes";
        $.ajax({
            url: "./process/modules/process.php",
            method: "POST",
            data: { action: f_costume_action },
            success: function(response) {
                $("#costumes_list").html(response);
            }
        });
    }

    $('form#add_costume_record').submit(function(e){
        e.preventDefault();
        var image_name = $('#image').val();
        if (image_name == '') {
            alert("Please Select Image");
            return false;
        } else {
            var extension = $('#image').val().split('.').pop().toLowerCase();
            if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                alert("Invalid Image File");
                $('#image').val('');
                return false;
            } else {
                $.ajax({
                    url: "./process/modules/process.php",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                      console.log(data);
                        alert(data);
                        setTimeout(function() {
                            fetch_costume();
                        }, 100);
                        //fetch_edit_cotume();
                        $('#add_costume_record')[0].reset();

                    }
                });
            }
        }
    });



    $(document).on('click', '.update_role_btn', function() {
        $("#edit_role_btn").prop("disabled", true);
        var edit_id = $(this).attr("id");
        var edit_action = "assgn_edit_id_form";

        $.ajax({
            url: "./process/modules/process.php",
            method: "POST",
            dataType: 'json',
            data: { action: edit_action, cost_id: edit_id },
            success: function(response) {
              console.log(response);
                    $('#cost_id_ajax').val(response.id);
                    $('#edit_costume').val(response.cat_name);

          }
        });
    });

    $(document).on('click', '.edit_costume', function() {
        $("#edit_costume").prop("disabled", true);
        var edit_id = $(this).attr("id");
        var edit_cost_action = "costme_edit_id_form";
        console.log(edit_id);
        $.ajax({
            url: "./process/modules/process.php",
            method: "POST",
            dataType: 'json',
            data: { action: edit_cost_action, edit_cost_id: edit_id },
            success: function(data) {
              console.log(data);
                    $('#pid').val(data.id);
                    $('#costume_name').val(data.c_name);
                      $('#attachment').html('<img src="data:image/jpeg;base64,base64'+data.c_image+'" />');;
                        $('#cat').val(data.cat_name);
                          $('#size').val(data.c_size);
                            $('#price').val(data.c_price);
                              $('#stock').val(data.c_stock);
                                $('#description').val(data.c_description);
                                $('#availability').val(data.c_availability);
          }
        });
    });
                $(document).on('click', '.delete_costume', function() {
                $(this).prop("disabled", true);
                var dlt_cost_id = $(this).attr("id");
                var action_dlt = "delete_cost";
                $.ajax({
                    url: "./process/modules/process.php",
                    method: "POST",
                    data: { action: action_dlt, delete_cost_id: dlt_cost_id },
                    success: function(response) {
                        alert(response);
                        setTimeout(function() {
                            fetch_costume();
                        }, 100);
                        setTimeout(function() {
                            $(this).prop("disabled", false);
                          }, 100);
                        }
                      });
                  });

    });

  $(document).ready(function() {
    $("form#shit_form").submit(function(event) {
    event.preventDefault();
    var image_names = $('#imahe').val();
    if (image_names == '') {
        alert("Please Select Image");
        return false;
    }
    else {
        var extension = $('#imahe').val().split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            alert("Invalid image File");
            $('#imahe').val('');
            return false;
        } else {
            $.ajax({
                url: "./process/modules/editcostumes.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(data) {
                    alert(data);
                    setTimeout(function() {
                      fetch_costume();
                      }, 100);
                    // $('#imageModal').modal('hide');
                }
            });
        }
    }
    });
      });


    $(document).ready(function() {
        setTimeout(function() {
            fetch_user_rental();
        }, 100);

        function fetch_user_rental() {
            var ren_action = "userRental";
            $.ajax({
                url: "./process/modules/process.php",
                method: "POST",
                data: { action: ren_action },
                success: function(response) {
                    $("#userRental").html(response);
                }
            });
        }

        $(document).on('click', '.acceptuser', function() {
            $(".acceptuser").prop("disabled", true);
            var accept_id = $(this).attr("id");
            var accept_action = "acceptUserRental";
            $.ajax({
                url: "./process/modules/process.php",
                method: "POST",
                data: { action: accept_action, acceptId: accept_id },
                success: function(response) {
                  console.log(response);
                  setTimeout(function() {
                        fetch_user_rental();
                  }, 100);
                      setTimeout(function() {
                          $(".acceptuser").prop("disabled", false);
                      }, 100);


              }
            });
        });

        $(document).on('click', '.declineuser', function() {
        $(this).prop("disabled", true);
        var dcline_id = $(this).attr("id");
        var action_dcline = "declineUsers";
        $.ajax({
            url: "./process/modules/process.php",
            method: "POST",
            data: { action: action_dcline, declineId: dcline_id },
            success: function(response) {
                alert(response);
                setTimeout(function() {
                    fetch_user_rental();
                }, 100);
                setTimeout(function() {
                    $(this).prop("disabled", false);
                }, 100);
            }
        });
    });

    $(document).on('click', '.modalId', function() {
        $(".modalId").prop("disabled", true);
        var modal_fetch_id = $(this).attr("id");
        var fetch_modal_action = "modalFetch";

        $.ajax({
            url: "./process/modules/process.php",
            method: "POST",
            dataType: 'json',
            data: { action: fetch_modal_action, modal_fe_id: modal_fetch_id },
            success: function(response) {
              console.log(response);
                            setTimeout(function() {
                              $('#runame').val(response.names);
                              $('#ruaddress').val(response.aaddress);
                                $('#rucontact').val(response.phone);
                                  $('#rupickupD').val(response.pickup_date);
                                    $('#ruReturnupD').val(response.return_date);
                                      $('#ruItemName').val(response.products);
                            }, 100);
                            setTimeout(function() {
                                fetch_user_rental();
                            }, 100);
                            setTimeout(function() {
                                $(this).prop("disabled", false);
                            }, 100);

          }
        });
    });

        });


        $(document).ready(function() {
            $("#onwer_sign_out").click(function(event) {
                var signout = "ship_ownr_signout";
                $.ajax({
                    url: "./process/modules/process.php",
                    method: "POST",
                    data: { action: signout },
                    success: function(data) {
                        alert(data);
                        setTimeout(function() {
                            window.location = "http://localhost/rental/";
                        }, 1000);
                }
        });
    });
});
