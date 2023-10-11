$(document).ready(function () {
    // Inicialização da página
    $.ajax({
        url: '../lib/CarregaProdutos.php',
        method: 'GET',
        success: function (data) {
            // Atualize o conteúdo da página com os dados iniciais
            $('#conteudo').html(data);
        }
    });
        // Inicialização da página
        $.ajax({
            url: '../lib/CarregaFamilia.php',
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
        $.ajax({
            url: '../lib/CarregaProdutosFamilia.php',
            method: 'GET',
            data: { opcao: selecionado },
            success: function (data) {
                // Atualize o conteúdo da página com os dados da opção selecionada
                $('#conteudo').html(data);
            }
        });
    });

    // Quando o usuário digitar algo no campo de pesquisa
    $('#descricao_prod').on('input', function () {
        var pesquisa = $(this).val();
        console.log(pesquisa);
        $.ajax({
            url: '../lib/CarregaPesquisa.php',
            method: 'POST',
            data: { pesquisa: pesquisa },
            success: function (data) {
                // Exiba os resultados da pesquisa
                $('#conteudo').html(data);
            }
        });
    });



});

setInterval(function () {
    // Código da solicitação AJAX aqui
    $.ajax({
        url: '../lib/CarregaCarrinhoCompra.php',
        method: 'GET',
        success: function (data) {
            // Atualize o conteúdo da página com os dados iniciais
            $('#testado').html(data);
            console.log(data)
        }
    });

}, 500);



