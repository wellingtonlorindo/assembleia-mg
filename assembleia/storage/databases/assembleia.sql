BEGIN TRANSACTION;

CREATE TABLE deputados (id INTEGER PRIMARY KEY, nome varchar(50), partido varchar(10));

CREATE TABLE tipos_despesas (codTipoDespesa INTEGER PRIMARY KEY, descTipoDespesa VARCHAR(100));

CREATE TABLE verbas_indenizatorias (
	idVerba INTEGER PRIMARY KEY,
	idDeputado INTEGER,
	dataReferencia TEXT,
	codTipoDespesa INTEGER,
	valor NUMERIC,
	FOREIGN KEY(idDeputado) REFERENCES deputados(id),
	FOREIGN KEY(codTipoDespesa) REFERENCES tipos_despesas(codTipoDespesa)
);

COMMIT;
