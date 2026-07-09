import serial
import mysql.connector

print("Стартува...")

ser = serial.Serial('COM10', 9600, timeout=1)

db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="monitoring"
)

cursor = db.cursor()

print("Поврзан со база!")

while True:
    line = ser.readline().decode(errors='ignore').strip()
    print("Примено:", line)

    if "," in line:
        try:
            t, h = line.split(",")
            print("Температура:", t, "Влага:", h)

            sql = "INSERT INTO senzori (temperatura, vlaga) VALUES (%s, %s)"
            val = (float(t), float(h))

            cursor.execute(sql, val)
            db.commit()

            print("Зачувано:", t, h)

        except Exception as e:
            print("Грешка со податоци:", e)