program Project_entr;

uses
  Forms,
  Unit1_entropij in 'Unit1_entropij.pas' {Form1};

{$R *.res}

begin
  Application.Initialize;
  Application.CreateForm(TForm1, Form1);
  Application.Run;
end.
