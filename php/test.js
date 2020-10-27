$("input:checkbox").attr("checked", false).click(function()
{
    var shcolumn="."+$(this).attr("name");
    $(shcolumn).toggle();
})
