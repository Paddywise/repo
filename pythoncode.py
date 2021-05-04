from flask import Flask
from flask import url_for
from flask import request
from flask import render_template
from flask_mysqldb import MySQL

app = Flask(__name__)

app.config['MYSQL_HOST'] = "localhost"
app.config['MYSQL_USER'] = "Besucher"
app.config['MYSQL_PASSWORD'] = ""
app.config['MYSQL_DB'] = "db"

mysql = MySQL(app)


@app.route("/", methods=['POST', 'GET'])
def index():
    if request.method == 'POST':
        value_l = request.form["lastname_p"]
        value_f = request.form["firstname_p"]

        mycursor = mysql.connection.cursor()
        mycursor.execute("INSERT INTO namen (Name,Vorname) VALUES (%s,%s)", (value_l, value_f))

        mysql.connection.commit()

        users = mycursor.execute("SELECT * FROM namen")
        userDetails = mycursor.fetchall()
        mycursor.close()
        return render_template('users.html', userDetails=userDetails)

    return render_template('index.html')


@app.route("/users", methods=['POST', 'GET'])
def users():
    mycursor = mysql.connection.cursor()
    users = mycursor.execute("SELECT * FROM namen")

    #if users > 0:
    userDetails = mycursor.fetchall()
    return render_template('users.html', userDetails=userDetails)

    #return render_template('index.html')


if __name__ == '__main__':
    app.static_folder = 'templates'
    app.run(host="0.0.0.0", port=80, debug=True)
