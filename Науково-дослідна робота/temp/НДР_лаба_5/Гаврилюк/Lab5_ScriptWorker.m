% Lab5_ScriptWorker.m
% Script-файл з основним тілом команд

for m = 1 : 1 : length(arrayOfE)
    i = 1;
    x = inputX;
    sum = 0;
    fprintf('\rЗадана точність = %0.5f\r', arrayOfE(m));
    while abs(x) > arrayOfE(m)
        sum = sum + x;
        fprintf('--------------------------\r');
        fprintf('| %2d | %0.5f | %0.5f |\r', i, x, sum);
        x = ((-1)^(i + 1)) * ((i + x^(i + 1)) / ((i + sqrt(i) + 1) * factorial(i + 1)));
        i = i + 1;
    end
    fprintf('--------------------------\r');
    fprintf('Сума ряду = %0.5f\r', sum);
    fprintf('Кількість ітерацій = %d\r', i - 1);
end
