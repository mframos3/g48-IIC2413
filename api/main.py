from flask import Flask, request, json
from pymongo import MongoClient
import os
import atexit
import subprocess

MESSAGES_KEYS = ['message', 'sender', 'receptant', 'lat', 'long', 'date']

mongod = subprocess.Popen('mongod', stdout=subprocess.DEVNULL)

atexit.register(mongod.kill)

client = MongoClient('localhost')

db = client["local"]

messages = db.messages

users = db.users

app = Flask(__name__)


@app.route("/")
def home():
    return "<h1>API Homepage</h1>"


@app.route("/messages")
def get_messages():
    # Aquí agregar después filtros de búsqueda usando funciones de mongodb
    output = [msg for msg in messages.find({}, {"_id": 0})]
    return json.jsonify(output)


@app.route("/messages/<int:mid>")
def get_message(mid):
    msgs = list(messages.find({"mid": mid}, {"_id": 0}))
    return json.jsonify(msgs)


@app.route("/messages", methods=['POST'])
def create_message():
    data = {key: request.json[key] for key in MESSAGES_KEYS}
    count = messages.count_documents({})
    data["mid"] = count + 1
    result = messages.insert_one(data)
    if result:
        message = "Mensaje creado con éxito!"
        success = True
    else:
        message = "No se pudo crear el mensaje!"
        success = False
    return json.jsonify({'success': success, 'message': message})


@app.route('/messages/<int:mid>', methods=['DELETE'])
def delete_message(mid):
    messages.delete_one({"mid": mid})
    message = f'El mensaje con ID {mid} ha sido eliminado!'
    return json.jsonify({'result': 'success', 'message': message})

@app.route('/users/<int:uid>', methods=["GET"])
def get_user(uid):
    msgs = list(users.find({"uid": mid}, {"uid": uid}))
    return json.jsonify(msgs)


if os.name == 'nt':
    app.run()
