$(document).ready(function () {
    // Código da solicitação AJAX aqui
    var userid = $("#userid").val()
    $.ajax({
        url: '../../lib/pedidos/AtualizaStatusPedidos.php',
        method: 'GET',
        data: { userid: userid },
        success: function (data) {
            // Atualize o conteúdo da página com os dados iniciais
            $('#pedidos').html(data);

        }
    });

}),

setInterval(function () {
    // Código da solicitação AJAX aqui
    var userid = $("#userid").val()
    $.ajax({
        url: '../../lib/pedidos/AtualizaStatusPedidos.php',
        method: 'GET',
        data: { userid: userid },
        success: function (data) {
            // Atualize o conteúdo da página com os dados iniciais
            $('#pedidos').html(data);
        }
    });

}, 500);