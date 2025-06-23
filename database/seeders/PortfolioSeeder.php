<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Portfolio;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = [
            [
                'title' => 'Sistema de Gestión de Inventarios',
                'description' => 'Desarrollo de una aplicación web completa para la gestión de inventarios de una empresa. Incluye módulos de productos, proveedores, ventas y reportes. Tecnologías utilizadas: Laravel, Vue.js, MySQL.',
                'type' => 'desarrollo_web',
                'link' => 'https://github.com/ejemplo/inventario-app',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Aplicación Móvil de Delivery',
                'description' => 'Aplicación móvil desarrollada en Flutter para servicio de delivery de comida. Incluye geolocalización, pagos en línea, chat en tiempo real y sistema de calificaciones.',
                'type' => 'aplicacion',
                'link' => 'https://play.google.com/store/apps/details?id=com.ejemplo.delivery',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Dashboard de Analytics',
                'description' => 'Dashboard interactivo para visualización de datos empresariales. Integración con múltiples fuentes de datos, gráficos dinámicos y reportes personalizables. Desarrollado con React y D3.js.',
                'type' => 'desarrollo_web',
                'link' => 'https://analytics.ejemplo.com',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'API REST para E-commerce',
                'description' => 'API RESTful completa para plataforma de comercio electrónico. Incluye autenticación JWT, gestión de productos, carrito de compras, pagos y notificaciones. Documentada con Swagger.',
                'type' => 'desarrollo_web',
                'link' => 'https://api.ejemplo.com/docs',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'title' => 'Sistema de Reservas Hoteleras',
                'description' => 'Plataforma web para gestión de reservas hoteleras. Sistema de calendario dinámico, gestión de habitaciones, confirmaciones automáticas y integración con sistemas de pago.',
                'type' => 'desarrollo_web',
                'link' => 'https://hotel.ejemplo.com',
                'is_active' => false,
                'order' => 5,
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }
    }
} 