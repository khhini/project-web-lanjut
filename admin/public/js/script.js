$(function(){
    $('.tampilEdit').on('click', function(){
        const nota = $(this).data('id');
        $('#exampleModalLabel').html("Edit Stok "+nota);

        $.ajax({
            url: 'http://localhost/projectWeb/public/Stok/getEdit',
            data: { nota : nota},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#kodeSelected').val(data.kodeArea);
                $('#kodeSelected').html(data.kodeArea);
                $('#jumlah').val(data.stok);
                $('#satuan').val(data.satuan);
                $('#idBarang').val(data.idBarang);
                $('#notaMasuk').val(data.notaMasuk);
            }
        })
    })
});