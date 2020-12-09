import requests  
import datetime
import Logs
import api.apicontoller

class BotHandler:

    def __init__(self):
        self.api_url = "https://api.telegram.org/bot702597613:AAGezc_Q1N-8drbrF1o6DPGvjEl2z1RBFnM/"
        self.last_chat_text = ''

    def get_updates(self, offset=None, timeout=30):
        method = 'getUpdates'
        params = {'timeout': timeout, 'offset': offset}
        resp = requests.get(self.api_url + method, params)
        result_json = resp.json()['result']
        return result_json

    def send(self, text):
        log = Logs.Log('Bot-outcoming')
        params = {'chat_id': 417209840, 'text': text}
        method = 'sendMessage'
        resp = requests.post(self.api_url + method, params)
        log.Add(text)
        return resp

    def get_last_update(self):
        api = apicontoller.apiController()
        api.hryvnia  = 123
        log = Logs.Log('Bot-incoming')
        get_result = self.get_updates()
        if len(get_result) > 0:
            last_update = get_result[-1]
        else:
            last_update = get_result[len(get_result)]
        if last_update['message']['chat']['id'] == 417209840:
            last_chat_text = last_update['message']['text']
            if self.last_chat_text != last_chat_text:
                self.last_chat_text = last_chat_text
                log.Add(last_chat_text)
                return last_chat_text
        log.Add("Нічого новго")
        return None