# 💻 Laboratorio PHP: Miniproyecto

**Universidad Tecnológica de Panamá (UTP)** | **Facultad de Ingeniería de Sistemas Computacionales** | **Proyecto de Ingeniería de Software**

Luis De Los Rios 8-1011-1708
Jeremias Donoso 9-766-2142
Juan Segundo 8-1039-1079

Este repositorio contiene la resolución de 9 problemas lógicos y matemáticos desarrollados en PHP estricto (`declare(strict_types=1)`). El proyecto demuestra la aplicación de buenas prácticas de programación, incluyendo la separación de responsabilidades (Lógica vs. Presentación), el uso del estándar PSR-4 con Composer para la autocarga de clases (Autoload), y la sanitización de datos de entrada/salida.


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

### 🔢 Problema 2: 
Procesa una iteración o cálculo basado en un límite. Recibe una cantidad límite (`$cantidadLimite`) y devuelve un arreglo con [describe aquí qué hace o qué genera].

### 🧮 Problema 3:
[Describe brevemente la función del problema]. Este módulo ejecuta un proceso interno y retorna un valor numérico entero como resultado.

### 📋 Problema 4:
[Describe brevemente la función del problema]. El sistema genera y retorna un arreglo con [describe qué contiene el arreglo].

### 🎂 Problema 5:
Análisis demográfico o de categorías. El sistema recibe un arreglo con un conjunto de edades (`$edades`) y calcula [describe si calcula promedios, filtra por mayoría de edad, agrupa, etc.].

### 💰 Problema 6:
Cálculo financiero o de distribución. A partir de un monto inicial proporcionado (`$presupuestoTotal`), el sistema [describe cómo se distribuye o qué se calcula con ese presupuesto].

### 🎓 Problema 7: 
Evaluación académica. A partir de un conjunto de calificaciones ingresadas (`$notasUsuario`), el módulo determina [describe si calcula el promedio, estado de aprobación, etc.].

### 🌍 Problema 8: Estación del Año
Determinación de fechas. Basado en una fecha del calendario ingresada por el usuario, el sistema calcula y determina qué estación del año (Primavera, Verano, Otoño o Invierno) corresponde en el hemisferio norte, devolviendo además la fecha formateada en español.

### 📐 Problema 9:
Cálculos basados en una base numérica. El sistema recibe un valor base (`$base`) y retorna un arreglo con [describe qué genera, por ejemplo: una tabla de multiplicar, potencias, etc.].

---

## ⚙️ Requisitos Previos e Instalación

Para ejecutar este proyecto en un entorno local, asegúrate de contar con:
* **PHP 8.0** o superior.
* **Composer** instalado en tu sistema.
* Un servidor web local (como XAMPP, Laragon, o el servidor integrado de PHP).

**Capturas:**
Problema #1
<img width="1188" height="907" alt="Captura de pantalla 2026-06-08 083522" src="https://github.com/user-attachments/assets/4346e7ba-030a-4d49-afb5-e49388eccaa2" />

Problema #2
<img width="1223" height="831" alt="Captura de pantalla 2026-06-08 083615" src="https://github.com/user-attachments/assets/4a3d5e91-4b59-4493-b2a7-33459af354da" />

Problema #3
<img width="1185" height="900" alt="Captura de pantalla 2026-06-08 083628" src="https://github.com/user-attachments/assets/98abbc6e-33b9-4b28-bb70-de963694e248" />

Problema #4
<img width="1202" height="902" alt="Captura de pantalla 2026-06-08 083642" src="https://github.com/user-attachments/assets/f2382eb5-d9ab-4d12-ad8c-1f1843f965d2" />

Problema#5
<img width="1182" height="932" alt="Captura de pantalla 2026-06-08 083709" src="https://github.com/user-attachments/assets/b686f522-87f9-49a6-9b78-9c80a45b40a0" />

Problema #6
<img width="1177" height="966" alt="Captura de pantalla 2026-06-08 083742" src="https://github.com/user-attachments/assets/e6c4f223-535a-4023-b066-c588f5b9f5d4" />

Problema #7
<img width="1184" height="975" alt="Captura de pantalla 2026-06-08 083757" src="https://github.com/user-attachments/assets/90f132c1-5e12-4df1-adad-440a4a319472" />

Problema #8
<img width="1177" height="865" alt="Captura de pantalla 2026-06-08 083840" src="https://github.com/user-attachments/assets/68b71fc1-53af-4ac3-a261-96cb0cc46baa" />

Problema #9
<img width="1182" height="961" alt="Captura de pantalla 2026-06-08 083819" src="https://github.com/user-attachments/assets/2849cf9d-7a7d-4335-8c38-22d247e7f458" />








