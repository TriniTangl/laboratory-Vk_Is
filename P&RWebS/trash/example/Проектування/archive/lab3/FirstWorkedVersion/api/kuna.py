import requests
import json
import hmac
import hashlib
import base64
import binascii
import price
import logs
import config as cfg

class Kuna:
    access_key = cfg.access_key
    tonce = 0
    signature = 0  
    secret_key = cfg.secret_key
    firstLastPrice = price.price()
    secondLastPrice = price.price()
    newTrade = False
    hryvnia = 0
    valuta = 0
    valutaName = 'xem'
    valutaId = 9
    isAllSold = False;

    def updateTonce(self):
        r = requests.get('https://kuna.io/api/v2/timestamp')
        print(r)
        self.tonce = r.text

    def updateSignature(self):
        self.updateTonce()
        massage = 'GET'+'|'+'/api/v2/members/me'+'|access_key='+self.access_key+'&tonce='+self.tonce
        massage = massage.encode()
        self.signature = hmac.new(b'xRWIwqx3XNqnO1NvzLTeC0LLN3AsZlV9CPjp8x1x', msg=massage, digestmod=hashlib.sha256).hexdigest()
    
    def buy(self,price):
        volume = round(float(self.hryvnia) / float(price),4)
        print(volume)
        access_key = 'aH5nnEwERIqhVBWsDfLCxA6o6bColWwNsEey6P9o'
        r = requests.get('https://kuna.io/api/v2/timestamp')
        tonce = r.text
        tonce = str(int(tonce)*1000)
        massage = 'POST|/api/v2/orders|access_key='+access_key+'&market=xrpuah'+'&price='+str(price)+'&side=buy'+'&tonce='+tonce+'&volume='+str(volume)
        massage = massage.encode()
        signature = hmac.new(b'xRWIwqx3XNqnO1NvzLTeC0LLN3AsZlV9CPjp8x1x', msg=massage, digestmod=hashlib.sha256).hexdigest()
        params = {'access_key':access_key, 'tonce': tonce, 'signature': signature, 'side':'buy', 'volume':volume, 'market':'xrpuah','price':price}
        r = requests.post('https://kuna.io/api/v2/orders',params)
        return r.text
    
    def buy(self,price):
        volume = round(float(self.hryvnia) / float(price),4)
        print(volume)
        access_key = 'aH5nnEwERIqhVBWsDfLCxA6o6bColWwNsEey6P9o'
        r = requests.get('https://kuna.io/api/v2/timestamp')
        tonce = r.text
        tonce = str(int(tonce)*1000)
        massage = 'POST|/api/v2/orders|access_key='+access_key+'&market=xrpuah'+'&price='+str(price)+'&side=buy'+'&tonce='+tonce+'&volume='+str(volume)
        massage = massage.encode()
        signature = hmac.new(b'xRWIwqx3XNqnO1NvzLTeC0LLN3AsZlV9CPjp8x1x', msg=massage, digestmod=hashlib.sha256).hexdigest()
        params = {'access_key':access_key, 'tonce': tonce, 'signature': signature, 'side':'buy', 'volume':volume, 'market':'xrpuah','price':price}
        r = requests.post('https://kuna.io/api/v2/orders',params)
        return r.text
        
    def sellAll(self,price):
        print(self.valuta)
        access_key = 'aH5nnEwERIqhVBWsDfLCxA6o6bColWwNsEey6P9o'
        r = requests.get('https://kuna.io/api/v2/timestamp')
        tonce = r.text
        tonce = str(int(tonce)*1000)
        massage = 'POST|/api/v2/orders|access_key='+access_key+'&market='+self.valutaName+'uah'+'&price='+str(price)+'&side=sell'+'&tonce='+tonce+'&volume='+str(self.valuta)
        massage = massage.encode()
        signature = hmac.new(b'xRWIwqx3XNqnO1NvzLTeC0LLN3AsZlV9CPjp8x1x', msg=massage, digestmod=hashlib.sha256).hexdigest()
        params = {'access_key':access_key, 'tonce': tonce, 'signature': signature, 'side':'sell', 'volume':self.valuta, 'market':self.valutaName+'uah','price':price}
        r = requests.post('https://kuna.io/api/v2/orders',params)
        return r.text


    def changeValuta(self,valutaName):
        access_key = 'aH5nnEwERIqhVBWsDfLCxA6o6bColWwNsEey6P9o'
        r = requests.get('https://kuna.io/api/v2/timestamp')
        tonce = r.text
        tonce = str(int(tonce)*1000)
        massage = 'GET'+'|'+'/api/v2/members/me'+'|access_key='+access_key+'&tonce='+tonce
        massage = massage.encode()
        signature = hmac.new(b'xRWIwqx3XNqnO1NvzLTeC0LLN3AsZlV9CPjp8x1x', msg=massage, digestmod=hashlib.sha256).hexdigest()
        r = requests.get('https://kuna.io/api/v2/members/me?access_key='+access_key+'&tonce='+tonce+'&signature='+signature)
        j = r.json()
        i = 0
        for balance in j['accounts']:
            if balance['currency'] == valutaName:
                self.valutaId = i
                self.valutaName = valutaName
                return True
            i+=1
        return False
        

    def getBalance(self):
        access_key = 'aH5nnEwERIqhVBWsDfLCxA6o6bColWwNsEey6P9o'
        r = requests.get('https://kuna.io/api/v2/timestamp')
        tonce = r.text
        tonce = str(int(tonce)*1000)
        massage = 'GET'+'|'+'/api/v2/members/me'+'|access_key='+access_key+'&tonce='+tonce
        massage = massage.encode()
        signature = hmac.new(b'xRWIwqx3XNqnO1NvzLTeC0LLN3AsZlV9CPjp8x1x', msg=massage, digestmod=hashlib.sha256).hexdigest()
        params = {'access_key':access_key, 'tonce': tonce, 'signature': signature}
        r = requests.get('https://kuna.io/api/v2/members/me',params)
        j = r.json()
        self.hryvnia = j['accounts'][0]['balance']
        self.valuta = j['accounts'][self.valutaId]['balance']


    def getTest(self):
        self.updateSignature()
        r = requests.get('https://kuna.io/api/v2/members/me?access_key='+self.access_key+'&tonce='+self.tonce+'&signature='+self.signature)
        print(r.status_code)
        print(r.text)


    def getTrades(self):
        log = logs.Log('API-Торги')
        try:
            r = requests.get('https://kuna.io/api/v2/trades?market='+self.valutaName+'uah')
            log.Add('status '+str(r.status_code))
            j = r.json()
            if '+02:00' in str(j[0]['created_at']):
                log.Add('Наявне +02:00')
                return 0
            else:
                log.Add('Відсутнє +02:00')
            if self.firstLastPrice.date != j[0]['created_at']:
                self.firstLastPrice.setValue(j[0]['price'],j[0]['created_at'])
                log.Add('Перша остання ціна('+self.firstLastPrice.price+'), дата('+self.firstLastPrice.date+') була ОНОВЛЕНА')
                self.secondLastPrice.setValue(j[1]['price'],j[1]['created_at'])
                log.Add('Друга остання ціна('+self.secondLastPrice.price+'), дата('+self.secondLastPrice.date+') була ОНОВЛЕНА')
                log.Add('Новий торг відбувся')
                self.newTrade = True
            else:
                self.newTrade = False
                log.Add('Нового торгу не відбулося')
            #print(r.status_code)
            #print(r.text)
        except OSError:
            log.Add('Помилка підключення:(')
        