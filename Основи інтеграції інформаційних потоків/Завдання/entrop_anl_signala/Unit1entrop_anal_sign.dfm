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
    Left = 276
    Top = 30
    Width = 35
    Height = 16
    Caption = 'ymin='
  end
  object Label2: TLabel
    Left = 266
    Top = 69
    Width = 45
    Height = 16
    Caption = 'ymax = '
  end
  object Label3: TLabel
    Left = 207
    Top = 98
    Width = 149
    Height = 16
    Caption = 'i = k-vo (ymax- ymin)/dy= '
  end
  object Label4: TLabel
    Left = 207
    Top = 148
    Width = 57
    Height = 16
    Caption = ' n= T/dt = '
  end
  object Edit1: TEdit
    Left = 374
    Top = 20
    Width = 188
    Height = 21
    TabOrder = 0
    Text = '-1'
  end
  object Edit2: TEdit
    Left = 374
    Top = 69
    Width = 188
    Height = 21
    TabOrder = 1
    Text = '1,0'
  end
  object Edit3: TEdit
    Left = 374
    Top = 108
    Width = 188
    Height = 21
    TabOrder = 2
    Text = '256'
  end
  object Edit4: TEdit
    Left = 374
    Top = 138
    Width = 188
    Height = 21
    TabOrder = 3
    Text = '100'
  end
  object Button1: TButton
    Left = 236
    Top = 217
    Width = 169
    Height = 89
    Caption = 'R U N'
    TabOrder = 4
    OnClick = Button1Click
  end
  object Button2: TButton
    Left = 433
    Top = 217
    Width = 149
    Height = 89
    Caption = 'S T O P'
    TabOrder = 5
    OnClick = Button2Click
  end
  object Memo1: TMemo
    Left = 226
    Top = 335
    Width = 455
    Height = 237
    Lines.Strings = (
      'Memo1')
    ScrollBars = ssVertical
    TabOrder = 6
  end
end
