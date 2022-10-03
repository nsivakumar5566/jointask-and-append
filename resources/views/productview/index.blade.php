@extends('layouts.app')
@section('content')

<html>
  <head>
    <title>jQuery Add/Remove Fields</title>
  
  </head>

  <body>
    <div class="container my-4">
      <p class="h6">Product Add/Remove Fields</p>
      <div class="card my-4 shadow">  
        <div class="card-body">
          <form action="{{ route('product.store')}}" method="POST">
          <!-- @csrf -->
          <div class="row">
            <div class="col-md-6">
            <div class="form-group">
          <label for="field" class=""><span style="color:red;">Customer Name*</span></label>
          <input type="text" id="field" class="form-control" name="name" />
        </div>
          </div>
          <div class="col-md-6">
          <div class="form-group">
          <label for="field" class=""><span style="color:red;">Customer Address*</span></label>
          <input type="text" id="field" class="form-control" name="address" />
        </div>
          </div>
        </div>
<br><br><br>
       <div class="row">
        <div class="col-md-3">
          <label>Product Name*</label>
        </div>
        <div class="col-md-3">
        <label>Product Price*</label>
        </div>
        <div class="col-md-3">
        <label>Product Qty*</label>
        </div>
        <div class="col-md-3">
        <label>sub total*</label>
        </div>
       </div>

    <div class="row" style="align-items: center;">
  <div class="col-md-10 dynamic-field" id="dynamic-field-1">
    <div class="row" >
    <div class="col-md-3">
        <div class="form-group">
          <label for="field" class="hidden-md"></label>
          <input type="text" id="field" class="form-control" name="product[]" />
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="field" class="hidden-md"></label>
          <input type="number" id="price" class="product-price form-control" name="price[]" />
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label for="field" class="hidden-md"></label>
          <input type="number" id="qty" class="product-qty form-control" name="qty[]" />
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label></label>
          <input type="number" class="form-control subtotal" id="sub-total-1" name="total[]" readonly>
        </div>
        </div>
   </div>
  </div>  

 
  <div class="col-md-2 mt-30 append-buttons">
    <div class="clearfix">
      <button type="button" id="add-button" class="btn btn-secondary float-left text-uppercase shadow-sm"><i class="fa fa-plus fa-fw"></i>
      </button>
      <button type="button" id="remove-button" class="btn btn-secondary float-left text-uppercase ml-1" disabled="disabled"><i class="fa fa-minus fa-fw"></i>
      </button>
    </div>
  </div>
</div>
<div style ="float:right; margin-right:15rem; color:#0d6efd;" class="col-md-2 mt-3">
        <div class="form-group">
          <label>Total Amount*</label>
          <input type="number" class="form-control totalamount" id="total-amount" name="totalamount" >
        </div>
        </div>
<button type="submit" class="btn btn-primary mt-3">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>


<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<script>
$(document).ready(function() {
  var buttonAdd = $("#add-button");
  var buttonRemove = $("#remove-button");
  var className = ".dynamic-field";
  var count = 0;
  var field = "";
  var maxFields =50;

  function totalFields() {
    return $(className).length;
  }


  function addNewField() {
    count = totalFields() + 1;
    field = $("#dynamic-field-1").clone();
    field.attr("id", "dynamic-field-" + count);
    field.children("label").text("Field " + count);
    field.find("input").val("");
    $(className + ":last").after($(field));
  }


  function removeLastField() {
    if (totalFields() > 1) {
      $(className + ":last").remove();
    }
  }

  function enableButtonRemove() {
    if (totalFields() === 2) {
      buttonRemove.removeAttr("disabled");
      buttonRemove.addClass("shadow-sm");
    }
  }

  function disableButtonRemove() {
    if (totalFields() === 1) {
      buttonRemove.attr("disabled", "disabled");
      buttonRemove.removeClass("shadow-sm");
    }
  }

  function disableButtonAdd() {
    if (totalFields() === maxFields) {
      buttonAdd.attr("disabled", "disabled");
      buttonAdd.removeClass("shadow-sm");
    }
  }

  function enableButtonAdd() {
    if (totalFields() === (maxFields - 1)) {
      buttonAdd.removeAttr("disabled");
      buttonAdd.addClass("shadow-sm");
    }
  }

  buttonAdd.click(function() {
    addNewField();
    enableButtonRemove();
    disableButtonAdd();
  });

  buttonRemove.click(function() {
    removeLastField();
    disableButtonRemove();
    enableButtonAdd();
  });
});
</script>

<script>
$(document).ready(function() {

  $(document).on('change', '.product-qty', function () {
    $price = $(this).parents('.dynamic-field').find('.product-price').val();
    $qty = $(this).parents('.dynamic-field').find('.product-qty').val(); 
    
    $subtotal = $price*$qty;
    //$('#sub-total-1').val($subtotal);
    $(this).parents('.dynamic-field').find('.subtotal').val($subtotal);
    orderTotalAmount();
});

$(document).on('change', '.product-price', function () {
    $price = $(this).parents('.dynamic-field').find('.product-price').val();
    $qty = $(this).parents('.dynamic-field').find('.product-qty').val(); 
    
    $subtotal = $price*$qty;
    //$('#sub-total-1').val($subtotal);
    $(this).parents('.dynamic-field').find('.subtotal').val($subtotal);
    orderTotalAmount();
});

function orderTotalAmount() {
                var price_total = 0;
                $('.subtotal').each(function (i, obj) {
                    price_total = +price_total + +this.value;
                });
               
                var final = +price_total;
                $('#total-amount').val(final);
            }
});
</script> 
@endsection 