$( document ).ready(function() {


var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;


manageData();


/* manage data list */
function manageData() {
    $.ajax({
        dataType: 'json',
        url: 'api/getData.php',
        data: {page:page}
    }).done(function(data){
        total_page = Math.ceil(data.total/10);
        current_page = page;


        $('#pagination').twbsPagination({
            totalPages: total_page,
            visiblePages: current_page,
            onPageClick: function (event, pageL) {
                page = pageL;
                if(is_ajax_fire != 0){
                  getPageData();
                }
            }
        });


        manageRow(data.data);
        is_ajax_fire = 1;


    });


}

/* Get Page Data*/
function getPageData() {
    $.ajax({
        dataType: 'json',
        url: 'api/getData.php',
        data: {page:page}
    }).done(function(data){
        manageRow(data.data);
    });
}


/* Add new Item table row */
function manageRow(data) {
    var rows = '';
    $.each( data, function( key, value ) {
        var bilangan = value.salary;
        var number_string = bilangan.toString(),
        sisa    = number_string.length % 3,
        rupiah  = number_string.substr(0, sisa),
        ribuan  = number_string.substr(sisa).match(/\d{3}/g); 
        if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
        }
        rows = rows + '<tr>';
        rows = rows + '<td>'+value.name+'</td>';
        rows = rows + '<td>'+value.work+'</td>';
        rows = rows + '<td>'+'Rp '+rupiah+'</td>';
        rows = rows + '<td data-id="'+value.id+'">';
        rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="btn btn-info edit-item">Edit</button> ';
        rows = rows + '<button class="btn btn-danger remove-item">Delete</button>';
        rows = rows + '</tr>';
    });


    $("tbody").html(rows);
}


/* Create new Item */
$(".crud-submit").click(function(e){
    e.preventDefault();
    var form_action = $("#create-item").find("form").attr("action");
    var name = $("#create-item").find("input[name='name']").val();
    var work = $("#create-item").find("select[name='work']").val();
    var salary = $("#create-item").find("select[name='salary']").val();


    if(name != '' && work != '' && salary != ''){
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: form_action,
            data:{name:name, work:work, salary:salary}
        }).done(function(data){
            $("#create-item").find("input[name='name']").val('');
            $("#create-item").find("select[name='work']").val('');
            $("#create-item").find("select[name='salary']").val('');
            getPageData();
            $(".modal").modal('hide');
            toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
        });
    }else{
        alert('You are missing name, work or salary.')
    }


});


/* Remove Item */
$("body").on("click",".remove-item",function(){
    var confirmation = confirm("Are you sure want to delete this item?");
    var id = $(this).parent("td").data('id');
    var c_obj = $(this).parents("tr");

    if (confirmation){
    $.ajax({
        dataType: 'json',
        type:'POST',
        url: 'api/delete.php',
        data:{id:id}
    }).done(function(data){
        c_obj.remove();
        toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
        getPageData();
    });
}

});


/* Edit Item */
$("body").on("click",".edit-item",function(){
    var id = $(this).parent("td").data('id');
    var name = $(this).parent("td").prev("td").prev("td").prev("td").text();
    var work = $(this).parent("td").prev("td").text();
    var salary = $(this).parent("td").prev("td").text();


    $("#edit-item").find("input[name='name']").val(name);
    $("#edit-item").find("select[name='work']").val();
    $("#edit-item").find("select[name='salary']").val();
    $("#edit-item").find(".edit-id").val(id);


});


/* Updated new Item */
$(".crud-submit-edit").click(function(e){


    e.preventDefault();
    var form_action = $("#edit-item").find("form").attr("action");
    var name = $("#edit-item").find("input[name='name']").val();

    var work = $("#edit-item").find("select[name='work']").val();
    var salary = $("#edit-item").find("select[name='salary']").val();
    var id = $("#edit-item").find(".edit-id").val();


    if(name != '' && work != '' && salary != ''){
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: form_action,
            data:{name:name, work:work,salary:salary,id:id}
        }).done(function(data){
            getPageData();
            $(".modal").modal('hide');
            toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
        });
    }else{
        alert('You are missing name, work or salary.')
    }


});
});