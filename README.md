# Informe de Diseño: Sistema de Reservaciones "Sabor Casero"

## 1. Introducción
El presente proyecto consiste en el desarrollo de una plataforma web diseñada para optimizar la gestión de reservaciones del restaurante "Sabor Casero". El sistema permite la transición de un registro manual a una base de datos digital accesible desde dispositivos móviles.

## 2. Decisiones de Diseño de Datos

### Estructura de la Tabla: `reservaciones`
Se ha definido un esquema de base de datos orientado a la operatividad del negocio, utilizando los siguientes campos:

| Campo | Tipo de Dato | Justificación |
| :--- | :--- | :--- |
| **nombre_cliente** | String | Identificación del titular para la gestión del servicio. |
| **telefono** | String | Canal de contacto para confirmaciones y seguimiento. |
| **numero_personas**| Integer | Control de aforo para la asignación eficiente de mesas. |
| **fecha** | Date | Organización cronológica de la agenda del restaurante. |
| **hora** | Time | Gestión de turnos y tiempos de rotación de comensales. |
| **estado** | String | Seguimiento del ciclo de la reserva: confirmada, ya vinieron o cancelaron. |

### Política de Conservación de Registros
* **Persistencia de Datos:** El sistema no contempla la eliminación de registros por parte del usuario final.
* **Fundamento Administrativo:** Esta restricción garantiza la integridad del historial operativo, permitiendo a la administración realizar análisis de métricas sobre afluencia de clientes y reportes de cancelación sin pérdida de información histórica.

## 3. Especificaciones Técnicas
* **Arquitectura:** Implementación basada en el patrón Modelo-Vista-Controlador (MVC) de Laravel.
* **Persistencia:** Gestión de datos mediante PostgreSQL, asegurando la integridad referencial y escalabilidad.
* **Interfaz:** Desarrollo de vistas responsivas mediante Bootstrap 5 para garantizar la compatibilidad con terminales móviles en el área de cocina.