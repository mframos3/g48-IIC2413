from flask import Flask, render_template, request, abort, json
from pymongo import MongoClient
import pandas as pd
import matplotlib.pyplot as plt
import os
import atexit
import subprocess

MESSAGES_KEYS = ['message', 'sender', 'receptant', 'lat', 'long', 'date']

mongod = subprocess.Popen('mongod', stdout=subprocess.DEVNULL)

atexit.register(mongod.kill)

client = MongoClient('localhost')

db = client["database"]

messages = db.messages

app = Flask(__name__)

@app.route("/")
def home():
    return "<h1>API Homepage</h1>"

@app.route("/messages")
def get_messages():
    output = [msg for msg in messages.find({}, {"_id": 0})]
    return json.jsonify(output)

@app.route("/messages/<int:mid>")
def get_message(mid):
    msgs = list(messages.find({"mid": mid}, {"_id": 0}))
    return json.jsonify(msgs)

@app.route("/messages", methods=['POST'])
def create_user():

    data = {key: request.json[key] for key in MESSAGES_KEYS}

    count = messages.count_documents({})
    data["mid"] = count + 1

    result = None # messages.insert_one(data)
    #TODO: falta agregar todo el resto de atributos.

    if (result):
        message = "1 mensaje creado"
        success = True
    else:
        message = "No se pudo crear el mensaje"
        success = False

    return json.jsonify({'success': success, 'message': message})

@app.route('/messages/<int:mid>', methods=['DELETE'])
def delete_message(mid):

    messages.delete_one({"mid": mid})

    message = f'Mensaje con id={mid} ha sido eliminado.'

    return json.jsonify({'result': 'success', 'message': message})

if os.name == 'nt':
    app.run()