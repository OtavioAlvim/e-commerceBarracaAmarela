SELECT i.TIPOPEDIDODEFAULT,i.TIPOPLANOPGDEFAULT,i.ID_PLANOCONTAPEDIDO,i.ID_BANCOPEDIDO,i.DEFAULTRETIRADOPOR FROM indices i;

SELECT                             
NULL AS useradm,                   
NULL AS vendedor_padrao,           
NULL AS razao,                     
NULL AS cor_padrao,                
i.TIPOPEDIDODEFAULT,               
i.TIPOPLANOPGDEFAULT,              
i.ID_PLANOCONTAPEDIDO,             
i.ID_BANCOPEDIDO,                  
i.DEFAULTRETIRADOPOR FROM indices i