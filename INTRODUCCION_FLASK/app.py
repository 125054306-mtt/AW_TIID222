#Importamos la libreria de flask
from flask import Flask, redirect, render_template, request

#Importra la libreria de MYSQL para Flask
from flask_mysqldb import MySQL

#Importamos libreriaas para generar un hash y para comprobar que el hash coincida con la contraseña
from werkzeug.security import generate_password_hash, check_password_hash

#Creamos unas instancia del proyecto
app = Flask(__name__)
app.config["TEMPLATES_AUTO_RELOAD"]=True

#Configuración de la conexion
app.config['MYSQL_HOST']= 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'dbFlask'
app.secret_key = 'mysecretkey'

mysql = MySQL(app)

#Ruta raiz
@app.route("/")
#Crear una función que se llama home
def home():
    #Retornar un  mensaje
    return render_template("login.html")

@app.route("/registro", method=["GET", "POST"])
def registro():

    if request.method == "POST":
        nombres = request.form["nombre"]
        apellido_p = request.form["apellido_p"]
        apellido_m = request.form["apellido_m"]
        correo = request.form["correo"]
        password_hash = request.form["password_hash"]
        id_rol = request.form["id_rol"]

        #Generamos un hash a partir de la contraseña
        password = generate_password_hash (password_hash)


#Ejecutar el proyecto en el puerto 5000
if __name__ == "__main__":
    app.run(port=5000)