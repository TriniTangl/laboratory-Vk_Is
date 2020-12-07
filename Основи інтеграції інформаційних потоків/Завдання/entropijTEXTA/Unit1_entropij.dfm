object Form1: TForm1
  Left = 192
  Top = 116
  Width = 979
  Height = 563
  Caption = 'Form1'
  Color = clBtnFace
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -14
  Font.Name = 'MS Sans Serif'
  Font.Style = []
  OldCreateOrder = False
  PixelsPerInch = 120
  TextHeight = 16
  object Label1: TLabel
    Left = 158
    Top = 30
    Width = 129
    Height = 22
    Caption = 'vvod '#8470' alfavita'
    Font.Charset = RUSSIAN_CHARSET
    Font.Color = clWindowText
    Font.Height = -20
    Font.Name = 'Times New Roman'
    Font.Style = []
    ParentFont = False
  end
  object Label2: TLabel
    Left = 246
    Top = 59
    Width = 263
    Height = 22
    Caption = '1 - english; 2 - russion; 3 - ukrain'
    Font.Charset = RUSSIAN_CHARSET
    Font.Color = clWindowText
    Font.Height = -20
    Font.Name = 'Times New Roman'
    Font.Style = []
    ParentFont = False
  end
  object Memo1: TMemo
    Left = 148
    Top = 266
    Width = 641
    Height = 267
    Lines.Strings = (
      'Memo1')
    ScrollBars = ssVertical
    TabOrder = 0
  end
  object Button1: TButton
    Left = 158
    Top = 128
    Width = 247
    Height = 31
    Caption = 'Run'
    TabOrder = 1
    OnClick = Button1Click
  end
  object Button2: TButton
    Left = 502
    Top = 118
    Width = 267
    Height = 51
    Caption = 'close'
    TabOrder = 2
    OnClick = Button2Click
  end
  object Edit1: TEdit
    Left = 158
    Top = 59
    Width = 50
    Height = 24
    TabOrder = 3
    OnChange = Edit1Change
  end
end
