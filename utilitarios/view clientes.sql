SELECT c.CODIGOCLI,
c.NOMECLI,
c.ENDERCLI,
c.BAIRROCLI,
c.CIDADECLI,
c.ESTADOCLI,
c.CEPCLI,
c.FONECLI,
c.CPFCGC,
c.IDENINSC,
con.EMAIL,
con.OBSERVACOES,
c.ID_VENDEDOR,
c.ID_VENDEDOR_EXTERNO,
c.ID_PERFIL,
pf.OBSERVACAO AS PRECO
FROM clientes c 
LEFT JOIN contatosemitente con 
ON c.CODIGOCLI = con.ID_EMITENTE
LEFT JOIN perfilclientes pf
ON c.ID_PERFIL = pf.ID_PERFIL 