/**
 * Created by Ignas on 2015-05-04.
 */
function goBack() {
    window.history.back();
}

$(function()
{
    $("a#toggle").click(function()
    {
        $("#orders").slideToggle();
        return false;
    });
});

var cancelReservation = function(orderId) {
    $.ajax({
        url: 'OrderManager',
        type: 'POST',
        data: {orderId:orderId},
        success: function() {
            alert("success");
        },
        error: function(xhr){
            alert(xhr.status);
        }
    });
};