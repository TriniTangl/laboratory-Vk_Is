import time 
import api.apicontoller
import Logs
from command import Command
from data import Data

log = Logs.Log('Main')
api = api.apicontoller.apiController()
log.Add('_______________________')
new_offset = None
updateTime = 1
log.Add('Головний цикл запустився')
api.getBalance()
data = Data()

while True:
    log.Add('_______________________')
    api.getTrades()
    
    time.sleep(updateTime)

