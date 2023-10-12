$(document).ready(function () {
    // Inicialização da página
    $.ajax({
        url: '../lib/finalizacao/CarregaItensPedido.php',
        method: 'GET',
        success: function (data) {
            // Atualize o conteúdo da página com os dados iniciais
            $('#itens').html(data);
        }
    });
    // Inicialização da página
    $.ajax({
        url: '../lib/finalizacao/CarregaEndereco.php',
        method: 'GET',
        success: function (data) {
            // Atualize o conteúdo da página com os dados iniciais
            $('#entrega').html(data);
        }
    });
    $.ajax({
        url: '../lib/finalizacao/CarregaFormaPgto.php',
        method: 'GET',
        success: function (data) {
            // Atualize o conteúdo da página com os dados iniciais
            $('#floatingSelectGrid').html(data);
        }
    });
});