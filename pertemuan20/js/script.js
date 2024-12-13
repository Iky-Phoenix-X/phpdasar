$(document).ready(function () {
    // Hilangkan tombol cari
    $('#tombol-cari').hide();

    // Membuat event ketika keyword ditulis
    $('#keyword').on('keyup', function () {

        // munculkan icon loading
        $('.loader').show();

        // Ambil nilai dari input keyword
        const keyword = $('#keyword').val();

        // Load data mahasiswa ke dalam container
        //     ajax menggunakan load
        // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

        // ajax menggunakan $.ger()
        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {
            
            $('#container').html(data);

            $('.loader').hide();

        });
    });
});