function numberIterations(a,mas)
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
            x=(-1^i)*(i^2+x^i)/factorial(2*i+1);
            i=i+1;
        end
        disp(['The sum of the row: ' num2str(S)]);
        disp(['Number of iterations: ' num2str(i-1)]);
    end
end
