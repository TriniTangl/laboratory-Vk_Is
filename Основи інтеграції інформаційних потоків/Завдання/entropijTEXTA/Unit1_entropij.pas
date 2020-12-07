unit Unit1_entropij;
   {nabor data for entropii}
interface

uses
  Windows, Messages, SysUtils, Variants, Classes, Graphics, Controls, Forms,
  Dialogs, StdCtrls;

type
  TForm1 = class(TForm)
    Memo1: TMemo;
    Button1: TButton;
    Button2: TButton;
    Label1: TLabel;
    Edit1: TEdit;
    Label2: TLabel;
    procedure Button1Click(Sender: TObject);
    procedure Button2Click(Sender: TObject);
    procedure Edit1Change(Sender: TObject);
  private
    { Private declarations }
  public
    { Public declarations }
  end;

var   i,j:integer ;    Form1: TForm1;
s,d:char ;        Memo1: TMemo;
 a1:array [1..35] of integer; //k-vo bukv s nomerom i f1:text;
 a2:array [1..35,1..2] of real;
 const c1=65; c2=90; c3=25; c4=97; c5=122; //for engl
r1= 192; r2=223; r3=31; r4=224; r5=255; //for russion

implementation

{$R *.dfm}
 

procedure TForm1.Button1Click(Sender: TObject);
var  M, i,j,k:integer ; h:real;   Form1: TForm1;
s,d:char ; s1:string [255];

f2:textfile;
begin   m:=strtoint(edit1 .Text);
assignfile(f2,'D:\work\text3.txt');

 reset(f2);
 k:=0;
 if m=1 then                                             begin
 memo1.lines.add( ' vubor m== '+ floattostrf(m,fffixed,15,0)+'  - text of english ');
  while not eof(f2) do begin  //1
  readln(f2,s1);  i:=1;  while i<=length(s1) do begin

s:= s1[i];
if (ord(s)>=c1) and (ord(s)<=c2)then
a1[1+ord(s)-c1]:=a1[1+ord(s)-c1]+1;
 if (ord(s)>=c4) and (ord(s)<=c5)then a1[1+ord(s)-c4]:=a1[1+ord(s)-c4]+1;
   i:=i+1;                                      end;
 k:=0;  for i:=1 to c3+1 do            begin
  k:=k+a1[i];
    end;

                          end;
memo1.lines.add( ' k-vo simvolov = '+ floattostrf(k,fffixed,15,2));
 h:=0;
  memo1.lines.add( '� simvola: '+'  '+' simvol = : '+ ' probably p(i)= :');
 for i:=1 to c3+1 do            begin
  a2[i,1]:=a1[i]; a2[i,2]:=a2[i,1]/k;
   memo1.lines.add( ' i = '+ floattostrf(i,fffixed,10,0)+'             '+
   '    '+chr(c4+i-1)+ '              '+floattostrf(a2[i,2],fffixed,15,4));
    h:=h+a2[i,2]; end;
      memo1.lines.add( ' h =p(1)+p(2)+...+p(26)= '+ floattostrf(h,fffixed,15,3));

   h:=0;
   

    for i:=1 to c3+1 do if a2[i,2]<>0 then h:=h-a2[i,2]*ln( a2[i,2])/ln(2);
     memo1.lines.add( ' entropij = '+ floattostrf(h,fffixed,15,4));
                                                            end
else if m=2 then begin
 memo1.lines.add( ' vubor m== '+ floattostrf(m,fffixed,15,0)+'  - text of russion ');
         while not eof(f2) do begin
  readln(f2,s1);  i:=1;  while i<=length(s1) do begin

s:= s1[i];
if (ord(s)=168) or (ord(s)=184) then
a1[33]:=a1[33]+1;
if (ord(s)>=r1) and (ord(s)<=r2)then
a1[1+ord(s)-r1]:=a1[1+ord(s)-r1]+1;
 if (ord(s)>=r4) and (ord(s)<=r5)then a1[1+ord(s)-r4]:=a1[1+ord(s)-r4]+1;

   i:=i+1;                                      end;  // end string
 k:=0;  for i:=1 to r3+2 do            begin
  k:=k+a1[i];
  end;

                          end;
memo1.lines.add( ' k-vo char = '+ floattostrf(k,fffixed,15,2));
 h:=0;
  memo1.lines.add( '� simvola: '+'  '+' simvol = : '+ ' probably p(i)= :');

  for i:=1 to r3+2 do if a2[i,2]<>0 then h:=h-a2[i,2]*ln( a2[i,2])/ln(2);

 for i:=1 to r3+2 do            begin
  a2[i,1]:=a1[i]; a2[i,2]:=a2[i,1]/k;
 if i<=32 then    memo1.lines.add( ' i = '+ floattostrf(i,fffixed,10,0)+'             '+
   '    '+chr(r4+i-1)+ '              '+floattostrf(a2[i,2],fffixed,15,4))
   else  memo1.lines.add( ' i = '+ floattostrf(i,fffixed,10,0)+'             '+
   '    '+chr(184)+ '              '+floattostrf(a2[i,2],fffixed,15,4)) ;

    h:=h+a2[i,2]; end;
      memo1.lines.add( ' h =p(1)+p(2)+...+p(33)= '+ floattostrf(h,fffixed,15,3));

   h:=0;  
    for i:=1 to r3+1 do if a2[i,2]<>0 then h:=h-a2[i,2]*ln( a2[i,2])/ln(2);
     memo1.lines.add( ' vubruno m== '+ floattostrf(m,fffixed,15,0)+' russion ');
     memo1.lines.add( ' entropij = '+ floattostrf(h,fffixed,15,4));

 end
 else begin
                               begin
 memo1.lines.add( ' vubor m== '+ floattostrf(m,fffixed,15,0)+'  - text of ukrain ');
  while not eof(f2) do begin  //1
  readln(f2,s1);  i:=1;  while i<=length(s1) do begin

s:= s1[i];
if (ord(s)=178) or (ord(s)=179)then a1[27]:=a1[27]+1;
if (ord(s)=175) or (ord(s)=191)then a1[28]:=a1[28]+1;
if (ord(s)=170) or (ord(s)=186)then a1[30]:=a1[30]+1;
if (ord(s)=39) then a1[33]:=a1[33]+1;
// if (ord(s)=178) or (ord(s)=179)then a1[27]:=a1[27]+1;
if (ord(s)>=r1) and (ord(s)<=r2)then
a1[1+ord(s)-r1]:=a1[1+ord(s)-r1]+1;
 if (ord(s)>=r4) and (ord(s)<=r5)then a1[1+ord(s)-r4]:=a1[1+ord(s)-r4]+1;
   i:=i+1;                                      end;
 k:=0;  for i:=1 to r3+2 do            begin
  k:=k+a1[i];end;
                          end;
memo1.lines.add( ' k-vo char = '+ floattostrf(k,fffixed,15,2));
 h:=0;   memo1.lines.add( '� simvola: '+'  '+' simvol = : '+ ' probably p(i)= :');
 for i:=1 to r3+2 do            begin
  a2[i,1]:=a1[i]; a2[i,2]:=a2[i,1]/k;
   if i=27 then begin   memo1.lines.add( ' i = '+ floattostrf(i,fffixed,10,0)+'             '+
   '    '+chr(179)+ '              '+floattostrf(a2[i,2],fffixed,15,4));
      h:=h+a2[i,2];  continue end;
       if i=28 then begin   memo1.lines.add( ' i = '+ floattostrf(i,fffixed,10,0)+'             '+
   '    '+chr(191)+ '              '+floattostrf(a2[i,2],fffixed,15,4));
      h:=h+a2[i,2]; continue end;
  if i=30 then begin   memo1.lines.add( ' i = '+ floattostrf(i,fffixed,10,0)+'             '+
   '    '+chr(186)+ '              '+floattostrf(a2[i,2],fffixed,15,4));
      h:=h+a2[i,2]; continue end;
   if i=33 then begin   memo1.lines.add( ' i = '+ floattostrf(i,fffixed,10,0)+'             '+
   '    '+chr(39)+ '              '+floattostrf(a2[i,2],fffixed,15,4));
      h:=h+a2[i,2]; continue end;
    memo1.lines.add( ' i = '+ floattostrf(i,fffixed,10,0)+'             '+
   '    '+chr(r4+i-1)+ '              '+floattostrf(a2[i,2],fffixed,15,4));
      h:=h+a2[i,2]; end;  //4 end
      memo1.lines.add( ' h =p(1)+p(2)+...+p(33)= '+ floattostrf(h,fffixed,15,3));

   h:=0; for i:=1 to r3+2 do if a2[i,2]<>0 then h:=h-a2[i,2]*ln( a2[i,2])/ln(2);
      memo1.lines.add( ' entropij = '+ floattostrf(h,fffixed,15,4));
                                                           end
    end;
end;     


procedure TForm1.Button2Click(Sender: TObject);
begin
close;
end; // proc

procedure TForm1.Edit1Change(Sender: TObject);
begin
  i:=strtoint(edit1.Text);
end;

end.


