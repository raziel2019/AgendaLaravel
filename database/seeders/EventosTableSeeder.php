<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Evento;
class EventosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertEvento('Primer evento','#00ff11','#ff00d4',' #71754d');
        
    }
    private function insertEvento($descripcion,$backgroundColor,$textColor,$borderColor){
        $Evento = new Evento();
        $Evento->descripcion = $descripcion;
        $Evento->backgroundColor = $backgroundColor;
        $Evento->textColor = $textColor;
        $Evento->borderColor = $borderColor;
        $Evento->save();
    }
}
