import pandas as pd
import mysql.connector
def read_excel_file(file_path):
    df = pd.read_excel(file_path)
    return df

# Function to write data to MySQL table
def write_to_mysql(df):


    # Replace these with your MySQL connection details
    mysql_host = '127.0.0.1'
    mysql_user = 'zubair'
    mysql_password = 'Welcome@321'
    mysql_db = 'triangle_pos'

    # Create a MySQL connection
    conn = mysql.connector.connect(
        host=mysql_host,
        user=mysql_user,
        password=mysql_password,
        database=mysql_db
    )

    # Create a MySQL cursor
    cursor = conn.cursor()

    for index, row in df.iterrows():
        insert_query = """
            INSERT INTO products (product_code, product_name, product_cost, product_quantity, product_price,category_id,product_stock_alert)
            VALUES (%s, %s, %s, %s, %s, %s, %s)
        """
        product_code = row['product_code']
        product_name = row['product_name']
        product_cost = row['product_cost']
        qty =0
        product_price =row['product_price']
        category_id =row['category_id']
        # Data to be inserted
        data = (product_code, product_name, product_cost, qty, product_price, category_id,1)

        # Execute the query
        cursor.execute(insert_query, data)

        # Commit the changes
        conn.commit()

# Replace 'your_file.xlsx' with the path to your actual Excel file
file_path = '/home/sohaib/Downloads/PRICE_LIST_3.22.xlsx'

# Read the Excel file
excel_data = read_excel_file(file_path)

# Write data to MySQL table using ORM
write_to_mysql(excel_data)
