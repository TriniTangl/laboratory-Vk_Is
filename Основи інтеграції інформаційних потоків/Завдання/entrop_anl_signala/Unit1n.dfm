object Form1: TForm1
  Left = 192
  Top = 116
  Width = 979
  Height = 563
  Caption = 'Form1'
  Color = clBtnFace
  Font.Charset = DEFAULT_CHARSET
  Font.Color = clWindowText
  Font.Height = -11
  Font.Name = 'MS Sans Serif'
  Font.Style = []
  OldCreateOrder = False
  PixelsPerInch = 96
  TextHeight = 13
  object Label1: TLabel
    Left = 224
    Top = 24
    Width = 27
    Height = 13
    Caption = 'ymin='
  end
  object Label2: TLabel
    Left = 216
    Top = 56
    Width = 36
    Height = 13
    Caption = 'ymax = '
  end
  object Label3: TLabel
    Left = 168
    Top = 80
    Width = 120
    Height = 13
    Caption = 'i = k-vo (ymax- ymin)/dy= '
  end
  object Label4: TLabel
    Left = 168
    Top = 120
    Width = 51
    Height = 13
    Caption = ' n= T/dt = '
  end
  object Edit1: TEdit
    Left = 304
    Top = 16
    Width = 153
    Height = 21
    TabOrder = 0
    Text = '-1'
  end
  object Edit2: TEdit
    Left = 304
    Top = 56
    Width = 153
    Height = 21
    TabOrder = 1
    Text = '1,0'
  end
  object Edit3: TEdit
    Left = 304
    Top = 88
    Width = 153
    Height = 21
    TabOrder = 2
    Text = '10'
  end
  object Edit4: TEdit
    Left = 304
    Top = 112
    Width = 153
    Height = 21
    TabOrder = 3
    Text = '100'
  end
  object Button1: TButton
    Left = 192
    Top = 176
    Width = 137
    Height = 73
    Caption = 'R U N'
    TabOrder = 4
    OnClick = Button1Click
  end
  object Button2: TButton
    Left = 352
    Top = 176
    Width = 121
    Height = 73
    Caption = 'S T O P'
    TabOrder = 5
    OnClick = Button2Click
  end
  object Memo1: TMemo
    Left = 184
    Top = 272
    Width = 369
    Height = 193
    Lines.Strings = (
      'Memo1')
    ScrollBars = ssVertical
    TabOrder = 6
  end
end
