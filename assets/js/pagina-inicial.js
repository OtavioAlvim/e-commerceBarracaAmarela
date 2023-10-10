$(document).ready(function() {
    // Inicialização da página
    $.ajax({
        url: '../lib/CarregaProdutos.php',
        method: 'GET',
        success: function(data) {
            // Atualize o conteúdo da página com os dados iniciais
            $('#conteudo').html(data);
        }
    });

    // Quando o usuário seleciona uma opção no select
    $('#seu_select').change(function() {
        var selecionado = $(this).val();
        console.log(selecionado);
        $.ajax({
            url: '../lib/CarregaProdutos2.php',
            method: 'GET',
            data: { opcao: selecionado },
            success: function(data) {
                // Atualize o conteúdo da página com os dados da opção selecionada
                $('#conteudo').html(data);
            }
        });
    });

    // Quando o usuário clica para pesquisar
    $('#consulta_produto').submit(function(event) {
        event.preventDefault();
        var pesquisa = $('#descricao_prod').val();
        console.log(pesquisa);
        $.ajax({
            url: '../lib/CarregaProdutos1.php',
            method: 'POST',
            data: { pesquisa: pesquisa },
            success: function(data) {
                // Exiba os resultados da pesquisa
                $('#conteudo').html(data);
                // limpa a barra de pesquisa
                $('#descricao_prod').val('');
            }
        });
    });
});
