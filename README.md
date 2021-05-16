## Mercedes Benz - CRM

#### Instalación de requisitos
- Instalar python.
- Instalar `PostgreSQL`
- Crear una nueva base de datos llamada `crm_db`
- Instalar pipenv con el comando `pip install pipenv`.
  - Pipenv es un manejador de dependencias y entornos virtuales para python y nos permite instalar todas las dependencias del proyecto con un sólo comando, similar a cómo funciona `npm`.

#### Configuración del proyecto
- Crear un archivo llamado `.env` en la carpeta raíz del proyecto.
  - Esto suele hacerse con el objetivo de no subir las credenciales de acceso, tokens de APIs u otra información valiosa a un repositorio.
- Dentro del archivo `.env` y siguiendo la estructura del archivo `.example.env` llenar el valor de la variable `SECRET_KEY` con el valor de un token cualquiera que django usará internamente para tareas criptográficas.
  - Puede usarse: `tngQ2JDbON5!ñmsFRnE(OKÑqtTMTT-OAIF0hZRFUj_xzQ-7vJCÑH.#2W_i7I`, por ejemplo. 
- Colocar en el archivo `.env` los valores de las variables de conexión a la base de datos en PostgreSQL.
- Dentro de la carpeta raíz del proyecto ejecutar el comando `pipenv install` que instalará las dependencias del proyecto listadas en el archivo `Pipfile` y a su vez creará un entorno virtual para dichas dependencias.
- Realizar la migración de la base de datos definida en los modelos de Django con el comando `pipenv run migrate`
- Crear un superusuario de django ejecutando el comando `pipenv run createsuperuser` y llenando los datos que se piden en la terminal.

#### Correr el proyecto
- Se puede iniciar el servidor con el comando `pipenv run server` que por defecto lo iniciará en `localhost:8000`