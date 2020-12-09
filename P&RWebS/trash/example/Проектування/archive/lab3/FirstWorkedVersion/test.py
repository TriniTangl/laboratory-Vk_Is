import apicontoller
import hashlib
import requests
import json



api = apicontoller.apiController()
api.updateTonce()
print(api.tonce)
print(api.getTest2())
