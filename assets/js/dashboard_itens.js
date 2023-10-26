$(document).ready(function () {
    var id_produto = $("#id_produto").val()
    console.log(id_produto)
    $.ajax({
        url: '../../lib/dashboard_itens/Carrega_Produto.php',
        method: 'GET',
        data: { id_produto: id_produto },
        success: function (data) {
            $("#loadingDiv").hide();
            // Atualize o conteúdo da página com os dados iniciais
            $('#conteudo').html(data);

        }
    });
});



