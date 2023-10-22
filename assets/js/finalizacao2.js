$(document).ready(function () {
    var userid = $("#userid").val()
    // Inicialização da página
    $.ajax({
        url: '../lib/finalizacao/CarregaEndereco.php',
        method: 'GET',
        data: {
            userid: userid // Inclua o valor oculto nos dados da requisição
        },
        success: function (resposta) {
            // Atualize o conteúdo da página com os dados iniciais
            $('#entrega').html(resposta);
        }
    });

});

$("#inserir_forma").on('click', function () {
    var userid = $("#userid").val()
    var id_pedido = $("#id_pedido").val()
    var id_forma = $("#forma_pagamento_inserido").val()
    var valor_pedido = $("#valor_pedido").val()
    console.log(valor_pedido)
    if (id_forma === 'sem_valor' ||  valor_pedido === "R$: 0,00") {
        // colocar alert personalizado 
        alert('Por gentileza informe a forma de pagamento!')
    } else {
        $("#loadingDiv").show();

        $.ajax({
            type: "POST",
            url: "../lib/finalizacao/InsereFormaPgto.php",
            data: {
                userid: userid,
                id_pedido: id_pedido,
                valor_pedido: valor_pedido,
                id_forma: id_forma,

            },
            success: function (response) {
                // Esconder a div de carregamento quando a requisição for bem-sucedida
                $("#loadingDiv").hide();

                location.reload();
            },
            error: function (xhr, status, error) {
                // Esconder a div de carregamento em caso de erro
                $("#loadingDiv").hide();
                console.error("Erro na requisição AJAX: " + status + " - " + error);
            }
        });

    }
});


$("#remover_forma").on('click', function () {
    var id_pedido = $("#id_pedido").val()
    $("#loadingDiv").show();
    $.ajax({
        type: "POST",
        url: "../lib/finalizacao/RemoveFormaPgto.php",
        data: {
            id_pedido: id_pedido,

        },
        success: function (response) {
            // Esconder a div de carregamento quando a requisição for bem-sucedida
            // $("#loadingDiv").hide();
            location.reload();
        },
        error: function (xhr, status, error) {
            // Esconder a div de carregamento em caso de erro
            $("#loadingDiv").hide();
            console.error("Erro na requisição AJAX: " + status + " - " + error);
        }
    });

});




$("#salvarDados").on('click', function () {
    // $("#loadingDiv").show();
    var userid = $("#userid").val()
    var id_empresa = $("#id_empresa").val()
    var tipopedido = $("#tipopedido").val()
    var vendedor = $("#vendedor").val()
    var planopgto = $("#planopgto").val()
    var planoconta = $("#planoconta").val()
    var id_banco = $("#id_banco").val()
    var id_pedido = $("#id_pedido").val()
    var observacao = $("#floatingTextarea2").val()
    // console.log(userid)
    // console.log(id_empresa)
    // console.log(tipopedido)
    // console.log(vendedor)
    // console.log(planopgto)
    // console.log(planoconta)
    // console.log(id_banco)
    // console.log(observacao)
    // console.log(id_pedido)

    // preciso verificar essa chamada amanha de maneira que  antes de enviar a requisição para o sia ele verifique se a forma de pagamento ja esta preenchida
    $.ajax({
        type: "POST",
        url: "../lib/finalizacao/FinalizaPedido.php",
        data: {
            userid: userid,
            id_empresa: id_empresa,
            tipopedido: tipopedido,
            vendedor: vendedor,
            planopgto: planopgto,
            planoconta: planoconta,
            id_banco: id_banco,
            id_pedido: id_pedido,
            observacao: observacao,
        },
        success: function (response) {
            // Esconder a div de carregamento quando a requisição for bem-sucedida
            $("#loadingDiv").hide();

            // Redirecionar para a página "pagina_inicial.php"
            window.location.href = "./pagina_inicial.php";
        },
        error: function (xhr, status, error) {
            // Esconder a div de carregamento em caso de erro
            $("#loadingDiv").hide();
            console.error("Erro na requisição AJAX: " + status + " - " + error);
        }
    });
});