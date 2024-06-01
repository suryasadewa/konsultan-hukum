import pymysql

# Informasi koneksi
hostname = "sql12.freesqldatabase.com"
database = "sql12710825"
username = "sql12710825"
password = "sql12710825"
port = 3306

# Membuat koneksi ke database
try:
    connection = pymysql.connect(
        host=hostname,
        user=username,
        password=password,
        database=database,
        port=port
    )
    print("Koneksi berhasil!")

    # Membuat cursor untuk melakukan operasi database
    cursor = connection.cursor()

    # Contoh query untuk mendapatkan data dari tabel
    cursor.execute("SELECT * FROM your_table_name")
    results = cursor.fetchall()

    for row in results:
        print(row)

except pymysql.MySQLError as e:
    print(f"Error saat koneksi ke database: {e}")

finally:
    # Menutup koneksi
    if connection:
        connection.close()
        print("Koneksi ditutup.")
