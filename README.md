# Portafolio Personal - Eduard Guevara

<p align="center">
  <img src="public/assets/images/logo.png" alt="Logo" width="200">
</p>

<p align="center">
  <strong>Portafolio personal desarrollado con Laravel, Vue.js y Tailwind CSS</strong>
</p>

## 📋 Descripción

Este es mi portafolio personal donde muestro mis proyectos, habilidades y experiencia como desarrollador web. La aplicación está construida con tecnologías modernas y ofrece una interfaz elegante y responsiva para presentar mi trabajo profesional.

## ✨ Características

- **Diseño Responsivo**: Optimizado para dispositivos móviles, tablets y desktop
- **Interfaz Moderna**: Diseño limpio y profesional con animaciones suaves
- **Gestión de Proyectos**: Panel de administración para gestionar proyectos del portafolio
- **Sistema de Contacto**: Formulario de contacto funcional con notificaciones
- **Autenticación**: Sistema de login para administración
- **SEO Optimizado**: Meta tags y estructura semántica

## 🛠️ Tecnologías Utilizadas

### Backend
- **Laravel 12** - Framework PHP
- **PHP 8.2+** - Lenguaje de programación
- **MySQL** - Base de datos
- **Inertia.js** - Para SPA sin API

### Frontend
- **Vue.js 3** - Framework JavaScript
- **TypeScript** - Tipado estático
- **Tailwind CSS** - Framework CSS
- **Vite** - Build tool
- **Element Plus** - Componentes UI

### Herramientas de Desarrollo
- **Laravel Breeze** - Autenticación
- **Laravel Sanctum** - API Authentication
- **Ziggy** - Generación de rutas para JavaScript

## 🚀 Instalación

### Prerrequisitos
- PHP 8.2 o superior
- Composer
- Node.js 18+ y npm
- MySQL o MariaDB

### Pasos de Instalación

1. **Clonar el repositorio**
   ```bash
   git clone [URL_DEL_REPOSITORIO]
   cd portafolio
   ```

2. **Instalar dependencias de PHP**
   ```bash
   composer install
   ```

3. **Instalar dependencias de Node.js**
   ```bash
   npm install
   ```

4. **Configurar variables de entorno**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configurar la base de datos en `.env`**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=portafolio
   DB_USERNAME=tu_usuario
   DB_PASSWORD=tu_password
   ```

6. **Ejecutar migraciones y seeders**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

7. **Compilar assets**
   ```bash
   npm run build
   ```

8. **Iniciar el servidor**
   ```bash
   php artisan serve
   ```

## 📁 Estructura del Proyecto

```
portafolio/
├── app/
│   ├── Http/Controllers/     # Controladores
│   ├── Models/              # Modelos Eloquent
│   └── Providers/           # Proveedores de servicios
├── resources/
│   └── js/
│       ├── Components/      # Componentes Vue reutilizables
│       ├── Layouts/         # Layouts de la aplicación
│       ├── Pages/           # Páginas principales
│       └── types/           # Definiciones TypeScript
├── database/
│   ├── migrations/          # Migraciones de base de datos
│   └── seeders/            # Seeders para datos de prueba
└── public/
    └── assets/             # Assets estáticos (imágenes, CSS, JS)
```

## 🎯 Funcionalidades Principales

### Páginas Públicas
- **Inicio**: Presentación personal y estadísticas
- **Experiencias**: Historial laboral y proyectos destacados
- **Sobre Mí**: Información personal y profesional
- **Habilidades**: Tecnologías y competencias técnicas
- **Portafolio**: Galería de proyectos realizados
- **Contacto**: Formulario de contacto funcional

### Panel de Administración
- **Gestión de Proyectos**: CRUD completo para proyectos del portafolio
- **Gestión de Contactos**: Visualización y gestión de mensajes recibidos
- **Perfil de Usuario**: Configuración de cuenta de administrador

## 🔧 Comandos Útiles

```bash
# Desarrollo
npm run dev                    # Compilar assets en modo desarrollo
php artisan serve             # Iniciar servidor de desarrollo

# Producción
npm run build                 # Compilar assets para producción
php artisan config:cache      # Cachear configuración
php artisan route:cache       # Cachear rutas
php artisan view:cache        # Cachear vistas

# Base de datos
php artisan migrate           # Ejecutar migraciones
php artisan migrate:rollback  # Revertir migraciones
php artisan db:seed           # Ejecutar seeders

# Limpieza
php artisan cache:clear       # Limpiar cache
php artisan config:clear      # Limpiar configuración cacheada
```

## 📧 Contacto

- **Nombre**: Eduard Guevara
- **Profesión**: Desarrollador Web
- **Facebook**: [Eduard Guevara](https://www.facebook.com/eduard.guevara.cristovive/)
- **GitHub**: [guevaraeduard](https://github.com/guevaraeduard)
- **Instagram**: [guevaraeduard](https://www.instagram.com/guevaraeduard/)

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 🤝 Contribuciones

Las contribuciones son bienvenidas. Por favor, abre un issue primero para discutir los cambios que te gustaría hacer.

---

**Desarrollado con ❤️ por Eduard Guevara**
