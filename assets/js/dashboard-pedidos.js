$(document).ready(function () {
    // Código da solicitação AJAX aqui
    $.ajax({
        url: '../../lib/dashboard-pedidos/CarregaPedidos.php',
        method: 'GET',
        success: function (data) {
            // Atualize o conteúdo da página com os dados iniciais
            $('#conteudo').html(data);
            console.log(data)
        }
    });

});