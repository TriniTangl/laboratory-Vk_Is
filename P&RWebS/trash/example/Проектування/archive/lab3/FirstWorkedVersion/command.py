class Command():
    def __init__(self,text):
        arrayText = text.split()
        self.value = arrayText[0]
        if len(arrayText) > 1:
            self.argument = arrayText[1]
        elif len(arrayText) > 2:
            self.argument2 = arrayText[2]
        else:
            self.argument = None