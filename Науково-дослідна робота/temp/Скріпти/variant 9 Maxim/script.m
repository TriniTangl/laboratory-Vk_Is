function sumaRiadu(a,mas)
    for n = 1 : length(mas)
        disp([' ' ]);
        disp([' e = ' num2str(mas(n))]);
        i=1;
        x=a;
        S=0;
        while abs(x)>mas(n)
            S=S+x;
            str=sprintf('%5d %10.5f %10.5f \r\n',i,x,S);
            disp(['' num2str(str)]);
            x=((i+1)*sin(i))/(factorial(i+1)+log10(i*x)^2);
            i=i+1;
        end
        disp(['Сума ряду - ' num2str(S)]);
        disp(['Кількість членів - ' num2str(i-1)]);
    end
end
