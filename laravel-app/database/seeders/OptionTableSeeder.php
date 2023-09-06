<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poll;
use App\Models\Option;

class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assuming there's at least one poll in the database
        $poll = Poll::first();

        if ($poll) {
            Option::create([
                'poll_id' => $poll->id,
                'project_number' => '1',
                'theme' => 'Descentralizar a Cultura- De Cá para Lá',
                'owner' => 'Maria Manuela Ferreira Cardoso',
                'description' => 'O projeto que se apresenta “Descentralizar a Cultura- De Cá para Lá” é um projeto imaterial, cuja área de abrangência é suprafreguesia: União de Freguesias de Santa Eufémia ,Boa Vista e Caranguejeira( localidades de Boa Vista, Caranguejeira, Santa Eufémia).
                Na essência, constata-se que se desenvolvem inúmeras iniciativas e atividades sob o lema de “mais cultura para todos”, quando em regra as mesmas decorrem nos grandes centros e nas cidades, com custos( entradas, deslocações, etc.), sendo que grande parte da população das nossas freguesias não tem acesso.
                A presente ideia passa por trazer o melhor da música portuguesa a 3 localidades de duas freguesias do concelho( União de Freguesias de Santa Eufémia e Boa Vista e Freguesia de Caranguejeira) com repercussões ao nível do próprio concelho, aproximando as pessoas da cultura portuguesa.',
                'amount' => 93523.56,
            ]);

            Option::create([
                'poll_id' => $poll->id,
                'project_number' => '2',
                'theme' => 'Uma Biblioteca para a Comunidade',
                'owner' => 'Helena Felizardo',
                'description' => 'A Biblioteca Escolar do Agrupamento de Escolas Rainha Santa Isabel assume um papel relevante e interventivo na vida da Comunidade, não apenas pelos recursos e serviços que disponibiliza tais como fundos documentais, recursos tecnológicos e acesso à Internet, como também pelas iniciativas que promove e dinamiza ao longo do ano letivo.
                Com o intuito de melhorar a qualidade dos serviços prestados á comunidade educativa e local ,torna-se necessária a aquisição de recursos diversificados, tais como fundos documentais (livros e e-books diversificados, atuais e apelativos : literatura infantil, juvenil e adulto) e Recursos tecnológicos digitais (computadores, tablets, e-readers…).',
                'amount' => 93523.56,
            ]);

            Option::create([
                'poll_id' => $poll->id,
                'project_number' => '3',
                'theme' => 'Construção de Espaço Museológico em Boa Vista',
                'owner' => 'Ana Luísa Ferreira Azoia',
                'description' => 'Construção de Espaço Museológico em Boa Vista, mais propriamente no edifício da ex. EB Boa Vista.
                Com a suspensão da ex. EB Boa Vista, este edifício está cedido à União das Freguesias de Santa Eufémia e Boa Vista e agora acolhe o Rancho Típico da Boa Vista, que não tinha sede.
                De momento , tem um espólio considerável e afigura-se de primordial importância criar/adaptar um espaço para preservar o seu historial e mostrar os usos e costumes dos nossos antepassados, nomeadamente objetos e utensílios.
                Propõe-se assim que o espaço de 1 ou 2 salas seja requalificado/beneficiado ( incluindo estantes, expositores e/ou outros) criando condições para acolhimento deste espólio e para a disponibilização deste património ás crianças e demais população.
                ',
                'amount' => 46640,
            ]);
        }
    }
}
