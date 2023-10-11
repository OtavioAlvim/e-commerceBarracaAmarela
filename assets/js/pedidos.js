setInterval(function () {
    // Código da solicitação AJAX aqui
    $.ajax({
        url: '../../lib/AtualizaStatusPedidos.php',
        method: 'GET',
        success: function (data) {
            // Atualize o conteúdo da página com os dados iniciais
            $('#pedidos').html(data);
            console.log(data)
        }
    });

}, 500);