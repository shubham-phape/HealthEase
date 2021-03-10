import numpy as np
import json
import jinja2
import time
import datetime
from flask import Flask, redirect, url_for, request, abort, render_template
import _pickle as pickle
from flask import Flask 
from flask_mysqldb import MySQL 

model = pickle.load(open("prediction.pkl", "rb"))

app = Flask(__name__)

app.config['MYSQL_HOST'] = '127.0.0.1'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = 'root'
app.config['MYSQL_DB'] = 'ckd'
mysql = MySQL(app)


@app.route('/prediction_model',methods = ['POST' , 'GET'])
def prediction_model():
    if request.method == 'POST':
        cur = mysql.connection.cursor() 
        rid = request.form['rid']  
        pid = request.form['pid']
        ts = time.time()
        timestamp = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d %H:%M:%S')
        age = request.form['age'] #since post method
        bp = request.form['bp']
        sg = request.form['sg']
        al = request.form['al']
        su = request.form['su']
        rbc = request.form['rbc']
        pc = request.form['pc']
        pcc = request.form['pcc']
        ba = request.form['ba']
        bgr = request.form['bgr']
        bu = request.form['bu']
        sc = request.form['sc']
        sod = request.form['sod']
        pot = request.form['pot']
        hemo = request.form['hemo']
        pcv = request.form['pcv']
        wbcc = request.form['wbcc']
        rbcc = request.form['rbcc']
        htn = request.form['htn']
        dm = request.form['dm']
        cad = request.form['cad']
        appet = request.form['appet']
        pe = request.form['pe']
        ane = request.form['ane']
        cur.execute('''INSERT INTO reports VALUES (%s ,%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)''',
            (rid, pid, timestamp, age, bp, sg, al, su, rbc, pc, pcc, ba, bgr, bu, sc, sod, pot, hemo, pcv, wbcc, rbcc,
             htn, dm, cad, appet, pe, ane))
        mysql.connection.commit()
        predict = []
        predict.extend((age,bp,sg,al,su,rbc,pc,pcc,ba,bgr,bu,sc,sod,pot,hemo,pcv,wbcc,rbcc,htn,dm,cad,appet,pe,ane))
        predict_request = np.array(predict)
        new = np.reshape(predict_request, (-1,24))
        y_hat = model.predict(new)
        cur.execute('''INSERT INTO stage (sid, pid, ckd) VALUES (%s, %s, %s)''',(rid, pid, y_hat[0]))
        mysql.connection.commit()
        return render_template("index.html", prediction = str(y_hat[0]))

if __name__ == '__main__':
   app.run(debug = True)