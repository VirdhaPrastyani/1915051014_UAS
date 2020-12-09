$(document).ready(function(){
    $("#cari-admin").click(function(){    
        $.ajax({
            url: 'http://localhost/Latihan6/halaman/ajax/tabel-admin.php',
            data: {
                keyword: $('#admin-value').val(),
            },
            type: 'POST',
            success: function(res) {
                $('.container').html(res);
            },
            error: function(error) {
                console.log(error);
            }
        })
    });

    $("#cari-reseller").click(function(){    
        $.ajax({
            url: 'http://localhost/Latihan6/halaman/ajax/tabel-reseller.php',
            data: {
                keyword: $('#reseller-value').val(),
            },
            type: 'POST',
            success: function(res) {
                $('.container').html(res);
            },
            error: function(error) {
                console.log(error);
            }
        })
    });
});