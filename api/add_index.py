import json

with open("messages.json", "r+") as f:
    data = json.load(f)
    index = 0
    for element in data:
        element["id"] = index
        index += 1
    f.seek(0)
    json.dump(data, f, indent=4)
    f.truncate()
