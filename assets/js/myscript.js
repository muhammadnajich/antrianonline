const flashdata = $('.flash-data').data('flashdata');
if (flashdata) {
    Swal.fire({
        title: 'Data ' + flashdata,
        text: '',
        type: 'success'
    });
}

//Tombol Hapus
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'data akan dihapus',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    });
});

$('.tombol-keluar').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Akan keluar dari aplikasi ini',
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Keluar'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    });
});