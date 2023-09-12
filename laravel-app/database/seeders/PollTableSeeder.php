<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poll;

class PollTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Poll::create([
            'title' => 'Orçamento Participativo 2023',
            'description' => 'O Orçamento Participativo do Município de Nazaré (Orçamento Participativo) é um projeto da Câmara Municipal que tem como primordial objetivo a colheita de contributos de todos os cidadãos que pretendam ter papel ativo na implementação e execução de ações que vão encontro das mais basilares carências sociais. São premissas fundamentais desta medida solidificar o vínculo entre a autarquia e os seus munícipes e, consequentemente, aprofundar a qualidade do processo democrático local, pois os orçamentos participativos exprimem o enraizamento da participação democrática e da ligação dos cidadãos à causa pública, sem prejuízo dos contributos que sempre foram consagrados, nomeadamente, dos Partidos Políticos (no âmbito do respeito pelo Estatuto do Direito à Oposição), dos Órgãos das Freguesias e da recolha sistemática de sugestões dos Munícipes e outras entidades, materializada na audição contínua dos cidadãos, das coletividades, das entidades públicas e privadas e de outros canais de comunicação com o Executivo, colocados diretamente à disposição de toda e qualquer pessoa.',
            'status' => 'active',
        ]);
    }
}
