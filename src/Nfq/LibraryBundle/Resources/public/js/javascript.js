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