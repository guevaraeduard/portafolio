<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts = [
            [
                'nombre' => 'Juan Pérez',
                'email' => 'juan.perez@email.com',
                'telefono' => '+57 300 123 4567',
                'servicio_interes' => 'Diseño Web',
                'detalles_proyecto' => 'Necesito una página web para mi empresa de consultoría. Quiero que sea moderna y profesional, con secciones para servicios, equipo y contacto. También necesito un blog integrado.',
                'leido' => false,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'nombre' => 'María González',
                'email' => 'maria.gonzalez@empresa.com',
                'telefono' => '+57 310 987 6543',
                'servicio_interes' => 'Diseño de Aplicaciones',
                'detalles_proyecto' => 'Estoy buscando desarrollar una aplicación móvil para gestionar inventarios. Necesito que sea intuitiva y que funcione tanto en iOS como en Android. También necesito un panel de administración web.',
                'leido' => true,
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(3),
            ],
            [
                'nombre' => 'Carlos Rodríguez',
                'email' => 'carlos.rodriguez@startup.com',
                'telefono' => '+57 315 456 7890',
                'servicio_interes' => 'Branding',
                'detalles_proyecto' => 'Somos una startup de tecnología y necesitamos crear nuestra identidad de marca desde cero. Esto incluye logo, colores corporativos, tipografías y guías de estilo. También necesitamos material para redes sociales.',
                'leido' => false,
                'created_at' => now()->subHours(6),
                'updated_at' => now()->subHours(6),
            ],
            [
                'nombre' => 'Ana Martínez',
                'email' => 'ana.martinez@restaurante.com',
                'telefono' => '+57 320 111 2222',
                'servicio_interes' => 'Diseño Web',
                'detalles_proyecto' => 'Tengo un restaurante y quiero una página web atractiva que muestre nuestro menú, horarios y ubicación. También necesito que los clientes puedan hacer reservas online. El diseño debe reflejar la elegancia de nuestro establecimiento.',
                'leido' => true,
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subHours(12),
            ],
            [
                'nombre' => 'Luis Fernández',
                'email' => 'luis.fernandez@consultoria.com',
                'telefono' => '+57 318 333 4444',
                'servicio_interes' => 'Diseño de Aplicaciones',
                'detalles_proyecto' => 'Necesito una aplicación web para gestionar citas y clientes de mi consultorio médico. Debe incluir calendario, historial de pacientes, y sistema de recordatorios por email y SMS.',
                'leido' => false,
                'created_at' => now()->subHours(2),
                'updated_at' => now()->subHours(2),
            ],
        ];

        foreach ($contacts as $contact) {
            Contact::create($contact);
        }
    }
} 