<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        $this->call([
         
            PermissionSeeder::class,
            RoleSeeder::class,
            RoleHasPermissionSeeder::class,
            UserSeeder::class,
        ]);

        # DATOS NO OFICIALES ELIMINAR EN PRODUCCION
        \App\Models\AdultoMayor::create(['nombres' => 'Lola', 'apellido_paterno' => 'Mento', 'apellido_materno' => 'Masiri', 'genero' => 'Masculino', 'ci' => '11111', 'extension' => 'LP', 'fecha_nacimiento' => '1960-02-02', 'nro_referencia' => '2023424', 'estado_civil' => 'Soltero', 'grado_instruccion' => 'Primaria Completa', 'ocupacion' => 'nada', 'situacion' => 'Jubilado', 'area' => 'Rural']);
        \App\Models\AdultoMayor::create(['nombres' => 'Armando', 'apellido_paterno' => 'Paredes',  'apellido_materno' => 'Rivero', 'genero' => 'Masculino', 'ci' =>'22222', 'extension' => 'LP', 'fecha_nacimiento' => '1964-02-02', 'nro_referencia' => '2023424', 'estado_civil' => 'Soltero', 'grado_instruccion' => 'Primaria Completa', 'ocupacion' => 'nada', 'situacion' => 'Jubilado', 'area' => 'Rural']);
        \App\Models\AdultoMayor::create(['nombres' => 'Luis', 'apellido_paterno' => 'Huampo', 'apellido_materno' => 'Pajai', 'genero' => 'Masculino', 'ci' => '3333', 'extension' => 'LP', 'fecha_nacimiento' => '1968-02-02', 'nro_referencia' => '2023424', 'estado_civil' => 'Soltero', 'grado_instruccion' => 'Primaria Completa', 'ocupacion' => 'nada', 'situacion' => 'Jubilado', 'area' => 'Rural']);
        \App\Models\AdultoMayor::create(['nombres' => 'Alberto', 'apellido_paterno' => 'Huanca', 'apellido_materno' => 'Sanca', 'genero' => 'Masculino', 'ci' => '44444', 'extension' => 'LP', 'fecha_nacimiento' => '1961-02-02', 'nro_referencia' => '2023424', 'estado_civil' => 'Soltero', 'grado_instruccion' => 'Primaria Completa', 'ocupacion' => 'nada', 'situacion' => 'Jubilado', 'area' => 'Rural']);
        \App\Models\AdultoMayor::create(['nombres' => 'Juan', 'apellido_paterno' => 'Perez', 'apellido_materno' => 'Davalos', 'genero' => 'Masculino', 'ci' => '5555', 'extension' => 'LP', 'fecha_nacimiento' => '1964-02-02', 'nro_referencia' => '2023424', 'estado_civil' => 'Soltero', 'grado_instruccion' => 'Primaria Completa', 'ocupacion' => 'nada', 'situacion' => 'Jubilado', 'area' => 'Rural']);
        \App\Models\AdultoMayor::create(['nombres' => 'Lucas', 'apellido_paterno' => 'Gonzales', 'apellido_materno' => 'Serrudo', 'genero' => 'Masculino', 'ci' => '66666', 'extension' => 'LP', 'fecha_nacimiento' => '1962-02-02', 'nro_referencia' => '2023424', 'estado_civil' => 'Soltero', 'grado_instruccion' => 'Primaria Completa', 'ocupacion' => 'nada', 'situacion' => 'Jubilado', 'area' => 'Rural']);
        \App\Models\AdultoMayor::create(['nombres' => 'Marisol', 'apellido_paterno' => 'Gutieerez', 'apellido_materno' => 'Medina', 'genero' => 'Masculino', 'ci' => '77777', 'extension' => 'LP', 'fecha_nacimiento' => '1950-02-02', 'nro_referencia' => '2023424', 'estado_civil' => 'Soltero', 'grado_instruccion' => 'Primaria Completa', 'ocupacion' => 'nada', 'situacion' => 'Jubilado', 'area' => 'Rural']);
        \App\Models\AdultoMayor::create(['nombres' => 'Luisa', 'apellido_paterno' => 'Conde', 'apellido_materno' => 'Mamani', 'genero' => 'Masculino', 'ci' => '88888', 'extension' => 'LP', 'fecha_nacimiento' => '1958-02-02', 'nro_referencia' => '2023424', 'estado_civil' => 'Soltero', 'grado_instruccion' => 'Primaria Completa', 'ocupacion' => 'nada', 'situacion' => 'Jubilado', 'area' => 'Rural']);

        \App\Models\RegistroAtencion::create(['fecha' => '2024-06-08', 'tipologia' => 'AA', 'adultomayor_id' => 1, 'descripcion' => 'Asuntos varios', 'peticion' => 'AAAAA', 'nombres_denunciado' => 'Juan Mollinedo', 'acciones' => 'APERTURA CASO']);
        \App\Models\RegistroAtencion::create(['fecha' => '2024-06-08', 'tipologia' => 'BB', 'adultomayor_id' => 3, 'descripcion' => 'Asuntos varios', 'peticion' => 'BBBC', 'nombres_denunciado' => 'Juan Limachiu', 'acciones' => 'APERTURA CASO']);
        \App\Models\RegistroAtencion::create(['fecha' => '2024-06-08', 'tipologia' => 'CC', 'adultomayor_id' => 4, 'descripcion' => 'Asuntos varios', 'peticion' => 'BCCCC', 'nombres_denunciado' => 'Juan ROdriguez', 'acciones' => 'APERTURA CASO']);
        
    }
}
