function ajax(){
    $.ajax({
        url: "testsAjax.php",
        type: "post",
        dataType: 'text',
        data: {value: $("#moedaInput").val()},
        success: function(response){
            alert(response);
        },
        error: function(response){
            alert("error!!!");
        }
    });
}