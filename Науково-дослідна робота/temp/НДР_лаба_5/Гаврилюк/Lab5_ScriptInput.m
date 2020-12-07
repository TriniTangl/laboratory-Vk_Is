% Lab5_ScriptInput.m
% Script-файл для введення глобальних змінних

global inputX arrayOfE;
selectInputMethod = menu('Звідки брати Х?', 'Ввести вручну', 'Взяти значення за замовчуванням');
if selectInputMethod == 1
    inputX = input('Введіть значення Х');    
else
    inputX = 0.27;
end
selectInputMethod = menu('Звідки брати масив заданих точностей?', 'Ввести вручну', 'Взяти значення за замовчуванням');
if selectInputMethod == 1
    arrayOfE = input('Введіть масив заданих точностей');
else
    arrayOfE = [10^-2 10^-3 10^-4 10^-5];
end
clear selectInputMethod;
