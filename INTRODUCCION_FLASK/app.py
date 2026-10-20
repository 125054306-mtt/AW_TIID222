#Importamos la libreria de flask
from flask import Flask, redirect, render_template

#Creamos unas instancia del proyecto
app = Flask(__name__)
app.config["TEMPLATES_AUTO_RELOAD"]=True

#Creacion de rutas

#Ruta raiz
@app.route("/")
#Crear una función que se llama home
def home():
    #Retornar un  mensaje
    return render_template("index.html")

@app.route("/guardar")
def guardar():
    return "Producto agregado correctamente!"

#Retornamos a otra ruta
@app.route("/login")
def login():
    return render_template("login.html")

#Redirecciona a otra ruta
@app.route("/logout")
def logout():
    return redirect("login")

#Ejecutar el proyecto en el puerto 5000
if __name__ == "__main__":
    app.run(port=5000)