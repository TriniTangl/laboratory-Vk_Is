import requests 
import json
URL = "http://127.0.0.1:3000/save"
data = {'x1':3,'x2':4,'y1':1,'y2':4} 
headers = {'Content-type': 'application/json'}
r = requests.post(url = URL,data=json.dumps(data) , headers = headers) 
print('status '+str(r.status_code));
print('\nXML:\n'+r.text);