function Fl(a,mas)
    for n = 1 : length(mas)
        disp(['-----------------------------------------------']);
        disp(['e = ' num2str(mas(n))]);
        i=1;
        x=a;
        S=0;
        while abs(x)>mas(n)
            S=S+x;
            str=sprintf('%5d %20.5f %20.5f \r\n',i,x,S);
            disp(['' num2str(str)]);
            x=(i*x^(i+1))/factorial(i+2);
            i=i+1;
        end
        disp(['Cумма ряду: ' num2str(S)]);
        disp(['Кількість ітерацій: ' num2str(i-1)]);
    end
end
