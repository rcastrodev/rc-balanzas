<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        for ($i=0; $i < 3; $i++) { 
            Content::create([
                'section_id'=> 1,
                'order'     => 'AA',
                'image'     => 'images/home/Maskgroup-2.png',
                'content_1' => 'Calibraciones y Reparaciones de balanzas de toda escala',
                'content_2' => 'Ofrecemos calibraciones con certificado, reparaciones y ventas de balanzas.'
            ]);
        }

        Content::create([
            'section_id'=> 2,
            'image'     => 'images/home/image92.png',
            'content_1' => 'Auditados por el INTI',
            'content_2' => '<p>RC Balanzas SRL es una empresa auditada por el INTI, habilitada para realizar Verificaciones Periodicas de balanzas y basculas de camiones.</p>',
        ]);
        
        /** Empresa */
        Content::create([
            'section_id'=> 3,
            'content_1' => 'Quienes somos',
            'content_2' => '<p>Somos una empresa con 20 años de antigüedad en el mercado, rubro Balanzas Electrónicas, y con la firme experiencia que otorga la constancia y perseverancia en la atención personalizada de nuestros clientes.</p>
            <p>En estos años de intensa actividad, varias son las em 
            Nuestro principal objetivo es brindar al cliente la seguridad de un Servicio Técnico eficiente, rápido y confiable, a la vez que un costo real, reduciendo así, en la facturación, los gastos de movilidad y viáticos que, la mayoria de las veces suelen abultar considerablemente las cifras a abonar.</p>',
        ]);
        
        for ($i= 0; $i < 10; $i++) { 
            Content::create([
                'section_id'=> 4,
                'order'     => 'AA',
                'image'     => 'images/company/image51.png'
            ]);
        }
        
        Content::create([
            'section_id'=> 5,
            'order'     => 'AA',
            'content_1' => 'Misión',
            'content_2' => '<p>Brindar soluciones tecnológicas de desarrollo y asistencia técnica.</p>
            <p>Asimilar a nuestros procesos herramientas tecnológicas que nos permitan ser más eficientes y eficaces en nuestro trabajo.</p>'
        ]);  

        Content::create([
            'section_id'=> 5,
            'order'     => 'BB',
            'content_1' => 'Visión',
            'content_2' => '<p>Difundir la cultura de la capacitación permanente como vía de incorporación de conocimientos y progreso.</p>
            <p>Integrarnos con flexibilidad y dinamismo a la cadena de valores tecnológica de nuestros clientes.</p>'
        ]); 

        Content::create([
            'section_id'=> 5,
            'order'     => 'CC',
            'content_1' => 'Valores',
            'content_2' => '<p>Propiciar el compromiso, el respeto y la honestidad entre nuestros colaboradores en el actuar cotidiano.</p>
            <p>Canalizar esfuerzos para que nuestros productos y servicios sean un referente de calidad y confiabilidad en el mercado.</p>'
        ]); 

        Content::create([
            'section_id'=> 6,
            'order'     => 'AA',
            'image'     => 'images/media-and-equipment/image 93.png',
            'content_1' => 'Pesas Patrón',
            'content_2' => '<p>Contamos con pesas patrones de distintas capacidades, para controlar y calibrar apropiadamente desde las balanzas más precisas de laboratorio hasta las básculas para camiones.</p>'
        ]); 

        Content::create([
            'section_id'=> 7,
            'order'     => 'AA',
            'image'     => 'images/clients/image53.png',
            'content_1' => 'HutchinsonPorts Bactssa'
        ]); 

        Content::create([
            'section_id'=> 8,
            'order'     => 'AA',
            'image'     => 'images/news/image76.png',
            'content_1' => 'Inversión en nuevos equipos de calibración',
            'content_2' => 'Conocé sobre el nuevo equipamiento.',
            'content_3' => '<h3>¿Que son las pesas patrón?</h3>
            <p>Una pesa patrón consiste en un patrón de medición que se encarga de materializar la masa, regulada en función de sus propiedades tanto físicas como metrológicas. Entre dichas propiedades, destacan las dimensiones materiales, la forma, el valor nominal, la calidad superficial, y el máximo error permitido</p>
            <h3>¿Como se eligen?</h3>
            <p>Las masas patrón  para la verificación de sus equipos de balanzas o básculas, las industrias alimentarias. A la vez que se debe evaluar la idoneidad de los certificados de calibración que se reciben de las correspondientes calibraciones de sus equipos.</p>
            <p>En las auditorias que desarrollo encuentro que en ocasiones surgen dudas sobre los tipos de masas patrón. Así que espero que en este artículo quede resuelto.</p>
            <p>En los servicios de calibración de pesas surgen diferentes preguntas acerca de las especificaciones de las pesas. Errores máximos permisibles, construcción, forma, diseño, características de materiales, marcado, presentación, densidad de los materiales, etc.</p>',
            'content_4' => 'Equipos'
        ]); 

        Content::create([
            'section_id'=> 9,
            'order'     => 'AA',
            'image'     => 'images/download/image82.png',
            'content_1' => 'Manual pesas patrón 2022'
        ]); 

        Content::create([
            'section_id'=> 10,
            'order'     => 'AA',
            'image'     => 'images/certificates/image85.png',
            'content_1' => 'Certificado Marzo 2022'
        ]); 
    }
}






