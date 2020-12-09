import time
class Log:
  def __init__(self, className):
    self.className = str(className) + ': '
    #file = open("logs"+time.strftime("_%d.%m", time.gmtime())+".txt", "w")


  def Add(self, text):
    file = open("./logs/logs"+time.strftime("_%d.%m", time.gmtime())+".txt" , 'a')
    file.write('\n'+time.strftime("%H:%M:%S", time.gmtime()) + '|'+ self.className + str(text))
    print(time.strftime("%H:%M:%S", time.gmtime()) + '|'+ self.className + str(text))  
    file.close()

