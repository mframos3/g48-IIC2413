import json

with open("api/messages.json", "r+") as f:
    data = json.load(f)
    index = 0
    for element in data:
        element["mid"] = index
        index += 1
    f.seek(0)
    json.dump(data, f, indent=4)
    f.truncate()
