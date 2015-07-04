import MySQLdb

conn = MySQLdb.connect("localhost", "marymjan_root", "brainHurts5294#", "marymjan_maryart")

c=conn.cursor()

sql = "SELECT * FROM sj_tester"
c.execute(sql)

rows = c.fetchall()

for eachRow in rows:
    print eachRow