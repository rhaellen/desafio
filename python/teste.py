import json

def ler_json():
    with open('clientes.json', 'r', encoding='utf8') as f:
        return json.load(f)

data = ler_json()

print(data)

