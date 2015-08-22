BEGIN TRANSACTION;

CREATE TABLE deputado (id INTEGER PRIMARY KEY, nome varchar(50), partido varchar(10));

CREATE TABLE tipo_despesa (codTipoDespesa INTEGER PRIMARY KEY, descTipoDespesa VARCHAR(100));

CREATE TABLE verba_indenizatoria (
	idVerba INTEGER PRIMARY KEY,
	idDeputado INTEGER,
	dataReferencia TEXT,
	codTipoDespesa INTEGER,
	valor NUMERIC,
	FOREIGN KEY(idDeputado) REFERENCES deputado(id),
	FOREIGN KEY(codTipoDespesa) REFERENCES tipo_despesa(codTipoDespesa)
);

COMMIT;
