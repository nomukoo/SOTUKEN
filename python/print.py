from websocket_server import WebsocketServer
from reportlab.pdfgen import canvas
from reportlab.pdfbase import pdfmetrics
from reportlab.pdfbase.cidfonts import UnicodeCIDFont
from reportlab.lib.pagesizes import A4,A5, portrait
from reportlab.lib.units import mm
from reportlab.platypus import Table, TableStyle
from reportlab.lib import colors
import json
import sys
import os
import time
import win32api

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

def receivedMessage(client, server, message):
    
    dec = json.loads(message)
    list1 = list(dec.keys())
    list2 = list(dec.values())
    pdfmetrics.registerFont(UnicodeCIDFont('HeiseiKakuGo-W5'))
    pdf_name = 'test.pdf'
    cnt = 1
    for rec in list2:
        pdf_name = str(cnt) + pdf_name  
        print(pdf_name)
        rec.pop('length')
        list3 = list(rec.keys())
        list4 = list(rec.values())
        cv = canvas.Canvas(pdf_name, pagesize=portrait(A4))
        data =[ list3,list4 ]
        table = Table(data, colWidths=10*mm, rowHeights=10*mm)
        table.setStyle(TableStyle([                              
        ('FONT', (0, 0), (-1, -1), 'HeiseiKakuGo-W5', 8), # フォント
        ('GRID', (0, 0), (-1, -1), 1, colors.black), 
        ('VALIGN', (0, 0), (-1, -1), 'MIDDLE'), 
        ('ALIGN', (0, 0), (-1, -1), 'CENTER'),       # 罫線
        ]))
        table.wrapOn(cv, 10*mm, 230*mm) # table位置
        table.drawOn(cv, 10*mm, 230*mm)
        cv.save()
        cnt += 1

    print_path = r"C:\Users\196001\AppData\Local\Programs\Python\Python310\pdf"
    
    file_check(print_path)
    server.send_message_to_all("complete")

    
def new_client(client, server):
    print("クライアント接続！")
    
print("サーバー起動")
server = WebsocketServer(host="127.0.0.1", port=9999)
server.set_fn_new_client(new_client)
server.set_fn_message_received(receivedMessage)
server.run_forever()


 
