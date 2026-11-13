from flask import Flask, render_template, request, url_for, redirect, flash
from flask_mysqldb import MySQL

app = Flask(__name__)

app.config["TEMPLATES_AUTO_RELOAD"] = True

app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'crud_autos'

app.secret_key = 'mysecretkey'

mysql = MySQL(app)

@app.route('/')
def index():
    con = mysql.connection.cursor()
    con.execute('SELECT * FROM tb_autos')
    conAutos = con.fetchall()
    print(conAutos)
    return render_template('index.html', listAutos = conAutos)

@app.route('/guardar', methods=['POST'])
def guardar():
    if request.method == 'POST':
        marca = request.form['txtMarca']
        modelo = request.form['txtModelo']
        anio = request.form['txtAnio']
        print(marca, modelo, anio)

        """ CONEXION CON LA BD Y EJECUCION  DEL INSERT """
        con = mysql.connection.cursor()
        con.execute(
            'INSERT INTO tb_autos(marca, modelo, anio) VALUES(%s, %s, %s)', (marca, modelo, anio)
            )
        mysql.connection.commit()

    flash('El auto se registro con exito')
    return redirect(url_for('index'))

@app.route('/editar/<int:id>')
def editar(id):
    con = mysql.connection.cursor()
    con.execute('SELECT * FROM tb_autos WHERE id=%s', (id,))
    consultarId = con.fetchone()
    con.close()
    return render_template('editarAutos.html', Autos = consultarId)

@app.route('/actualizar/<int:id>', methods=['POST'])
def actualizar(id):
    if request.method == 'POST':
        marca = request.form['txtMarca']
        modelo = request.form['txtModelo']
        anio = request.form['txtAnio']

        con = mysql.connection.cursor()
        con.execute('UPDATE tb_autos SET marca=%s, modelo=%s, anio=%s WHERE id=%s', (marca, modelo, anio, id))
        mysql.connection.commit()
    flash('Se actualizo el auto ' + marca)
    return redirect(url_for('index'))

@app.route('/eliminar/<int:id>', methods=['POST'])
def eliminar():
    if request.method == 'POST':
        marca = request.form['txtMarca']

        con = mysql.connection.cursor()
        con.execute('DELETE FROM tb_autos WHERE id=%s', (id,))
        mysql.connection.commit()

    flash('Se elimino el auto ' + marca)
    return  redirect(url_for('index'))


if __name__ == '__main__':
    app.run(debug=True)