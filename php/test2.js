$(document).ready(function(){
    $('.btn-primary').click(function (e) {
        e.preventDefault();
        
        var name = $('#name').val();
        var comment = $('#comment').val();
        
        $.ajax
        ({
            type: "POST",
            url: "insertpost.php",
            data: { "name": name, "comment": comment },
            success: function (data) {
                $('.result').html(data);
                $('#test')[0].reset();
            }
        });
    });
});