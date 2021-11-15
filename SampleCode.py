import win32api
import sys
import os
import time
import json

from reportlab.pdfgen import canvas
from reportlab.pdfbase import pdfmetrics
from reportlab.pdfbase.cidfonts import UnicodeCIDFont
from reportlab.lib.pagesizes import A4, portrait
from reportlab.lib.units import mm
from reportlab.platypus import Table, TableStyle
from reportlab.lib import colors

#js_dta = json.loads(message)
dictionary = {1:{'a': 'Apple', 'b': 'Banana', 'c': 'Cherries', 'd': 'Dragon Fruit', 'length': 0}}
list1 = list(dictionary.keys())
list2 = list(dictionary.values())
list2.pop('length')
list3 =list(list2[0].keys())
list4 = list(list2[0].values())




# 縦型A4のCanvasを準備
cv = canvas.Canvas('test.pdf', pagesize=portrait(A4))

# フォント登録
pdfmetrics.registerFont(UnicodeCIDFont('HeiseiKakuGo-W5'))

# 入力データをリストで指定
data = list4,list3 
table = Table(data, colWidths=20*mm, rowHeights=20*mm)
# tableの装飾
table.setStyle(TableStyle([                              
        ('FONT', (0, 0), (-1, -1), 'HeiseiKakuGo-W5', 8), # フォント
        ('GRID', (0, 0), (-1, -1), 1, colors.black), 
        ('VALIGN', (0, 0), (-1, -1), 'MIDDLE'), 
        ('ALIGN', (0, 0), (-1, -1), 'CENTER'),       # 罫線
    ]))
table.wrapOn(cv, 10*mm, 230*mm) # table位置
table.drawOn(cv, 10*mm, 230*mm)

# 保存
cv.save()

'''
def auto_print(path):
   if __name__ == '__main__':
    win32api.ShellExecute(0,"print",path,None,".",0)
    print("Printed:"+path)
 
def file_check(path):
    if os.path.isdir(path):
        files = os.listdir(path)
        for file in files:
            file_check(path+"\\"+file)
    else:
        auto_print(path)
        time.sleep(3)
 
 
print_path = r"./pdf生成"
 
file_check(print_path)
 
print("Process finished")
'''