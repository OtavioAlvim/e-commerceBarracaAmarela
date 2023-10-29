$(document).ready(function () {
    // Inicialização da página
    $("#loadingDiv").show();
    var nome_perfil = $("#nome_perfil").val()
    var userid = $("#userid").val()
    // console.log(nome_perfil)
    $.ajax({
        url: '../lib/pagina_inicial/CarregaProdutos.php',
        method: 'GET',
        data: { nome_perfil: nome_perfil },
        success: function (data) {
            $("#loadingDiv").hide();
            // Atualize o conteúdo da página com os dados iniciais
            $('#conteudo').html(data);
        }
    });
    // Inicialização da página
    $.ajax({
        url: '../lib/pagina_inicial/CarregaFamilia.php',
        method: 'GET',
        success: function (data) {
            // Atualize o conteúdo da página com os dados iniciais
            $('#opcoes').html(data);
        }
    });

    // Quando o usuário seleciona uma opção no select
    $('#opcoes').change(function () {
        var selecionado = $(this).val();
        console.log(selecionado);
        if (selecionado === '9999999999') {
            $.ajax({
                url: '../lib/pagina_inicial/CarregaProdutos.php',
                method: 'GET',
                data: { nome_perfil: nome_perfil },
                success: function (data) {
                    // Atualize o conteúdo da página com os dados iniciais
                    $('#conteudo').html(data);
                }
            });
        } else {
            $.ajax({
                url: '../lib/pagina_inicial/CarregaProdutosFamilia.php',
                method: 'GET',
                data: { opcao: selecionado },
                success: function (data) {
                    // Atualize o conteúdo da página com os  dados da opção selecionada
                    $('#conteudo').html(data);
                }
            });
        }

    });

    // Quando o usuário digitar algo no campo de pesquisa
    $('#descricao_prod').on('input', function () {
        var pesquisa = $(this).val();
        console.log(pesquisa);
        $.ajax({
            url: '../lib/pagina_inicial/CarregaPesquisa.php',
            method: 'POST',
            data: { pesquisa: pesquisa },
            success: function (data) {
                // Exiba os resultados da pesquisa
                $('#conteudo').html(data);
            }
        });
    });

    // verifica se tem itens no carrinho, se sim, exibe eles
    $.ajax({
        url: '../lib/pagina_inicial/VerificaCarrinho.php',
        method: 'GET',
        data: {
            userid: userid // Inclua o valor oculto nos dados da requisição
        },
        success: function (data) {
            // Atualize o conteúdo da página com os dados iniciais
            var resultado_carrinho = JSON.parse(data)

            if (resultado_carrinho.status === 'tem_itens') {
                // <!-- pedido ja contem itens -->
                // carrega os item do carrinho
                $.ajax({
                    url: '../lib/pagina_inicial/CarregaCarrinhoItens.php',
                    method: 'GET',
                    data: {
                        userid: userid // Inclua o valor oculto nos dados da requisição
                    },
                    success: function (data) {
                        // Atualize o conteúdo da página com os dados iniciais
                        $('#itens').html(data);

                    }
                });
                // carrega o total do carrinho
                $.ajax({
                    url: '../lib/pagina_inicial/CarregaCarrinhoTotal.php',
                    method: 'GET',
                    data: {
                        userid: userid // Inclua o valor oculto nos dados da requisição
                    },
                    success: function (data) {
                        // Atualize o conteúdo da página com os dados iniciais
                        $('#total_carrinho').html(data);

                    }
                });
                // carrega quantia de itens carrinho
                $.ajax({
                    url: '../lib/pagina_inicial/CarregaCarrinhoQuantidade.php',
                    method: 'GET',
                    data: {
                        userid: userid // Inclua o valor oculto nos dados da requisição
                    },
                    success: function (data) {
                        // Atualize o conteúdo da página com os dados iniciais
                        $('#qtdItensCarrinho').html(data);

                    }
                });
            } else {
                // <!-- pedido não contem itens -->
                $.ajax({
                    url: '../lib/pagina_inicial/CarregaCarrinhoVazio.php',
                    method: 'GET',
                    data: {
                        userid: userid // Inclua o valor oculto nos dados da requisição
                    },
                    success: function (data) {
                        // Atualize o conteúdo da página com os dados iniciais
                        $('#itens').html(data);

                        $('#botao_finalizar').html('');

                    }
                });
            }
        }
    });


});



