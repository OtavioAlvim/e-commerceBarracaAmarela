$(document).ready(function () {
    // Inicialização da página
    var userid = $("#userid").val()
    $.ajax({
        url: '../lib/finalizacao/CarregaItensPedido.php',
        method: 'GET',
        data: {
            userid: userid // Inclua o valor oculto nos dados da requisição
        },
        success: function (data) {
            // Atualize o conteúdo da página com os dados iniciais
            $('#itens').html(data);
        }
    });
    // Inicialização da página
    $.ajax({
        url: '../lib/finalizacao/CarregaEndereco.php',
        method: 'GET',
        data: {
            userid: userid // Inclua o valor oculto nos dados da requisição
        },
        success: function (data) {
            // Atualize o conteúdo da página com os dados iniciais
            $('#entrega').html(data);
        }
    });
    $.ajax({
        url: '../lib/finalizacao/CarregaFormaPgto.php',
        method: 'GET',
        data: {
            userid: userid // Inclua o valor oculto nos dados da requisição
        },
        success: function (data) {
            // Atualize o conteúdo da página com os dados iniciais
            $('#floatingSelectGrid').html(data);
        }
    });
});

$("#salvarDados").on('click', function () {
    $("#loadingDiv").show();
    var userid = $("#userid").val()

    $.ajax({
        type: "POST",
        url: "../processamento/insereProduto.php",
        data: {
            userid: userid,
        },
        success: function (response) {
            // Esconder a div de carregamento quando a requisição for bem-sucedida
            $("#loadingDiv").hide();
        },
        error: function (xhr, status, error) {
            // Esconder a div de carregamento em caso de erro
            $("#loadingDiv").hide();
            console.error("Erro na requisição AJAX: " + status + " - " + error);
        }
    });
});