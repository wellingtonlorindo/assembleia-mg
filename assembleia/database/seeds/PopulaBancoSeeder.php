<?php
 
use Illuminate\Database\Seeder;
use App\Services\AssembleiaWs;
use App\Library\Utils;
use App\Deputado;
use App\VerbasIndenizatoria;
use App\TiposDespesa;
 
class PopulaBancoSeeder extends Seeder {
 
    public function run()
    {
        // Limpa o banco antes de popular
        DB::table('deputados')->delete();
        DB::table('tipos_despesas')->delete();
        DB::table('verbas_indenizatorias')->delete();

        // inicia a transação
        DB::beginTransaction();

        try {

            $deputados = $this->buscarDeputadosPorLegislatura();
            // salva os dados dos deputados
            $this->salvarDadosDeputados($deputados);
            DB::commit();
            Log::info('O banco foi populado com sucesso!');

        } catch (\Exception $e) {
            DB::rollback();
            Log::info('-- Ocorreu um erro. Desfazendo alterações... - '.$e->getMessage());
            throw new \Exception('Ocorreu um erro - '.$e->getMessage());            
        } 
    }

    /**
     * Remove os dados que não serão inseridos no banco
     * @param  string $tabela nome da tabela
     * @param  array  $dados  lista de dados a serem inseridos
     * @return array $dados dados limpos
     */
    public function removerColunasDesnecessarias($tabela, Array $dados)
    {
        $colunasTabela = Schema::getColumnListing($tabela);

        foreach ($dados as $coluna => $valor) {
            if (in_array($coluna, $colunasTabela)) {
                continue;
            }

            unset($dados[$coluna]);
        }

        return $dados;
    }

    /**
     * Busca os deputados em exercício na legislatura informada
     * @param  number id da legislatura - a legislatura de 2014 é o valor padrão
     * @return array dados dos deputados
     */
    public function buscarDeputadosPorLegislatura($idLegislatura = AssembleiaWs::LEGISLATURA_2014)
    {
        $idLegislatura = empty($idLegislatura) ? AssembleiaWs::LEGISLATURA_2014 : $idLegislatura;
        $dados = AssembleiaWs::buscarDeputadosPorLegislatura($idLegislatura);
        $deputados =  json_decode($dados);
        $deputados =  Utils::objectToArray($deputados->list);
        return $deputados;
    }

    /**
     * Salva a lista de deputados no banco com suas respectivas listas
     * de verbas indenizatórias
     * @param  Array  $deputados lista de deputados
     * @return void
     */
    public function salvarDadosDeputados(Array $deputados)
    {
        foreach ($deputados as $deputado) {
           
            $deputado = $this->removerColunasDesnecessarias('deputados', $deputado);

            $objDeputado = Deputado::getModel('');

            // salva o deputado
            Log::info('-- Salvando deputado  '.$deputado['nome']);
            $objDeputado->create($deputado);


            // busca as verbas do deputado
            $verbasDeputado = $this->buscarVerbaDeputado($deputado['id']);

            if (empty($verbasDeputado)) {
                Log::info('---- Nenhuma despesa para o deputado '.$deputado['id']);
                continue;
            }

            // Salva as despesas do deputado
            $this->salvarVerbaDeputado($verbasDeputado);                       
        }

    }


    /**
     * Busca as verbas indenizatórias do deputado no ano informado
     * @param  number $idDeputado código do deputado
     * @param  number $ano - o ano de 2014 é o padrão
     * @return array lista de verbas gastas pelo deputado
     */
    public function buscarVerbaDeputado($idDeputado, $ano = AssembleiaWs::ANO_PADRAO)
    {
        $dados = AssembleiaWs::buscarVerbasIndenizatoriasDeputado($idDeputado, $ano);
        $verbas =  json_decode($dados);
        $verbas =  Utils::objectToArray($verbas->list);
        return $verbas;
    }

    /**
     * Salva as verbas indenizatórias do deputado
     * @param  array $verbasDeputado - lista de verbas indenizatórias do deputado
     * @return void          
     */
    public function salvarVerbaDeputado(Array $verbasDeputado)
    {
        foreach ($verbasDeputado as $verba) {

            $verba['dataReferencia'] = $verba['dataReferencia']['$'];

            // Salva o tipo de despesa
            $tipoDespesa = array(
                'codTipoDespesa' => $verba['codTipoDespesa'],
                'descTipoDespesa' => $verba['descTipoDespesa']
            );

            $this->salvarTipoDespesa($tipoDespesa);
            
            // salva a Verba
            Log::info('---- Salvando despesa '.$verba['descTipoDespesa']);
            $verba = $this->removerColunasDesnecessarias('verbas_indenizatorias', $verba);
            
            $objVerba = VerbasIndenizatoria::getModel();
            $objVerba->create($verba);
        }

    }

    /**
     * Salva o tipo de despesa no banco
     * @param  Array  $tipoDespesa
     * @return void
     */
    public function salvarTipoDespesa(Array $tipoDespesa)
    {
        $tableTipoDespesa = DB::table('tipos_despesas');
        $despesaJaExiste = $tableTipoDespesa->where('codTipoDespesa', $tipoDespesa['codTipoDespesa'])
            ->first();

        if (!empty($despesaJaExiste)) {
            Log::info('---- A despesa já existe. '.$tipoDespesa['descTipoDespesa']);
            return;
        }

        $tableTipoDespesa->insert([$tipoDespesa]);
    }
 
}