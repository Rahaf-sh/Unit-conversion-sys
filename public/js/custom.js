

$(document).on("click", ".show-total-units", function() {
    var product_id = $(this).data('id');
    console.log("Show Total units")
    console.log(product_id)
    $.ajax({
        type: 'get',
        url: "/totalunits/" + product_id,
        success: function(data) {
            console.log(data);
            $('#main-Modal').modal('show');
            $('#header').html("<strong>Product:</strong> " + data['product']);
            $('#units').html("<strong>Total units:</strong> " + data['total']);
        }
    });

});
$(document).on("click", ".show-total-subunits", function() {
    var product_id = $(this).data('id');
    console.log("Show Total subunits")
    console.log(product_id)
    $.ajax({
        type: 'get',
        url: "/totalSubunits/" + product_id,
        success: function(data) {
            console.log(data);
            $('#main-Modal').modal('show');
            $('#header').html("<strong>Product:</strong> " + data['product']);
            $('#units').html("<strong>Total Subunits:</strong> " + data['total']);
        }
    });

});
$(document).ready(function () {
    var unitId = $("#unit_id").val();
    console.log(unitId)
    $.ajax({
        type: 'get',
        url: "/fetchSubunits/" +unitId ,
        success: function(data) {
            console.log(data);
            $('#subunit_id').empty();
            $.each(data, function(i, item) {
                var $tr = $("<option value=" + item.id + ">" + item.subunit + "</option>");
                $tr.appendTo('#subunit_id');

            });

        }
    });
  });
$(document).on("change", ".fetch_subunits", function() {
    var unitId = $("#unit_id").val();
    console.log(unitId)
    $.ajax({
        type: 'get',
        url: "/fetchSubunits/" +unitId ,
        success: function(data) {
            console.log(data);
            $('#subunit_id').empty();
            $.each(data, function(i, item) {
                var $tr = $("<option value=" + item.id + ">" + item.subunit + "</option>");
                $tr.appendTo('#subunit_id');

            });

        }
    });
});
$(document).on("click", ".convert-function", function() {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });
    var value      = $("#value").val();
    var unitId     = $("#unit_id").val();
    var subunit_id = $("#subunit_id").val();
    console.log("Convert Function")
    $.ajax({
        type: 'post',
        url: "/convertFunction" ,
        data:{
            value: value,
            unitId: unitId,
            subunit_id: subunit_id
          },
        success: function(data) {
            console.log(data);
            $('#main-Modal').modal('show');
            $('#header').html("<strong>Convert Result:</strong> " + data['total']);
        }
    });

});