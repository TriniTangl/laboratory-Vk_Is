unit Unit1entrop_anal_sign;

interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, StdCtrls;

type
  TForm1 = class(TForm)
    Label1: TLabel;
    Edit1: TEdit;
    Label2: TLabel;
    Edit2: TEdit;
    Label3: TLabel;
    Edit3: TEdit;
    Label4: TLabel;
    Edit4: TEdit;
    Button1: TButton;
    Button2: TButton;
    Memo1: TMemo;
    procedure Button1Click(Sender: TObject);
    procedure Button2Click(Sender: TObject);

    
  private
    { Private declarations }
  public
    { Public declarations }
  end;

var
  Form1: TForm1;
  {f : text;} s,h : string; v: char;
      n, i, k, j : integer;
         z: boolean; ymin,ymax, t, dy,dt, u, ps,c, r, g: real;

       p : array[0..500] of real;
implementation

{$R *.dfm}

procedure TForm1.Button1Click(Sender: TObject);
  function F(Z:real):real;

    begin
     f:=sqr(sin(3.*z));
     end;
begin

       ymin:=strtofloat(edit1 .Text);
        ymax:=strtofloat(edit2 .Text);
           i:=strtoint(edit3 .Text);
            n:=strtoint(edit4 .Text);
 memo1.lines.add( ' ymin= '+ floattostrf(ymin,fffixed,15,2));
 memo1.lines.add( ' ymax= '+ floattostrf(ymax,fffixed,15,2));
 memo1.lines.add( ' k-vo (ymax- ymin)/dy= '+ floattostrf(i,fffixed,15,0));
 memo1.lines.add( '  n= T/dt =  '+ floattostrf(n,fffixed,15,0));
         for j:=1 to i do p[j]:=0;
    dt:=5/n;  dy:=(ymax-ymin)/i ;
    memo1.lines.add( '  delta_y =  '+ floattostrf(dy,fffixed,15,3));
     for k:=1 to n do begin t:=k*5./n; r:=f(t);
       for j:=1 to i do begin  g:=ymin+(j-1)*dy ;
        if( r>=g) and (r<(g+dy)) then  p[j]:= p[j]+1;
                        end;
                                                    end;
               r:=0;   g:=0;  ps:=0;
                 for j:=1 to i do   ps:=ps+ p[j];
   for j:=1 to i do   begin p[j]:= p[j]/ps; r:=r+ p[j] ;
     u:=p[j]; if u>1.e-10 then c:=-u*ln(u)/ln(2) else c:=0;  g:=g+c;
memo1.lines.add( '  p[j] =  '+ floattostrf(p[j],fffixed,15,4)+'      y[j] =  '
+ floattostrf(ymin+(j-1)*dy,fffixed,15,4));

    end;
    memo1.lines.add( ' sum P==1  '+floattostrf(r,fffixed,15,4)+' entrop H ='+
     floattostrf(g,fffixed,15,4));  c:=1/i;
  memo1.lines.add( ' entrop ravnomernogo raspredelenij = log2(i)='+
     floattostrf(ln(i)/ln(2),fffixed,15,4));
end;

procedure TForm1.Button2Click(Sender: TObject);
begin
close
end;

end.
