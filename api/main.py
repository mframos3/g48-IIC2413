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

messages.create_index([('message', 'text')])

app = Flask(__name__)


@app.route("/")
def home():
    return "<h1>API Homepage</h1>"


@app.route("/messages")
def get_messages():
    parameters = request.json
    required = parameters['required'] if 'required' in parameters else []
    prohibited = parameters['prohibited'] if 'prohibited' in parameters else []
    desirable = parameters['desirable'] if 'desirable' in parameters else []
    filtered = ""
    for r in required:
        filtered += f"\"{r}\" "
    
    for d in desirable:
        filtered += f"{d} "
    # Rellenar con un if para agregar las palabras deseadas al string 'filtered'

    if filtered:
        for p in prohibited:
            filtered += f"-{p} "
        result = messages.find({"$text": {"$search": filtered}}, {"_id": 0})
    else:
        result = messages.find({}, {"_id": 0})
    output = [msg for msg in result]
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


@app.route('/users/<int:uid>')
def get_user(uid):
    user = list(users.find({"uid": uid}, {"_id": 0}))
    parameters = request.json
    required = parameters['required'] if 'required' in parameters else []
    prohibited = parameters['prohibited'] if 'prohibited' in parameters else []
    # desirable = parameters['desirable'] if 'desirable' in parameters else []
    filtered = ""
    for r in required:
        filtered += f"\"{r}\" "

    # Rellenar con un if para agregar las palabras deseadas al string 'filtered'

    if filtered:
        for p in prohibited:
            filtered += f"-{p} "
        result = messages.find({"$text": {"$search": filtered},
                                "sender": uid}, {"_id": 0})
    else:
        result = messages.find({"sender": uid}, {"_id": 0})
    user_messages = [msg for msg in result]
    user[0]['messages'] = user_messages
    return json.jsonify(user)


@app.route('/communication/<int:uid_1>/<int:uid_2>')
def get_communication(uid_1, uid_2):
    msgs = list(messages.find({'$or': [
        {'$and': [{'sender': uid_1}, {'receptant': uid_2}]},
        {'$and': [{'sender': uid_2}, {'receptant': uid_1}]}]}, {'_id': 0}))
    return json.jsonify(msgs)


if os.name == 'nt':
    app.run()
