function myFunction(a,mas)
    for n = 1 : length(mas)
        disp([' ' ]);
        disp([' e = ' num2str(mas(n))]);
        i=1;
        x=a;
        S=0;
        while abs(x)>mas(n)
            S=S+x;
            str=sprintf('%1d %10.5f %10.5f \r',i,x,S);
            disp(['' num2str(str)]);
            x=(i+x*i*cos(x+i))/factorial(i+5);
            i=i+1;
        end
        disp(['Сумма ряда ' num2str(S)]);
        disp(['Количество итераций ' num2str(i-1)]);
    end
end
