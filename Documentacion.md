# 💻 Laboratorio PHP: Solucionador Multiproblemas

**Universidad Tecnológica de Panamá (UTP)** | **Facultad de Ingeniería de Sistemas Computacionales** | **Proyecto de Ingeniería de Software**

Este repositorio contiene la resolución de 9 problemas lógicos y matemáticos desarrollados en PHP estricto (`declare(strict_types=1)`). El proyecto demuestra la aplicación de buenas prácticas de programación, incluyendo la separación de responsabilidades (Lógica vs. Presentación), el uso del estándar PSR-4 con Composer para la autocarga de clases (Autoload), y la sanitización de datos de entrada/salida.

---

## 🏗️ Arquitectura del Proyecto

El sistema está diseñado utilizando un enfoque orientado a objetos:
* **Vistas (`.php`):** Archivos en la raíz que manejan la interfaz de usuario (HTML/CSS) y la recolección de datos mediante peticiones `POST`.
* **Clase Delegadora (`SolucionadorProblemas.php`):** Actúa como un patrón estructural centralizado, recibiendo las peticiones de las vistas y canalizándolas a la clase específica de cada problema.
* **Clases de Lógica (`ProblemaX.php`):** Contienen exclusivamente la lógica de negocio y los cálculos correspondientes.
* **Seguridad (`SeguridadWeb.php`):** Utilidad encargada de sanitizar las salidas para prevenir vulnerabilidades.

---

## 📝 Descripción de los Problemas

A continuación, se detalla la funcionalidad de cada uno de los ejercicios resueltos en este laboratorio:

### 📊 Problema 1: Estadística Básica
Calcula medidas de dispersión y tendencia central. A partir de 5 números ingresados por el usuario, el sistema determina la **media poblacional ($\mu$)**, la **desviación estándar poblacional ($\sigma$)**, y los valores mínimo y máximo de la serie.

### 🔢 Problema 2: [Nombre de tu problema 2]
Procesa una iteración o cálculo basado en un límite. Recibe una cantidad límite (`$cantidadLimite`) y devuelve un arreglo con [describe aquí qué hace o qué genera].

### 🧮 Problema 3: [Nombre de tu problema 3]
[Describe brevemente la función del problema]. Este módulo ejecuta un proceso interno y retorna un valor numérico entero como resultado.

### 📋 Problema 4: [Nombre de tu problema 4]
[Describe brevemente la función del problema]. El sistema genera y retorna un arreglo con [describe qué contiene el arreglo].

### 🎂 Problema 5: [Nombre de tu problema 5]
Análisis demográfico o de categorías. El sistema recibe un arreglo con un conjunto de edades (`$edades`) y calcula [describe si calcula promedios, filtra por mayoría de edad, agrupa, etc.].

### 💰 Problema 6: [Nombre de tu problema 6]
Cálculo financiero o de distribución. A partir de un monto inicial proporcionado (`$presupuestoTotal`), el sistema [describe cómo se distribuye o qué se calcula con ese presupuesto].

### 🎓 Problema 7: [Nombre de tu problema 7]
Evaluación académica. A partir de un conjunto de calificaciones ingresadas (`$notasUsuario`), el módulo determina [describe si calcula el promedio, estado de aprobación, etc.].

### 🌍 Problema 8: Estación del Año
Determinación de fechas. Basado en una fecha del calendario ingresada por el usuario, el sistema calcula y determina qué estación del año (Primavera, Verano, Otoño o Invierno) corresponde en el hemisferio norte, devolviendo además la fecha formateada en español.

### 📐 Problema 9: [Nombre de tu problema 9]
Cálculos basados en una base numérica. El sistema recibe un valor base (`$base`) y retorna un arreglo con [describe qué genera, por ejemplo: una tabla de multiplicar, potencias, etc.].

---

## ⚙️ Requisitos Previos e Instalación

Para ejecutar este proyecto en un entorno local, asegúrate de contar con:
* **PHP 8.0** o superior.
* **Composer** instalado en tu sistema.
* Un servidor web local (como XAMPP, Laragon, o el servidor integrado de PHP).

**Pasos para ejecutar:**

1. Clona este repositorio en tu máquina local.
2. Abre una terminal en la raíz del proyecto y ejecuta el siguiente comando para generar el *autoload* de las clases:
   ```bash
   composer dump-autoload -o
   https://github.com/Luis682669/MiniproyectoCharla.git 
