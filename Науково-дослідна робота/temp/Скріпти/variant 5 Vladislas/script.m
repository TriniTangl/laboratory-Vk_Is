function func(a,mas)
    for n = 1 : length(mas)
        disp([' ' ]);
        disp([' точність = ' num2str(mas(n))]);
        i=1;
        x=a;
        S=0;
        while abs(x)>mas(n)
            S=S+x;
            str=sprintf('|%2d | %10.5f | %10.5f | \r',i,x,S);
            disp(['-------------------------------']);
            disp(['' num2str(str)]);
            x=((-1)^(i+1))*(i+x^(i+1))/((i+sqrt(i)+1)*factorial(i+1));
            i=i+1;
        end
        disp(['-------------------------------']);
        disp(['Сума рядку - ' num2str(S)]);
        disp(['Кількість ітерацій ' num2str(i-1)]);
    end
end
