$(document).ready(function () {
    // Inicialização da página
    $("#loadingDiv").show();
    var nome_perfil = $("#nome_perfil").val()
    // var userid = $("#userid").val()
    console.log(nome_perfil)
    $.ajax({
        url: '../../lib/dashboard/CarregaProdutos.php',
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
        url: '../../lib/dashboard/CarregaFamilia.php',
        method: 'GET',
        success: function (data) {
            // Atualize o conteúdo da página com os dados iniciais
            $('#opcoes').html(data);
            console.log(data)
        }
    });

    // Quando o usuário seleciona uma opção no select
    $('#opcoes').change(function () {
        var selecionado = $(this).val();
        console.log(selecionado);
        if (selecionado === '9999999999') {
            $.ajax({
                url: '../../lib/dashboard/CarregaProdutos.php',
                method: 'GET',
                data: { nome_perfil: nome_perfil },
                success: function (data) {
                    // Atualize o conteúdo da página com os dados iniciais
                    $('#conteudo').html(data);
                }
            });
        } else {
            $.ajax({
                url: '../../lib/dashboard/CarregaProdutosFamilia.php',
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
            url: '../../lib/dashboard/CarregaPesquisa.php',
            method: 'POST',
            data: { pesquisa: pesquisa },
            success: function (data) {
                // Exiba os resultados da pesquisa
                $('#conteudo').html(data);
            }
        });
    });
});



