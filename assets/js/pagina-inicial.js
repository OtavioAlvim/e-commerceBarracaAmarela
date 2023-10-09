$(document).ready(function() {
    // Inicialização da página
    $.ajax({
        url: 'carregar_dados_iniciais.php',
        method: 'GET',
        success: function(data) {
            // Atualize o conteúdo da página com os dados iniciais
            $('#conteudo').html(data);
        }
    });

    // Quando o usuário seleciona uma opção no select
    $('#seu_select').change(function() {
        var selecionado = $(this).val();
        $.ajax({
            url: 'carregar_dados_opcao.php',
            method: 'GET',
            data: { opcao: selecionado },
            success: function(data) {
                // Atualize o conteúdo da página com os dados da opção selecionada
                $('#conteudo').html(data);
            }
        });
    });

    // Quando o usuário clica para pesquisar
    $('#seu_formulario').submit(function(event) {
        event.preventDefault();
        var pesquisa = $('#campo_pesquisa').val();
        $.ajax({
            url: 'processar_pesquisa.php',
            method: 'POST',
            data: { pesquisa: pesquisa },
            success: function(data) {
                // Exiba os resultados da pesquisa
                $('#resultado_pesquisa').html(data);
            }
        });
    });
});
