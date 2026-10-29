
# Importamos la libreria de Flask
from flask import Flask, redirect, render_template, request, session, url_for

# Importamos la libreria de MYSQL para Flask
from flask_mysqldb import MySQL

# Importamos librerias para generar y comprobar un hash
from werkzeug.security import generate_password_hash, check_password_hash

# Creamos una instancia del proyecto
app = Flask(__name__)

# Permite cargar las vistas cuando se modifican
app.config["TEMPLATES_AUTO_RELOAD"] = True

# Configuracion de la conexion
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'dbflask'

app.secret_key = 'mysecretkey'

mysql = MySQL(app)


# Ruta principal
@app.route("/")
def home():
    return render_template("login.html")


# REGISTRO DE USUARIOS
@app.route("/registro", methods=["GET", "POST"])
def registro():

    if request.method == "POST":

        nombre = request.form["nombre"]
        apellido_p = request.form["apellido_p"]
        apellido_m = request.form["apellido_m"]
        correo = request.form["correo"]
        password = request.form["password"]
        id_rol = request.form["id_rol"]

        # Generar el hash de la contrasena
        password_hash = generate_password_hash(password)

        cursor = None

        try:
            cursor = mysql.connection.cursor()

            # Comprobar si el correo ya existe
            cursor.execute(
                "SELECT id FROM usuarios WHERE correo = %s",
                (correo,)
            )

            if cursor.fetchone():
                return render_template(
                    "registro.html",
                    mensaje="Este correo ya se encuentra registrado."
                )

            # Insertar el usuario en la base de datos
            cursor.execute(
                """
                INSERT INTO usuarios
                (nombre, apellido_p, apellido_m, correo, password, id_rol)
                VALUES (%s, %s, %s, %s, %s, %s)
                """,
                (
                    nombre,
                    apellido_p,
                    apellido_m,
                    correo,
                    password_hash,
                    id_rol
                )
            )

            return redirect(url_for("home"))

        except Exception:
            mysql.connection.rollback()
            app.logger.exception("Error al registrar el usuario")

            return render_template(
                "registro.html",
                mensaje="Ocurrio un error al registrar el usuario."
            )

        finally:
            if cursor is not None:
                mysql.connection.commit()
                cursor.close()

    return render_template("registro.html")

#Ruta de login para el iniciio de sesión
@app.route("/login", method=["GET", "POST"])
def login ():

    #Veerificar si se enviaron los datos del formulario
    if request.method == "POST":

        #Recuperar el correo y contraseña im¿ngresados
        correo = request.form["correo"]
        password = request.form["password"]

        #Crear un cursor para ejecutar las consultas SQL
        cursor = mysql.connection.cursor()

        #Consultar SQL
        sql = """
            SELECT
            usuarios.id,
            usuarios.nombre,
            usuarios.apellido_p,
            usuarios.apellido_m,
            usuarios.correo,
            usuarios.password,
            roles.nombre,
            FROM usuarios
            INNER JOIN roles
            ON usuarios.id_rol = roles.id_rol
            WHERE usuarios.correo = %s
        """
        #Vamos a ejecutar la consulta pasandole como parametro el correo
        cursor.execute(sql, (correo,))

        #Recuperar el primer registro encontrado
        usuario = cursor.fetchone()

        #Cerramos el cursor
        cursor.close()

        if usuario and check_password_hash(usuario[5], password):

            #
            session["id_usuario"] = usuario[0]

            session["nombre"] = usuario[1]

            session["rol"] = usuario[6]

            #Si el rol es administrador lo manda a la ruta administrador sino a la de usuarios 
            if session["rol"] == "Administrador":
                return redirect(url_for("admin"))

            
            return redirect(url_for("usuario"))

        return render_template(
            "login.html",
            error = "Correo o contraseña incorrectos")
    

    return render_template("xlogin.html")


# Ejecutar el proyecto en el puerto 5000
if __name__ == "__main__":
    app.run(port=5000)
